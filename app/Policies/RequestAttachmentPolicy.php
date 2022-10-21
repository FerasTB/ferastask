<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Patient;
use App\Models\RequestAttachment;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequestAttachmentPolicy
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
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RequestAttachment  $requestAttachment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, RequestAttachment $requestAttachment)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user, Patient $patient)
    {
        return $user->id === $patient->user_id;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RequestAttachment  $requestAttachment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, RequestAttachment $requestAttachment)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RequestAttachment  $requestAttachment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, RequestAttachment $requestAttachment)
    {
        return $user->id === $requestAttachment->request->consultation->patient->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RequestAttachment  $requestAttachment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, RequestAttachment $requestAttachment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\RequestAttachment  $requestAttachment
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, RequestAttachment $requestAttachment)
    {
        //
    }
}
