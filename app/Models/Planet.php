<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class, 'planet_id');
    }

    public function climates()
    {
        return $this->belongsToMany(Climate::class);
    }

    public function terrains()
    {
        return $this->belongsToMany(Terrain::class);
    }
}
