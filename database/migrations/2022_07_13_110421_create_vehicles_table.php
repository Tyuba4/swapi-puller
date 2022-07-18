<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            /*
            "name": "Sand Crawler",
			"model": "Digger Crawler",
			"manufacturer": "Corellia Mining Corporation",
			"cost_in_credits": "150000",
			"length": "36.8 ",
			"max_atmosphering_speed": "30",
			"crew": "46",
			"passengers": "30",
			"cargo_capacity": "50000",
			"consumables": "2 months",
			"vehicle_class": "wheeled",
			"pilots": [],
			"films": [
				"https://swapi.dev/api/films/1/",
				"https://swapi.dev/api/films/5/"
			],
			"created": "2014-12-10T15:36:25.724000Z",
			"edited": "2014-12-20T21:30:21.661000Z",
			"url": "https://swapi.dev/api/vehicles/4/"
            */
            $table->string('name')->nullable();
            $table->string('model')->nullable();
            $table->integer('cost_in_credits')->nullable();
            $table->float('length')->nullable();
            $table->integer('max_atmosphering_speed')->nullable();
            $table->string('crew', 16)->nullable();
            $table->integer('passengers')->nullable();
            $table->integer('cargo_capacity')->nullable();
            $table->string('consumables', 32)->nullable();
            $table->string('vehicle_class')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
