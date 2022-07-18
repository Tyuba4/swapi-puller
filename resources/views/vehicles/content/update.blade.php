@extends('master')
@section('content')
<h2>Update Vehicle</h2>
<form method="post" action="/vehicles/update/{{ $vehicle->id }}">
    @csrf
    <div>
        <label for="name-input"><b>Name</b></label>
        <input type="text" name="name" id="name-input" placeholder="{{ $vehicle->name }}">
    </div>
    <div>
        <label for="model-input"><b>Model</b></label>
        <input type="text" name="model" id="model-input" placeholder="{{ $vehicle->model }}">
    </div>
    <div>
        <label for="cost-input"><b>Cost</b></label>
        <input type="text" name="cost_in_credits" id="cost-input" placeholder="{{ $vehicle->cost_in_credits }}">
    </div>
    <div>
        <label for="length-input"><b>Length</b></label>
        <input type="text" name="length" id="length-input" placeholder="{{ $vehicle->length }}">
    </div>
    <div>
        <label for="max_atmosphering_speed-input"><b>Max Atmospering speed</b></label>
        <input type="text" name="max_atmosphering_speed" id="max_atmosphering_speed-input" placeholder="{{ $vehicle->max_atmosphering_speed }}">
    </div>
    <div>
        <label for="crew-input"><b>Crew</b></label>
        <input type="text" name="crew" id="crew-input" placeholder="{{ $vehicle->crew }}">
    </div>
    <div>
        <label for="passengers-input"><b>Passengers</b></label>
        <input type="text" name="passengers" id="passengers-input" placeholder="{{ $vehicle->passengers }}">
    </div>
    <div>
        <label for="cargo_capacity-input"><b>Cargo Capacity</b></label>
        <input type="text" name="cargo_capacity" id="cargo_capacity-input" placeholder="{{ $vehicle->cargo_capacity }}">
    </div>
    <div>
        <label for="consumables-input"><b>Consumables</b></label>
        <input type="text" name="consumables" id="consumables-input" placeholder="{{ $vehicle->consumables }}">
    </div>
    <div>
        <label for="starship_class-input"><b>Vehicle Class</b></label>
        <input type="text" name="starship_class" id="starship_class-input" placeholder="{{ $vehicle->vehicle_class }}">
    </div>
    <div>
        <label for="manufacturer-input"><b>Manufacturer</b></label>
        <select name="manufacturer[]" multiple id="manufacturer-input">
            <option value="">Unknown</option>
            @foreach($manufacturers as $manufacturer)
                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
            @endforeach
        </select>
    </div>

    <input type="submit">
</form>
@endsection
