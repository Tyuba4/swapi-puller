<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Planet;
use App\Models\Species;
use Illuminate\Http\Request;

class SpeciesController extends StarWarsController
{
    public function index()
    {
        $data['species'] = Species::orderBy('id', 'asc')->paginate(self::NUM_OF_ENTITIES_PER_PAGE);

        return view('species.content.index', $data);
    }

    public function create(Request $request)
    {
        $species = Species::create($this->normalizeFillableArr($request->all()));
        if ($request->has('films') && ($request->films !== null)) {
            $species->films()->attach($request->films);
        }
        if ($request->has('planets') && ($request->planets !== null)) {
            $species->planets()->attach($request->planets);
        }

        return redirect("/species/$species->id/");
    }

    public function show($id)
    {
        $species = Species::find($id);

        return view('species.content.page', ['species' => $species]);
    }

    public function showCreate()
    {
        $data['films'] = Film::all();
        $data['planets'] = Planet::all();

        return view('species.content.create', $data);
    }

    public function showUpdate($id)
    {
        $data = [];
        $data['species'] = Species::find($id);
        $data['films'] = Film::all();
        $data['planets'] = Planet::all();

        return view('species.content.update', $data);
    }

    public function update(Request $request, $id)
    {
        $species = Species::find($id);
        $input = $request->all();

        if ($request->has('films') && ($request->films !== null)) {
            $species->films()->detach();
            $species->films()->attach($request->films);
        }
        if ($request->has('planets') && ($request->planets !== null)) {
            $species->planets()->detach();
            $species->planets()->attach($request->planets);
        }

        $species->update($this->normalizeFillableArr($input));

        return redirect("/species/$id/");
    }

    public function destroy($id)
    {
        Species::destroy($id);

        return redirect("/species");
    }
}
