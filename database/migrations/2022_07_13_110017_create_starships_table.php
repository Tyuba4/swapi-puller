<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('starships', function (Blueprint $table) {
            /*
            "name": "CR90 corvette",
			"model": "CR90 corvette",
			"manufacturer": "Corellian Engineering Corporation",
			"cost_in_credits": "3500000",
			"length": "150",
			"max_atmosphering_speed": "950",
			"crew": "30-165",
			"passengers": "600",
			"cargo_capacity": "3000000",
			"consumables": "1 year",
			"hyperdrive_rating": "2.0",
			"MGLT": "60",
			"starship_class": "corvette",
			"pilots": [],
			"films": [
				"https://swapi.dev/api/films/1/",
				"https://swapi.dev/api/films/3/",
				"https://swapi.dev/api/films/6/"
			],
			"created": "2014-12-10T14:20:33.369000Z",
			"edited": "2014-12-20T21:23:49.867000Z",
			"url": "https://swapi.dev/api/starships/2/"
             */
            $table->id();
            $table->string('name', 32)->nullable();
            $table->string('model')->nullable();
            $table->bigInteger('cost_in_credits')->nullable();
            $table->integer('length')->nullable();
            $table->integer('max_atmosphering_speed')->nullable();
            $table->string('crew', 16)->nullable();
            $table->integer('passengers')->nullable();
            $table->bigInteger('cargo_capacity')->nullable();
            $table->string('consumables', 32)->nullable();
            $table->float('hyperdrive_rating')->nullable();
            $table->integer('MGLT')->nullable();
            $table->string('starship_class', 32)->nullable();
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
        Schema::dropIfExists('starships');
    }
}
