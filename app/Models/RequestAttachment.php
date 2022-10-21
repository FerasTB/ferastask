<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestAttachment extends Model
{
    use HasFactory;

    protected $fillable = ['path'];

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }
}
