<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bloodTest extends Model
{
    use HasFactory;
    protected $fillable = ['comment', 'testName'];
}
