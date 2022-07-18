<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehiclesController extends StarWarsController
{
    public function index()
    {
        $data['vehicles'] = Vehicle::orderBy('id', 'asc')->paginate(self::NUM_OF_ENTITIES_PER_PAGE);

        return view('vehicles.content.index', $data);
    }

    public function create(Request $request)
    {
        $vehicle = Vehicle::create($this->normalizeFillableArr($request->all()));
        if ($request->has('manufacturer') && ($request->manufacturer !== null)) {
            $vehicle->manufacturers()->attach($request->manufacturer);
        }

        return redirect("/vehicles/$vehicle->id/");
    }

    public function show($id)
    {
        $vehicle = Vehicle::find($id);

        return view('vehicles.content.page', ['vehicle' => $vehicle]);
    }

    public function showCreate()
    {
        $data['manufacturers'] = Manufacturer::all();

        return view('vehicles.content.create', $data);
    }

    public function showUpdate($id)
    {
        $data = [];
        $data['vehicle'] = Vehicle::find($id);
        $data['manufacturers'] = Manufacturer::all();

        return view('vehicles.content.update', $data);
    }

    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $input = $request->all();
        if ($request->has('manufacturer') && ($request->manufacturer !== null)) {
            $vehicle->manufacturers()->detach();
            $vehicle->manufacturers()->attach($request->manufacturer);
        }
        $vehicle->update($this->normalizeFillableArr($input));

        return redirect("/vehicles/$id/");
    }

    public function destroy($id)
    {
        Vehicle::destroy($id);

        return redirect("/starships");
    }
}
