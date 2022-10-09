<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsultationPhoto extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'consultation_id'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }
}
