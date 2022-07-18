<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Planet;
use App\Models\Producer;
use App\Models\Starship;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class FilmsController extends StarWarsController
{
    public function index()
    {
        $data['films'] = Film::orderBy('id', 'asc')->paginate(self::NUM_OF_ENTITIES_PER_PAGE);

        return view('films.content.index', $data);
    }

    public function create(Request $request)
    {
        $film = Film::create($this->normalizeFillableArr($request->all()));
        if ($request->has('starship') && ($request->starship !== null)) {
            $film->starships()->attach($request->starship);
        }
        if ($request->has('vehicle') && ($request->vehicle !== null)) {
            $film->vehicles()->attach($request->vehicle);
        }
        if ($request->has('producer') && ($request->producer !== null)) {
            $film->producers()->attach($request->film);
        }
        if ($request->has('planet') && ($request->planet !== null)) {
            $film->planets()->attach($request->planet);
        }

        return redirect("/film/$film->id/");
    }

    public function show($id)
    {
        $film = Film::find($id);

        return view('films.content.page', ['film' => $film]);
    }

    public function showCreate()
    {
        $data['starships'] = Starship::all();
        $data['vehicles'] = Vehicle::all();
        $data['producers'] = Producer::all();
        $data['planets'] = Planet::all();

        return view('films.content.create', $data);
    }

    public function showUpdate($id)
    {
        $data = [];
        $data['film'] = Film::find($id);
        $data['planets'] = Planet::all();
        $data['starships'] = Starship::all();
        $data['vehicles'] = Vehicle::all();
        $data['producers'] = Producer::all();

        return view('films.content.update', $data);
    }

    public function update(Request $request, $id)
    {
        $film = Planet::find($id);
        $input = $request->all();

        if ($request->has('starship') && ($request->starship !== null)) {
            $film->starships()->detach();
            $film->starships()->attach($request->starship);
        }
        if ($request->has('vehicle') && ($request->vehicle !== null)) {
            $film->starships()->detach();
            $film->vehicles()->attach($request->vehicle);
        }
        if ($request->has('producer') && ($request->producer !== null)) {
            $film->starships()->detach();
            $film->producers()->attach($request->film);
        }
        if ($request->has('planet') && ($request->planet !== null)) {
            $film->starships()->detach();
            $film->planets()->attach($request->planet);
        }


        $film->update($this->normalizeFillableArr($input));

        return redirect("/films/$id/");
    }

    public function destroy($id)
    {
        Film::destroy($id);

        return redirect("/films");
    }
}
