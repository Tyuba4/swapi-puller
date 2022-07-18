@extends('master')
@section('content')
<h2>Create Person</h2>
<form method="post" action="/people/create">
    @csrf
    <div>
        <label for="name-input"><b>Name</b></label>
        <input type="text" name="name" id="name-input" placeholder="string">
    </div>
    <div>
        <label for="height-input"><b>Height</b></label>
        <input type="text" name="height" id="height-input" placeholder="integer">
    </div>
    <div>
        <label for="mass-input"><b>Mass</b></label>
        <input type="text" name="mass" id="mass-input" placeholder="integer">
    </div>
    <div>
        <label for="hair_color-input"><b>Hair Color</b></label>
        <input type="text" name="hair_color" id="hair_color-input" placeholder="string">
    </div>
    <div>
        <label for="skin_color-input"><b>Skin Color</b></label>
        <input type="text" name="skin_color" id="skin_color-input" placeholder="string">
    </div>
    <div>
        <label for="eye_color-input"><b>Eye Color</b></label>
        <input type="text" id="eye_color-input" placeholder="string">
    </div>
    <div>
        <label for="birth_year-input"><b>Birth Year</b></label>
        <input type="text" name="birth_year" id="birth_year-input" placeholder="integer">
    </div>
    <div>
        <label for="gender-input"><b>Gender</b></label>
        <input type="text" name="gender" id="gender-input" placeholder="string">
    </div>
    <div>
        <label for="homeworld-input"><b>Homeworld</b></label>
        <select name="homeworld" id="homeworld-input">
            <option value="">Unknown</option>
            @foreach($planets as $planet)
                <option value="{{ $planet->id }}">{{ $planet->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="species-input"><b>Species</b></label>
        <select name="species" id="species-input">
            <option value="">Unknown</option>
            @foreach($species as $oneSpecies)
                <option value="{{ $oneSpecies->id }}">{{ $oneSpecies->name }}</option>
            @endforeach
        </select>
    </div>

    <input type="submit">
</form>
@endsection
