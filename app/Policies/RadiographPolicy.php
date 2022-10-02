<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Radiograph;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RadiographPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->role === UserRole::Doctor || $user->role === UserRole::Admin;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Radiograph $radiograph)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->role === UserRole::Doctor || $user->role === UserRole::Admin;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Radiograph $radiograph)
    {
        return $user->role === UserRole::Doctor || $user->role === UserRole::Admin;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Radiograph $radiograph)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Radiograph $radiograph)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Radiograph  $radiograph
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Radiograph $radiograph)
    {
        //
    }
}
