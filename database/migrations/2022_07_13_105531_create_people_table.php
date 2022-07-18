<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->smallInteger('height')->nullable();
            $table->smallInteger('mass')->nullable();
            $table->string('hair_color', 32)->nullable();
            $table->string('skin_color', 32)->nullable();
            $table->string('eye_color', 32)->nullable();
            $table->float('birth_year')->nullable();
            $table->string('gender')->nullable();
            $table->integer('planet_id')->nullable();
            $table->integer('species_id')->nullable();
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
        Schema::dropIfExists('people');
    }
}
