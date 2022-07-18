@extends('master')
@section('content')
<h2>Update Planet</h2>
<form method="post" action="/starships/update/{{ $planet->id }}">
    @csrf
    <div>
        <label for="name-input"><b>Name</b></label>
        <input type="text" name="name" id="name-input" placeholder="{{ $planet->name }}">
    </div>
    <div>
        <label for="rotation_period-input"><b>Rotation Period</b></label>
        <input type="text" name="rotation_period" id="rotation_period-input" placeholder="{{ $planet->rotation_period }}">
    </div>
    <div>
        <label for="orbital_period-input"><b>Orbital Period</b></label>
        <input type="text" name="orbital_period" id="orbital_period-input" placeholder="{{ $planet->orbital_period }}">
    </div>
    <div>
        <label for="diameter-input"><b>Diameter</b></label>
        <input type="text" name="diameter" id="diameter-input" placeholder="{{ $planet->diameter }}">
    </div>
    <div>
        <label for="gravity-input"><b>Gravity</b></label>
        <input type="text" name="gravity" id="gravity-input" placeholder="{{ $planet->gravity }}">
    </div>
    <div>
        <label for="surface_water-input"><b>Surface Water</b></label>
        <input type="text" name="surface_water" id="surface_water-input" placeholder="{{ $planet->surface_water }}">
    </div>
    <div>
        <label for="population-input"><b>Population</b></label>
        <input type="text" name="population" id="population-input" placeholder="{{ $planet->population }}">
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
    <div>
        <label for="climate-input"><b>Climate</b></label>
        <select multiple name="climate[]" id="climate-input">
            <option value="">Unknown</option>
            @foreach($climates as $climate)
                <option value="{{ $climate->id }}">{{ $climate->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="terrain-input"><b>Terrain</b></label>
        <select multiple name="terrain[]" id="terrain-input">
            <option value="">Unknown</option>
            @foreach($terrains as $terrain)
                <option value="{{ $terrain->id }}">{{ $terrain->name }}</option>
            @endforeach
        </select>
    </div>

    <input type="submit">
</form>
@endsection
