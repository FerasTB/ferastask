<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodTestRequest extends Model
{
    use HasFactory;

    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id');
    }

    public function radiograph()
    {
        return $this->belongsTo(bloodTest::class, 'bloodTest_id');
    }
}
