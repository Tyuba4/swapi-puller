<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }

    public function starships()
    {
        return $this->belongsToMany(Starship::class);
    }

    public function planet()
    {
        return $this->belongsTo(Planet::class);
    }

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function getHeightAttribute($value)
    {
        return $value ?? "unknown";
    }

    public function getMassAttribute($value)
    {
        return $value ?? "unknown";
    }

    public function getHairColorAttribute($value)
    {
        return $value ?? "unknown";
    }

    public function getSkinColorAttribute($value)
    {
        return $value ?? "unknown";
    }

    public function getEyeColorAttribute($value)
    {
        return $value ?? "unknown";
    }

    public function getBirthYearAttribute($value)
    {
        return $value ?? "unknown";
    }

    public function getFirstNameAttribute($value)
    {
        return $value ?? "unknown";
    }
}
