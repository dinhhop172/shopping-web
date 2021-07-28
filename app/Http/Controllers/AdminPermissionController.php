<?php

namespace App\Http\Controllers;

use App\Components\PermissionRecursive;
use App\Models\Permission;
use Illuminate\Http\Request;

class AdminPermissionController extends Controller
{
    private $permissionRecusive;

    public function __construct(PermissionRecursive $permissionRecusive)
    {
        $this->permissionRecusive = $permissionRecusive;
    }
    public function createPermission()
    {
        $optionPermission = $this->permissionRecusive->permissionRecursiveAdd();
        return view('admin.permission.add1', compact('optionPermission'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // $permission = Permission::create([
        //     'name' => $request->module_parent,
        //     'display_name' => $request->module_parent,
        //     'parent_id' => 0,
        // ]);
        Permission::create([
            'name' => $request->name,
            'display_name' => $request->display_name,
            'parent_id' => $request->parent_id,
            'key_code' => $request->parent_id == 0 ? null : $request->display_name,
        ]);
        return redirect()->route('permissions.create');
        // foreach ($request->module_children as $value) {
        //     Permission::create([
        //         'name' => $value,
        //         'display_name' => $value,
        //         'parent_id' => $permission->id,
        //         'key_code' => $request->module_parent . '_' . $value,
        //     ]);
        // }
    }
}
