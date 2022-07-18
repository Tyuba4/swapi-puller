<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/people/create', [\App\Http\Controllers\PeopleController::class, 'showCreate']);
Route::post('/people/create', [\App\Http\Controllers\PeopleController::class, 'create']);
Route::get('/people', [\App\Http\Controllers\PeopleController::class, 'index']);
Route::get('/people/{id}', [\App\Http\Controllers\PeopleController::class, 'show'])->where('id', '[0-9]+');
Route::get('/people/update/{id}', [\App\Http\Controllers\PeopleController::class, 'showUpdate'])->where('id', '[0-9]+');
Route::post('/people/update/{id}', [\App\Http\Controllers\PeopleController::class, 'update'])->where('id', '[0-9]+');
Route::post('/people/delete/{id}', [\App\Http\Controllers\PeopleController::class, 'destroy'])->where('id', '[0-9]+');


Route::get('/starships/create', [\App\Http\Controllers\StarshipsController::class, 'showCreate']);
Route::post('/starships/create', [\App\Http\Controllers\StarshipsController::class, 'create']);
Route::get('/starships', [\App\Http\Controllers\StarshipsController::class, 'index']);
Route::get('/starships/{id}', [\App\Http\Controllers\StarshipsController::class, 'show'])->where('id', '[0-9]+');
Route::get('/starships/update/{id}', [\App\Http\Controllers\StarshipsController::class, 'showUpdate'])->where('id', '[0-9]+');
Route::post('/starships/update/{id}', [\App\Http\Controllers\StarshipsController::class, 'update'])->where('id', '[0-9]+');
Route::post('/starships/delete/{id}', [\App\Http\Controllers\StarshipsController::class, 'destroy'])->where('id', '[0-9]+');

Route::get('/planets/create', [\App\Http\Controllers\PlanetsController::class, 'showCreate']);
Route::post('/planets/create', [\App\Http\Controllers\PlanetsController::class, 'create']);
Route::get('/planets', [\App\Http\Controllers\PlanetsController::class, 'index']);
Route::get('/planets/{id}', [\App\Http\Controllers\PlanetsController::class, 'show'])->where('id', '[0-9]+');
Route::get('/planets/update/{id}', [\App\Http\Controllers\PlanetsController::class, 'showUpdate'])->where('id', '[0-9]+');
Route::post('/planets/update/{id}', [\App\Http\Controllers\PlanetsController::class, 'update'])->where('id', '[0-9]+');
Route::post('/planets/delete/{id}', [\App\Http\Controllers\PlanetsController::class, 'destroy'])->where('id', '[0-9]+');

Route::get('/vehicles/create', [\App\Http\Controllers\VehiclesController::class, 'showCreate']);
Route::post('/vehicles/create', [\App\Http\Controllers\VehiclesController::class, 'create']);
Route::get('/vehicles', [\App\Http\Controllers\VehiclesController::class, 'index']);
Route::get('/vehicles/{id}', [\App\Http\Controllers\VehiclesController::class, 'show'])->where('id', '[0-9]+');
Route::get('/vehicles/update/{id}', [\App\Http\Controllers\VehiclesController::class, 'showUpdate'])->where('id', '[0-9]+');
Route::post('/vehicles/update/{id}', [\App\Http\Controllers\VehiclesController::class, 'update'])->where('id', '[0-9]+');
Route::post('/vehicles/delete/{id}', [\App\Http\Controllers\VehiclesController::class, 'destroy'])->where('id', '[0-9]+');

Route::get('/films/create', [\App\Http\Controllers\FilmsController::class, 'showCreate']);
Route::post('/films/create', [\App\Http\Controllers\FilmsController::class, 'create']);
Route::get('/films', [\App\Http\Controllers\FilmsController::class, 'index']);
Route::get('/films/{id}', [\App\Http\Controllers\FilmsController::class, 'show'])->where('id', '[0-9]+');
Route::get('/films/update/{id}', [\App\Http\Controllers\FilmsController::class, 'showUpdate'])->where('id', '[0-9]+');
Route::post('/films/update/{id}', [\App\Http\Controllers\FilmsController::class, 'update'])->where('id', '[0-9]+');
Route::post('/films/delete/{id}', [\App\Http\Controllers\FilmsController::class, 'destroy'])->where('id', '[0-9]+');

Route::get('/species/create', [\App\Http\Controllers\SpeciesController::class, 'showCreate']);
Route::post('/species/create', [\App\Http\Controllers\SpeciesController::class, 'create']);
Route::get('/species', [\App\Http\Controllers\SpeciesController::class, 'index']);
Route::get('/species/{id}', [\App\Http\Controllers\SpeciesController::class, 'show'])->where('id', '[0-9]+');
Route::get('/species/update/{id}', [\App\Http\Controllers\SpeciesController::class, 'showUpdate'])->where('id', '[0-9]+');
Route::post('/species/update/{id}', [\App\Http\Controllers\SpeciesController::class, 'update'])->where('id', '[0-9]+');
Route::post('/species/delete/{id}', [\App\Http\Controllers\SpeciesController::class, 'destroy'])->where('id', '[0-9]+');
