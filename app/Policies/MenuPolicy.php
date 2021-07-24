<?php

namespace App\Policies;

use App\Models\Menu;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MenuPolicy
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
     * @param  \App\Models\Menu  $menu
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionRole(config('permissions.access.list-menu'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionRole(config('permissions.access.add-menu'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Menu  $menu
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->checkPermissionRole(config('permissions.access.edit-menu'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Menu  $menu
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionRole(config('permissions.access.delete-menu'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Models\Menu  $menu
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
     * @param  \App\Models\Menu  $menu
     * @return mixed
     */
    public function forceDelete(User $user)
    {
        //
    }
}
