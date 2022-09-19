<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'patient_id');
    }

    public function followup()
    {
        return $this->hasMany(FollowupConsultation::class, 'patient_id');
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'patient_id');
    }
}
