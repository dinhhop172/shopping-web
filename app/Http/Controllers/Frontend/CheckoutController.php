<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\MailCheckout;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function showCheckout()
    {
        $cart = session()->get('cart');
        $cus = auth()->guard('customer')->user();
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        return view('frontend.checkout.index', compact('cart', 'total', 'cus'));
    }

    public function placeOrder()
    {
        try {
            if (!empty(session()->get('cart'))) {
                DB::beginTransaction();
                $cart = session()->get('cart');
                $total = 0;
                foreach ($cart as $item) {
                    $total += $item['quantity'] * $item['price'];
                }
                $order = new Order();
                $order->customer_id = auth()->guard('customer')->id();
                $order->date_order = Carbon::now('Asia/Ho_Chi_Minh');
                $order->delivery_address = request()->delivery_address;
                $order->total_price = number_format($total, 2);
                $order->status = 'Checking order';
                $order->note = request()->note;
                $order->save();

                foreach ($cart as $product) {
                    $orderdetails = new OrderDetail();
                    $orderdetails->order_id = $order->id;
                    $orderdetails->product_id = $product['id'];
                    $orderdetails->price = $product['price'];
                    $orderdetails->quantity = $product['quantity'];
                    $orderdetails->total = number_format($product['quantity'] * $product['price'], 2);
                    $orderdetails->save();
                }
                $details = [
                    'name' => auth()->guard('customer')->user()->name,
                    'email' => auth()->guard('customer')->user()->email,
                    'delivery_address' => request()->delivery_address,
                    'note' => request()->note,
                    'product' => $cart,
                    'totalPrice' => $total,
                ];
                // dd($details);
                DB::commit();
                session()->forget('cart');
                if(Mail::to($details['email'])->send(new MailCheckout($details))){
                    session()->put('place', 'Đặt hàng thành công, Vui lòng kiểm tra Mail của bạn');
                    return 'success';
                }

                // return redirect('/')->with('place', 'Placed  order successfully');
            }
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Messenger: ' . $e->getMessage() . '. Line: ' . $e->getLine());
            return redirect('/show-checkout')->with('err-checkout', 'Please try again later');
        }
    }
}
