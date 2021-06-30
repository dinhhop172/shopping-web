<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function getCategory($parent_id)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $optionSelect = $recusive->categoryRecusive($parent_id);
        return $optionSelect;
    }

    public function create()
    {
        $optionSelect = $this->getCategory($parent_id = '');
        return view('admin.category.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = $this->category->findOrFail($id);
        $optionSelect = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'optionSelect'));
    }

    public function update(Request $request, $id)
    {
        $this->category->findOrFail($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {
        $this->category->findOrFail($id)->delete();
        return redirect()->route('categories.index');
    }
}
