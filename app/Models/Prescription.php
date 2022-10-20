<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['advice', 'consultation_id', 'followup_id', 'patient_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }

    public function followup()
    {
        return $this->belongsTo(FollowupConsultation::class, 'followup_id');
    }

    public function drugs()
    {
        return $this->hasMany(PrescriptionDrug::class, 'prescription_id');
    }
}
