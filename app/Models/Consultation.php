<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Consultation extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['breast_feeding', 'pregnant_month', 'pregnant', 'pain', 'startDate', 'doctor_diagnosis', 'patient_complaint', 'dateTime', 'status_id'];
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
        return $this->hasMany(Prescription::class, 'consultation_id');
    }

    public function requests()
    {
        return $this->hasMany(Request::class, 'consultation_id');
    }
}
