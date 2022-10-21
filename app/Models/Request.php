<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'status'];

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, 'consultation_id');
    }

    public function followup()
    {
        return $this->belongsTo(FollowupConsultation::class, 'followup_id');
    }

    public function bloodTests()
    {
        return $this->hasMany(BloodTestRequest::class, 'request_id');
    }

    public function radiographs()
    {
        return $this->hasMany(RadiographRequest::class, 'request_id');
    }

    public function attachments()
    {
        return $this->hasMany(RequestAttachment::class, 'request_id');
    }
}
