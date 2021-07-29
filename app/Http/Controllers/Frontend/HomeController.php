<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $slider;
    private $category;
    private $product;
    public function __construct(Slider $slider, Category $category, Product $product, Setting $setting)
    {
        $this->slider = $slider;
        $this->category = $category;
        $this->product = $product;
        $this->setting = $setting;
    }
    public function index()
    {
        $sliders = $this->slider->get();
        $categoryParent = $this->category->where('parent_id', 0)->get();
        $products = $this->product->latest()->take(6)->get();
        $productRecommend = $this->product->latest('views_count', 'DESC')->take(12)->get();
        $settings = $this->setting->get();
        $categoryLimit = $this->category->where('parent_id', 0)->take(3)->get();
        return view('frontend.home.home', compact('sliders', 'categoryParent', 'categoryLimit', 'products', 'productRecommend', 'settings'));
    }
}
