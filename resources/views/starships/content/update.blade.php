@extends('master')
@section('content')
    <h2>Update Starship</h2>
    <form method="post" action="/starships/update/{{ $starship->id }}">
        @csrf
        <div>
            <label for="name-input"><b>Name</b></label>
            <input type="text" name="name" id="name-input" placeholder="{{ $starship->name }}">
        </div>
        <div>
            <label for="model-input"><b>Model</b></label>
            <input type="text" name="model" id="model-input" placeholder="{{ $starship->model }}">
        </div>
        <div>
            <label for="cost-input"><b>Cost</b></label>
            <input type="text" name="cost_in_credits" id="cost-input" placeholder="{{ $starship->cost_in_credits }}">
        </div>
        <div>
            <label for="length-input"><b>Length</b></label>
            <input type="text" name="length" id="length-input" placeholder="{{ $starship->length }}">
        </div>
        <div>
            <label for="max_atmosphering_speed-input"><b>Max Atmospering speed</b></label>
            <input type="text" name="max_atmosphering_speed" id="max_atmosphering_speed-input" placeholder="{{ $starship->max_atmosphering_speed }}">
        </div>
        <div>
            <label for="crew-input"><b>Crew</b></label>
            <input type="text" name="crew" id="crew-input" placeholder="{{ $starship->crew }}">
        </div>
        <div>
            <label for="passengers-input"><b>Passengers</b></label>
            <input type="text" name="passengers" id="passengers-input" placeholder="{{ $starship->passengers }}">
        </div>
        <div>
            <label for="cargo_capacity-input"><b>Cargo Capacity</b></label>
            <input type="text" name="cargo_capacity" id="cargo_capacity-input" placeholder="{{ $starship->cargo_capacity }}">
        </div>
        <div>
            <label for="consumables-input"><b>Consumables</b></label>
            <input type="text" name="consumables" id="consumables-input" placeholder="{{ $starship->consumables }}">
        </div>
        <div>
            <label for="hyperdrive_rating-input"><b>Hyperdrive Rating</b></label>
            <input type="text" name="hyperdrive_rating" id="hyperdrive_rating-input" placeholder="{{ $starship->hyperdrive_rating }}">
        </div>
        <div>
            <label for="MGLT-input"><b>MGLT</b></label>
            <input type="text" name="MGLT" id="MGLT-input" placeholder="{{ $starship->MGLT }}">
        </div>
        <div>
            <label for="starship_class-input"><b>Starship Class</b></label>
            <input type="text" name="starship_class" id="starship_class-input" placeholder="{{ $starship->starship_class }}">
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

