<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;
    protected $fillable = ['note', 'genericName', 'tradeName'];

    public function category()
    {
        return $this->belongsTo(DrugCategory::class, 'category_id');
    }

    public function options()
    {
        return $this->hasMany(MedicationOption::class, 'drug_id');
    }
}
