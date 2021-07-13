<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    private $user;
    private $role;
    public function __construct(User $user, Role $role)
    {
        $this->user = $user;
        $this->role = $role;
    }
    public function index()
    {
        $users = $this->user->paginate(10);

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = $this->role->all();
        return view('admin.user.add', compact('roles'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('users.index');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error("message: " . $e->getMessage() . ', on Line: ' . $e->getLine());
        }
    }

    public function edit($id)
    {
        $user = $this->user->findOrFail($id);
        $roles = $this->role->all();
        $roleOfUser = $user->roles;
        return view('admin.user.edit', compact('user', 'roles', 'roleOfUser'));
    }
}
