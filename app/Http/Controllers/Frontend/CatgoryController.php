<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatgoryController extends Controller
{
    private $category;
    public function __construct(Category $category, Product $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function index($slug, $categoryId)
    {
        $categoryParent = $this->category->where('parent_id', 0)->get();
        $products = $this->product->where('category_id', $categoryId)->paginate(12);
        return view('frontend.product.category.list', compact('products', 'categoryParent'));
    }
    public function contact()
    {
        return view('frontend.components.contact');
    }
}
