<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Starship extends Model
{
    protected $fillable = [
        'name',
        'model',
        'cost_in_credits',
        'length',
        'crew',
        'passengers',
        'max_atmosphering_speed',
        'cargo_capacity',
        'consumables',
        'hyperdrive_rating',
        'MGLT',
        'starship_class'
    ];

    use HasFactory;

    public function manufacturers()
    {
        return $this->belongsToMany(Manufacturer::class);
    }

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }
}
