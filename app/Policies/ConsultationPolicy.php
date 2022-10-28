<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\Patient;
use App\Models\Consultation;
use App\Models\ConsultationAudio;
use App\Models\ConsultationImage;
use App\Models\ConsultationPdf;
use App\Models\ConsultationPhoto;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsultationPolicy
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

    public function getImage(User $user, ConsultationPhoto $image)
    {
        return ($user->id === $image->consultation->patient->user_id || $user->role == UserRole::Admin || $user->role == UserRole::Doctor);
    }

    public function getPdf(User $user, ConsultationPdf $pdf)
    {
        return ($user->id === $pdf->consultation->patient->user_id || $user->role == UserRole::Admin || $user->role == UserRole::Doctor);
    }

    public function getAudio(User $user, ConsultationAudio $audio)
    {
        return ($user->id === $audio->consultation->patient->user_id || $user->role == UserRole::Admin || $user->role == UserRole::Doctor);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Consultation $consultation)
    {
        return ($user->id === $consultation->patient->user_id || $user->role == UserRole::Admin || $user->role == UserRole::Doctor);
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
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Consultation $consultation)
    {
        return $user->id === $consultation->patient->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Consultation $consultation)
    {
        return $user->id === $consultation->patient->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Consultation $consultation)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Consultation $consultation)
    {
        //
    }
}
