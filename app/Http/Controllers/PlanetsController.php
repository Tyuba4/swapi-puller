<?php

namespace App\Http\Controllers;

use App\Models\Climate;
use App\Models\Terrain;
use Illuminate\Http\Request;
use App\Models\Planet;
use App\Models\Film;

class PlanetsController extends StarWarsController
{
    public function index()
    {
        $data['planets'] = Planet::orderBy('id', 'asc')->paginate(self::NUM_OF_ENTITIES_PER_PAGE);

        return view('planets.content.index', $data);
    }

    public function create(Request $request)
    {
        $planet = Planet::create($this->normalizeFillableArr($request->all()));
        if ($request->has('climate') && ($request->climate !== null)) {
            $planet->climates()->attach($request->climate);
        }
        if ($request->has('terrain') && ($request->terrain !== null)) {
            $planet->terrains()->attach($request->terrain);
        }
        if ($request->has('films') && ($request->film !== null)) {
            $planet->films()->attach($request->film);
        }

        return redirect("/planets/$planet->id/");
    }

    public function show($id)
    {
        $starship = Planet::find($id);

        return view('planets.content.page', ['planet' => $starship]);
    }

    public function showCreate()
    {
        $data['films'] = Film::all();
        $data['climates'] = Climate::all();
        $data['terrains'] = Terrain::all();

        return view('planets.content.create', $data);
    }

    public function showUpdate($id)
    {
        $data = [];
        $data['planet'] = Planet::find($id);
        $data['films'] = Film::all();
        $data['climates'] = Climate::all();
        $data['terrains'] = Terrain::all();

        return view('planets.content.update', $data);
    }

    public function update(Request $request, $id)
    {
        $planet = Planet::find($id);
        $input = $request->all();
        if ($request->has('climate') && ($request->climate !== null)) {
            $planet->climates()->detach();
            $planet->climates()->attach($request->climate);
        }
        if ($request->has('terrain') && ($request->terrain !== null)) {
            $planet->terrains()->detach();
            $planet->terrains()->attach($request->terrain);
        }
        if ($request->has('films') && ($request->film !== null)) {
            $planet->films()->detach();
            $planet->films()->attach($request->film);
        }
        $planet->update($this->normalizeFillableArr($input));

        return redirect("/planets/$id/");
    }

    public function destroy($id)
    {
        Film::destroy($id);

        return redirect("/planets");
    }
}
