<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    use HasFactory;
    protected $fillable = ['animal_id', 'treatment', 'vaccine', 'date', 'notes'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

}
