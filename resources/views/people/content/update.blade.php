@extends('master')
@section('content')
<h2>Update Person</h2>
<form method="post" action="/people/update/{{ $person->id }}">
    @csrf
    <div>
        <label for="name-input"><b>Name</b></label>
        <input type="text" name="name" id="name-input" placeholder="{{ $person->name }}">
    </div>
    <div>
        <label for="height-input"><b>Height</b></label>
        <input type="text" name="height" id="height-input" placeholder="{{ $person->height }}">
    </div>
    <div>
        <label for="mass-input"><b>Mass</b></label>
        <input type="text" name="mass" id="mass-input" placeholder="{{ $person->mass }}">
    </div>
    <div>
        <label for="hair_color-input"><b>Hair Color</b></label>
        <input type="text" name="hair_color" id="hair_color-input" placeholder="{{ $person->hair_color }}">
    </div>
    <div>
        <label for="skin_color-input"><b>Skin Color</b></label>
        <input type="text" name="skin_color" id="skin_color-input" placeholder="{{ $person->skin_color }}">
    </div>
    <div>
        <label for="eye_color-input"><b>Eye Color</b></label>
        <input type="text" id="eye_color-input" placeholder="{{ $person->eye_color }}">
    </div>
    <div>
        <label for="birth_year-input"><b>Birth Year</b></label>
        <input type="text" name="birth_year" id="birth_year-input" placeholder="{{ $person->birth_year }}">
    </div>
    <div>
        <label for="gender-input"><b>Gender</b></label>
        <input type="text" name="gender" id="gender-input" placeholder="{{ $person->gender }}">
    </div>
    <div>
        <label for="homeworld-input"><b>Homeworld</b></label>
        <select name="planet_id" id="homeworld-input">
            <option value="">Unknown</option>
            @foreach($planets as $planet)
                @if (($person->planet !== null) && ($person->planet->id === $planet->id))
                    <option selected value="{{ $planet->id }}">{{ $planet->name }}</option>
                @else
                    <option value="{{ $planet->id }}">{{ $planet->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <label for="species-input"><b>Species</b></label>
        <select name="species_id" id="species-input">
            <option value="">Unknown</option>
            @foreach($species as $oneSpecies)
                @if (($person->species !== null) && ($person->species->id === $oneSpecies->id))
                    <option selected value="">{{ $oneSpecies->name }}</option>
                @else
                    <option value="{{ $oneSpecies->id }}">{{ $oneSpecies->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <label for="starship-input"><b>Starship</b></label>
        <select multiple name="starship[]" id="starship-input">
            <option value="">Unknown</option>
            @foreach($starships as $starship)
                <option value="{{ $starship->id }}">{{ $starship->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="vehicle-input"><b>Vehicle</b></label>
        <select multiple name="vehicle[]" id="vehicle-input">
            <option value="">Unknown</option>
            @foreach($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="film-input"><b>Film</b></label>
        <select multiple name="film[]" id="film-input">
            <option value="">Unknown</option>
            @foreach($films as $film)
                <option value="{{ $film->id }}">{{ $film->title }}</option>
            @endforeach
        </select>
    </div>

    <input type="submit">
</form>
@endsection
