@extends('master')
@section('content')
<h2>Create Vehicle</h2>
<form method="post" action="/starships/create">
    @csrf
    <div>
        <label for="name-input"><b>Name</b></label>
        <input type="text" name="name" id="name-input" placeholder="string">
    </div>
    <div>
        <label for="model-input"><b>Model</b></label>
        <input type="text" name="model" id="model-input" placeholder="string">
    </div>
    <div>
        <label for="cost-input"><b>Cost</b></label>
        <input type="text" name="cost_in_credits" id="cost-input" placeholder="integer">
    </div>
    <div>
        <label for="length-input"><b>Length</b></label>
        <input type="text" name="length" id="length-input" placeholder="integer">
    </div>
    <div>
        <label for="max_atmosphering_speed-input"><b>Max Atmospering speed</b></label>
        <input type="text" name="max_atmosphering_speed" id="max_atmosphering_speed-input" placeholder="integer">
    </div>
    <div>
        <label for="crew-input"><b>Crew</b></label>
        <input type="text" id="crew-input" placeholder="integer">
    </div>
    <div>
        <label for="passengers-input"><b>Passengers</b></label>
        <input type="text" name="passengers" id="passengers-input" placeholder="integer">
    </div>
    <div>
        <label for="cargo_capacity-input"><b>Cargo Capacity</b></label>
        <input type="text" name="cargo_capacity" id="cargo_capacity-input" placeholder="integer">
    </div>
    <div>
        <label for="consumables-input"><b>Consumables</b></label>
        <input type="text" name="consumables" id="consumables-input" placeholder="string">
    </div>
    <div>
        <label for="vehicle_class-input"><b>Vehicle Class</b></label>
        <input type="text" name="vehicle_class" id="vehicle_class-input" placeholder="string">
    </div>
    <div>
        <label for="manufacturer-input"><b>Manufacturer</b></label>
        <select multiple name="manufacturer[]" id="manufacturer-input">
            <option value="">Unknown</option>
            @foreach($manufacturers as $manufacturer)
                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
            @endforeach
        </select>
    </div>

    <input type="submit">
</form>
@endsection
