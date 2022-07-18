<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }

    public function starships()
    {
        return $this->belongsToMany(Starship::class);
    }

    public function producers()
    {
        return $this->belongsToMany(Producer::class);
    }

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }

    public function species()
    {
        return $this->belongsToMany(Species::class);
    }

    public function planets()
    {
        return $this->belongsToMany(Planet::class);
    }

}
