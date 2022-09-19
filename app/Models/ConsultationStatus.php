<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationStatus extends Model
{
    use HasFactory;

    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'status_id');
    }

    public function followup()
    {
        return $this->hasMany(FollowupConsultation::class, 'status_id');
    }
}
