<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadiographRequest extends Model
{
    use HasFactory;

    protected $fillable = ['radiograph_id'];

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function radiograph()
    {
        return $this->belongsTo(Radiograph::class, 'radiograph_id');
    }
}
