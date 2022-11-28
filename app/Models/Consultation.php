<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Consultation extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    use \Znck\Eloquent\Traits\BelongsToThrough;

    protected $fillable = ['breast_feeding', 'pregnant_month', 'pregnant', 'breast_feeding_month', 'doctor_diagnosis', 'patient_complaint', 'start_at', 'end_at', 'status_id', 'patient_id'];
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function status()
    {
        return $this->belongsTo(ConsultationStatus::class, 'status_id');
    }

    public function prescription()
    {
        return $this->hasOne(Prescription::class, 'consultation_id');
    }

    public function requests()
    {
        return $this->hasMany(Request::class, 'consultation_id');
    }

    public function user()
    {
        return $this->belongsToThrough(User::class, Patient::class);
    }

    public function images()
    {
        return $this->hasMany(ConsultationPhoto::class, 'consultation_id');
    }

    public function audios()
    {
        return $this->hasMany(ConsultationAudio::class, 'consultation_id');
    }

    public function pdfs()
    {
        return $this->hasMany(ConsultationPdf::class, 'consultation_id');
    }
}
