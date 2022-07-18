<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Starship;
use Illuminate\Http\Request;

class StarshipsController extends StarWarsController
{
    public function index()
    {
        $data['starships'] = Starship::orderBy('id', 'asc')->paginate(self::NUM_OF_ENTITIES_PER_PAGE);

        return view('starships.content.index', $data);
    }

    public function create(Request $request)
    {
        $starship = Starship::create($this->normalizeFillableArr($request->all()));
        if ($request->has('manufacturer') && ($request->manufacturer !== null)) {
            $starship->manufacturers()->attach($request->manufacturer);
        }

        return redirect("/starships/$starship->id/");
    }

    public function show($id)
    {
        $starship = Starship::find($id);

        return view('starships.content.page', ['starship' => $starship]);
    }

    public function showCreate()
    {
        $data['manufacturers'] = Manufacturer::all();

        return view('starships.content.create', $data);
    }

    public function showUpdate($id)
    {
        $data = [];
        $data['starship'] = Starship::find($id);
        $data['manufacturers'] = Manufacturer::all();

        return view('starships.content.update', $data);
    }

    public function update(Request $request, $id)
    {
        $starship = Starship::find($id);
        $input = $request->all();
        if ($request->has('manufacturer') && ($request->manufacturer !== null)) {
            $starship->manufacturers()->detach();
            $starship->manufacturers()->attach($request->manufacturer);
        }
        $starship->update($this->normalizeFillableArr($input));

        return redirect("/starships/$id/");
    }

    public function destroy($id)
    {
        Starship::destroy($id);

        return redirect("/starships");
    }
}
