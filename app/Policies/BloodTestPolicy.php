<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\bloodTest;
use Illuminate\Auth\Access\HandlesAuthorization;

class BloodTestPolicy
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
        return $user->role === UserRole::Doctor;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, bloodTest $bloodTest)
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
        return $user->role === UserRole::Doctor;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, bloodTest $bloodTest)
    {
        return ($user->role === UserRole::Admin || $user->role === UserRole::Doctor);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, bloodTest $bloodTest)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, bloodTest $bloodTest)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\bloodTest  $bloodTest
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, bloodTest $bloodTest)
    {
        //
    }
}
