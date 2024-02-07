<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReproductiveEvent extends Model
{
    use HasFactory;

    protected $fillable = ['animal_id', 'event_type', 'date', 'notes'];

    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }

}
