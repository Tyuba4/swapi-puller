<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Planet;
use App\Models\Species;
use App\Models\Starship;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class PeopleController extends StarWarsController
{
    public function index()
    {
        $data['people'] = Person::orderBy('id', 'asc')->paginate(self::NUM_OF_ENTITIES_PER_PAGE);

        return view('people.content.index', $data);
    }

    public function create(Request $request)
    {
        $person = Species::create($this->normalizeFillableArr($request->all()));
        if ($request->has('films') && ($request->films !== null)) {
            $person->films()->attach($request->films);
        }
        if ($request->has('starship') && ($request->starship !== null)) {
            $person->starship()->attach($request->starship);
        }
        if ($request->has('vehicle') && ($request->vehicle !== null)) {
            $person->vehicles()->attach($request->vehicle);
        }

        return redirect("/people/$person->id/");
    }

    public function show($id)
    {
        $person = Person::find($id);

        return view('people.content.page', ['person' => $person]);
    }

    public function showCreate()
    {
        $data['planets'] = Planet::all();
        $data['species'] = Species::all();
        $data['starships'] = Starship::all();
        $data['vehicles'] = Vehicle::all();
        $data['films'] = Film::all();

        return view('people.content.create', $data);
    }

    public function showUpdate($id)
    {
        $data['person'] = Person::find($id);
        $data['planets'] = Planet::all();
        $data['species'] = Species::all();

        return view('people.content.update', $data);
    }

    public function update(Request $request, $id)
    {
        $person = Person::find($id);
        $input = $request->all();

        if ($request->has('films') && ($request->films !== null)) {
            $person->films()->detach();
            $person->films()->attach($request->films);
        }
        if ($request->has('starship') && ($request->starship !== null)) {
            $person->starships()->detach();
            $person->starships()->attach($request->starship);
        }
        if ($request->has('vehicle') && ($request->vehicle !== null)) {
            $person->vehicles()->detach();
            $person->vehicles()->attach($request->vehicle);
        }

        $person->update($this->normalizeFillableArr($input));

        return redirect("/people/$id/");
    }

    public function destroy($id)
    {
        Person::destroy($id);

        return redirect("/people");
    }
}
