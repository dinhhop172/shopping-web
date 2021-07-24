<?php

namespace App;

use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function checkPermissionRole($perrmissionCheck)
    {
        // b1: lay ra tat ca cac quyen cua user dang dang nhap he thong
        // b2: so sánh giá trị đưa vào của router hiện tại xem có tồn tại trong  các quyền mà mình lấy được hay ko
        $roles = auth()->user()->roles;
        foreach ($roles as $role) {
            $perrmission = $role->permissions;
            if ($perrmission->contains('key_code', $perrmissionCheck)) {
                return true;
            };
        }
        return false;
    }
}
