<?php

namespace App\Http\Controllers;

use App\Components\MenuRecursive;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    private $menuRecursive;
    private $menu;

    public function __construct(MenuRecursive $menuRecursive, Menu $menu)
    {
        $this->menuRecursive = $menuRecursive;
        $this->menu = $menu;
    }

    public  function index()
    {
        $menus = $this->menu->paginate(10);
        return view('admin.menu.index', compact('menus'));
    }

    public  function create()
    {
        $optionSelect = $this->menuRecursive->menuRecursiveAdd();
        return view('admin.menu.add', compact('optionSelect'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        return redirect()->route('menus.index');
    }

    public function edit($id)
    {
        $menuFollowIdEdit = $this->menu->findOrFail($id);
        $optionSelect = $this->menuRecursive->menuRecursiveEdit($menuFollowIdEdit->parent_id);
        return view('admin.menu.edit', compact('optionSelect', 'menuFollowIdEdit'));
    }

    public function update(Request $request, $id)
    {
        $this->menu->findOrFail($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }

    public function destroy($id)
    {
        $this->menu->findOrFail($id)->delete();
        return redirect()->route('menus.index');
    }
}
