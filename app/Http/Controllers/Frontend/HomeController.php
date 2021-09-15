<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    private $slider;
    private $category;
    private $product;
    private $customer;
    public function __construct(Customer $customer, Slider $slider, Category $category, Product $product, Setting $setting)
    {
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
        $this->setting = $setting;
        $this->customer = $customer;
    }
    public function index()
    {
        $sliders = $this->slider->get();
        $categoryParent = $this->category->where('parent_id', 0)->get();
        $products = $this->product->latest()->take(6)->get();
        $productRecommend = $this->product->latest('views_count', 'DESC')->take(12)->get();
        $settings = $this->setting->get();
        return view('frontend.home.home', compact('sliders', 'categoryParent', 'products', 'productRecommend', 'settings'));
    }

    public function login()
    {
        return view('frontend.components.login');
    }
    public function register(RegisterRequest $request)
    {
        $customer = $this->customer->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        Auth::guard('customer')->login($customer);
        Alert::success('Success', '<h5>Đăng ký thành công<h5>')->toHtml();
        return redirect()->route('front.index');
    }
    public function postLogin(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        $attempt = ['email' => $request->email, 'password' => $request->password];
        $login = Auth::guard('customer')->attempt($attempt, $remember);
        if (is_null($request->email) || is_null($request->password)) {
            Alert::warning('<h5>Vui lòng nhập đủ thông tin</h5>')->toHtml();
            return redirect('/sign-in.html');
        } elseif ($login) {
            return redirect('/');
        } else {
            Alert::error('<h5>Tài khoản hoặc mật khẩu không chính xác</h5>')->toHtml();
            return redirect('/sign-in.html');
        }
    }
    public function logout()
    {
        Auth::guard('customer')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
    public function profile()
    {
        $user = auth()->guard('customer')->user();
        return view('frontend.profile.information', compact('user'));
    }

    public function submitProfile(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $user = $this->customer->where('name', '=', $name)->first();
        if ($user === null) {
            if (strlen($name) > 20 || strlen($name) < 3 || strlen($name) < 1) {
                alert()->warning('Name max 20 characters and minimum 3 characters');
                return redirect(route('customer.profile'))->withInput();
            } elseif (strlen($address) > 200 || strlen($address) < 10 || strlen($address) < 1) {
                alert()->warning('Address max 200 characters and minimum 10 characters');
                return redirect(route('customer.profile'))->withInput();
            } else {
                $this->customer->where('id', auth()->guard('customer')->id())->update([
                    'name' => $request->name,
                    'address' => $request->address,
                ]);
                alert()->success('Success', '<h4>Updated successfully!</h4>')->toHtml();
                return redirect(route('customer.profile'));
            }
        } else {
            alert()->warning('<h4>Name already exists!</h4>')->toHtml();
            return redirect(route('customer.profile'))->withInput();
        }
    }

    public function myOrder()
    {
        $data['id'] = auth()->guard('customer')->id();
        $data['orders'] = Order::where('customer_id', $data['id']);
        $data['waiting_check'] = Order::where('customer_id', $data['id'])->where('status', "Checking order")->get();
        $data['order_details'] = OrderDetail::paginate(10);
        return view('frontend.profile.my_order', compact('data'));
    }
    public function verifyPassword(Request $request)
    {
        $user = auth()->guard('customer')->user()->first();
        if (Hash::check($request->password, $user->password)) {
            return response()->json(['success' => 'Changed successfully']);
        } else {
            return response()->json(['error' => 'Falied']);
        }
    }

    public function changeEmail()
    {
        $user = auth()->guard('customer')->user()->first();
        return view('frontend.profile.change_mail', compact('user'));
    }
    public function changePhone()
    {
        $user = auth()->guard('customer')->user()->first();
        return view('frontend.profile.change_phone', compact('user'));
    }
    public function changePass()
    {
        return view('frontend.profile.change_pass');
    }
    public function changeEmailUpdate(Request $request)
    {
        $email = $request->email;
        $user = $this->customer->where('email', '=', $email)->first();
        if ($user === null) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                alert()->warning('Invalid email address');
                return redirect(route('customer.changemail'))->withInput();
            } else {
                $this->customer->where('email', auth()->guard('customer')->user()->email)->update([
                    'email' => $email
                ]);
                alert()->success('Success', '<h4>Changed email successfully!</h4>')->toHtml();
                return redirect(route('customer.changemail'));
            }
        } else {
            alert()->warning('Warning', '<h4>Email already exists!</h4>')->toHtml();
            return redirect(route('customer.changemail'));
        }
    }
    public function changePhoneUpdate(Request $request)
    {
        $phone = $request->phone;
        $user = $this->customer->where('phone', '=', $phone)->first();
        if ($user === null) {
            if (strlen($request->phone) > 10 || strlen($request->phone) < 10) {
                alert()->warning('Phone number must have 10 digits');
                return redirect(route('customer.changephone'))->withInput();
            } else {
                $this->customer->where('phone', auth()->guard('customer')->user()->phone)->update([
                    'phone' => $request->phone
                ]);
                alert()->success('Success', 'Changed phone successfully!');
                return redirect(route('customer.changephone'));
            }
        } else {
            alert()->warning('Warning', '<h4>Phone already exists!</h4>')->toHtml();
            return redirect(route('customer.changephone'));
        }
    }
    public function changePassUpdate(Request $request)
    {
        $pass = $request->password;
        $re_pass = $request->re_password;
        if ($pass !== $re_pass || strlen($pass) < 1) {
            alert()->warning('Please enter the correct password');
            return redirect(route('customer.changepass'));
        } else {
            $this->customer->where('id', auth()->guard('customer')->id())->update([
                'password' => Hash::make($pass)
            ]);
            alert()->success('Success', '<h4>Changed password successfully!</h4>')->toHtml();
            return redirect(route('customer.changepass'));
        }
    }

    public function search(Request $request)
    {
        $categoryParent = $this->category->where('parent_id', 0)->get();
        $searchProduct = $this->product->search()->paginate(12);
        return view('frontend.product.search.list', compact('searchProduct', 'categoryParent'));
    }
    public function productDetail($slug, $id)
    {
        try {
            \DB::beginTransaction();
            $data = $this->product->find($id);
            // dd($data);
            $categoryParent = $this->category->where('parent_id', 0)->get();
            $productRecommend = $this->product->latest('views_count', 'DESC')->take(12)->get();
            $view_count = $this->product->select('views_count')->find($id);
            $this->product->where('id', $id)->update([
                'views_count' => $view_count->views_count += 0.01,
            ]);
            \DB::commit();
            return view('frontend.product.product-detail', compact('data', 'categoryParent', 'productRecommend'));
        } catch (Exception $e) {
            \DB::rollback();
            \Log::error("Message: " . $e->getMessage() . " on Line: " . $e->getLine());
        }
    }
    public function test()
    {
        return view('frontend.test');
    }
    public function viewCount($id)
    {
        try {
            \DB::beginTransaction();
            $view_count = $this->product->select('views_count')->find($id);
            $this->product->where('id', $id)->update([
                'views_count' => $view_count->views_count += 1,
            ]);
            \DB::commit();
            return response()->json(['success' => 202, 'status' => 'success']);
        } catch (Exception $e) {
            \DB::rollback();
            \Log::error("Message: " . $e->getMessage() . " on Line: " . $e->getLine());
        }
    }
    private function jsonDataResult($data, $statusCode)
    {
        $result = [
            'data' => $data,
            'statusCode' => $statusCode,
        ];
        return response()->json($result, $result['statusCode']);
    }
    private function jsonMsgResult($errors, $success, $statusCode)
    {
        $result = [
            'errors' => $errors,
            'success' => $success,
            'statusCode' => $statusCode,
        ];

        return response()->json($result, $result['statusCode']);
    }
    public function addCart()
    {
        $dataId = request()->dataId;
        $product = $this->product->find($dataId);
        if (empty($product)) {
            abort(404);
        }
        $cart = session()->get('cart');
        if (empty($cart)) {
            $cart[$dataId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => isset(request()->quantity) ? request()->quantity : 1,
                'feature_image_path' => $product->feature_image_path,
                'feature_image_name' => $product->feature_image_name,
                'content' => $product->content,
                'slug' => $product->slug,
            ];
            session()->put('cart', $cart);
            return $this->jsonDataResult(['message' => 'success', 'data' => $cart], 200);
        }
        if (isset($cart[$dataId])) {
            $cart[$dataId]['quantity'] += 1;
            session()->put('cart', $cart);
            return $this->jsonDataResult(['message' => 'success', 'data' => $cart], 200);
        }
        $cart[$dataId] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => isset(request()->quantity) ? request()->quantity : 1,
            'feature_image_path' => $product->feature_image_path,
            'feature_image_name' => $product->feature_image_name,
            'content' => $product->content,
            'slug' => $product->slug,
        ];
        session()->put('cart', $cart);
        return $this->jsonDataResult(['message' => 'success', 'data' => $cart], 200);
    }

    public function showProductCart()
    {
        $cart = session()->get('cart');
        // $total = 0;
        // foreach ($cart as $item) {
        //     $total += $item['quantity'] * $item['price'];
        // }
        return view('frontend.cart.index', compact('cart'));
    }

    public function deleteCartItem()
    {
        if (request()->id) {
            $cart = session()->get('cart');
            unset($cart[request()->id]);
            session()->put('cart', $cart);
            $cart = session()->get('cart');
            $cartComponent = view('frontend.cart.cart-component', compact('cart'))->render();
            return $this->jsonDataResult(['message' => 'success', 'data' => $cartComponent, 'dataCart' => $cart], 200);
        }
    }

    public function updateCartQuantity()
    {
        if (request()->id && request()->quantity) {
            if (request()->quantity == 0 || request()->quantity < 1) {
                return response()->json(['quantity' => request()->quantity]);
            } else {
                $cart = session()->get('cart');
                $cart[request()->id]['quantity'] = request()->quantity;
                session()->put('cart', $cart);
                $cart = session()->get('cart');
                $cartComponent = view('frontend.cart.cart-component', compact('cart'))->render();
                $total = 0;
                foreach ($cart as $item) {
                    $total += $item['quantity'];
                }
                return $this->jsonDataResult(['message' => 'success', 'quantity' => request()->quantity, 'data' => $cartComponent, 'total' => $total], 200);
            }
        }
    }

}
