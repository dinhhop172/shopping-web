<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $this->customer->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('front.index')->with('register-front', 'Đăng ký thành công');
    }
    public function postLogin(Request $request)
    {
        $remember = $request->has('remember') ? true : false;
        $attempt = ['email' => $request->email, 'password' => $request->password];
        $login = Auth::guard('customer')->attempt($attempt, $remember);
        if ($login) {
            return redirect('/');
        }
        return redirect('/sign-in')->with('login-fail', 'Đăng nhập không thành công');
    }
    public function logout()
    {
        Auth::guard('customer')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }
}
