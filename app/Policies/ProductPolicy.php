<?php

namespace App\Policies;

use App\Models\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Product  $product
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionRole(config('permissions.access.list-product'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionRole(config('permissions.access.add-product'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Product  $product
     * @return mixed
     */
    public function update(User $user, $id)
    {
        // return $user->checkPermissionRole(config('permissions.access.edit-product'));
        $product = Product::findOrFail($id);
        if ($user->checkPermissionRole(config('permissions.access.edit-product')) && $user->id === $product->user_id) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Product  $product
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionRole(config('permissions.access.delete-product'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Product  $product
     * @return mixed
     */
    public function restore(User $user)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Product  $product
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
