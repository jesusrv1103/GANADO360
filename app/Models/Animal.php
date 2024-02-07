<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;
    protected $fillable = ['farm_id', 'tag_number', 'species', 'breed', 'birth_date', 'gender'];

    public function farm()
    {
        return $this->belongsTo(Farm::class);
    }
    public function healthRecords()
    {
        return $this->hasMany(HealthRecord::class);
    }

    public function weightRecords()
    {
        return $this->hasMany(WeightRecord::class);
    }

    public function reproductiveEvents()
    {
        return $this->hasMany(ReproductiveEvent::class);
    }
}
