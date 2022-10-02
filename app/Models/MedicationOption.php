<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationOption extends Model
{
    use HasFactory;

    protected $fillable = ['optionName', 'comment'];
}
