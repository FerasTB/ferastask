<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowupConsultation extends Model
{
    use HasFactory;

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function status()
    {
        return $this->belongsTo(ConsultationStatus::class, 'status_id');
    }

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class, 'followup_id');
    }

    public function requests()
    {
        return $this->hasMany(Request::class, 'followup_id');
    }
}
