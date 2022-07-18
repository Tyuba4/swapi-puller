<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    use HasFactory;

    public function people()
    {
        return $this->hasMany(Person::class);
    }

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function planet()
    {
        return $this->belongsTo(Planet::class);
    }
}
