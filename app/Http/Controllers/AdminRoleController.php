<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class AdminRoleController extends Controller
{
    private $role;
    private $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function index()
    {
        // \DB::enableQueryLog();
        $roles = $this->role->paginate(10);
        // dd(\DB::getQueryLog());
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionParent'));
    }
    public function store(Request $request)
    {
        $role = $this->role->create([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role->permissions()->attach($request->permission_id);
        return redirect()->route('roles.index');
    }
    public function edit($id)
    {
        $permissionParent = $this->permission->where('parent_id', 0)->get();
        $role = $this->role->findOrFail($id);
        $permissionChecked = $role->permissions;
        return view('admin.role.edit', compact('permissionParent', 'role', 'permissionChecked'));
    }

    public function update(Request $request, $id)
    {
        $this->role->findOrFail($id)->update([
            'name' => $request->name,
            'display_name' => $request->display_name,
        ]);
        $role = $this->role->findOrFail($id);
        $role->permissions()->sync($request->permission_id);
        return redirect()->route('roles.index');
    }

    public function destroy()
    {
        
    }

    public function upload()
    {
        return view('admin.product.test');
    }
    public function uploadFile()
    {
        request()->validate([
            'upload' => 'required|mimes:jpeg,png,gif'
        ]);
        $file = request()->upload;
        $info = pathinfo($file->getClientOriginalName());
        $file_name = $info['filename'];
        $file_ex = $info['extension'];
        $full_name = time() . '-' . \Str::slug($file_name) . '.' . $file_ex;
        $file->move(public_path('uploads'), $full_name);
        return public_path('uploads/' . $full_name);
    }
}
