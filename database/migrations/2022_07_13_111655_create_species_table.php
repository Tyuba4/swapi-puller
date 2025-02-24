<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
            "name": "Human",
			"classification": "mammal",
			"designation": "sentient",
			"average_height": "180",
			"skin_colors": "caucasian, black, asian, hispanic",
			"hair_colors": "blonde, brown, black, red",
			"eye_colors": "brown, blue, green, hazel, grey, amber",
			"average_lifespan": "120",
			"homeworld": "https://swapi.dev/api/planets/9/",
			"language": "Galactic Basic",
			"people": [
				"https://swapi.dev/api/people/66/",
				"https://swapi.dev/api/people/67/",
				"https://swapi.dev/api/people/68/",
				"https://swapi.dev/api/people/74/"
			],
			"films": [
				"https://swapi.dev/api/films/1/",
				"https://swapi.dev/api/films/2/",
				"https://swapi.dev/api/films/3/",
				"https://swapi.dev/api/films/4/",
				"https://swapi.dev/api/films/5/",
				"https://swapi.dev/api/films/6/"
			],
			"created": "2014-12-10T13:52:11.567000Z",
			"edited": "2014-12-20T21:36:42.136000Z",
			"url": "https://swapi.dev/api/species/1/"
        */
        Schema::create('species', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('classification')->nullable();
            $table->string('designation')->nullable();
            $table->smallInteger('average_height')->nullable();
            $table->smallInteger('average_lifespan')->nullable();
            $table->string('language', 16)->nullable();
            $table->integer('planet_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('species');
    }
}
