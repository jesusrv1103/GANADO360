<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightRecord extends Model
{
    use HasFactory;
    protected $fillable = ['animal_id', 'weight', 'date'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
