@extends('master')
@section('content')
<h2>Update Species</h2>
<form method="post" action="/species/update/{{ $species->id }}">
    @csrf
    <div>
        <label for="name-input"><b>Name</b></label>
        <input type="text" name="name" id="name-input" placeholder="{{ $species->name }}">
    </div>
    <div>
        <label for="classification-input"><b>Classification</b></label>
        <input type="text" name="classification" id="classification-input" placeholder="{{ $species->classification }}">
    </div>
    <div>
        <label for="designation-input"><b>Designation</b></label>
        <input type="text" name="designation" id="designation-input" placeholder="{{ $species->designation }}">
    </div>
    <div>
        <label for="average_height-input"><b>Average Height</b></label>
        <input type="text" name="average_height" id="average_height-input" placeholder="{{ $species->average_height }}">
    </div>
    <div>
        <label for="average_lifespan-input"><b>Average Lifespan</b></label>
        <input type="text" name="average_lifespan" id="average_lifespan-input" placeholder="{{ $species->average_lifespan }}">
    </div>
    <div>
        <label for="language-input"><b>Language</b></label>
        <input type="text" id="language-input" placeholder="{{ $species->language }}">
    </div>
    <div>
        <label for="homeworld-input"><b>Homeworld</b></label>
        <select name="planet_id" id="homeworld-input">
            <option value="">Unknown</option>
            @foreach($planets as $planet)
                @if (($species->planet !== null) && ($species->planet->id === $planet->id))
                    <option selected value="{{ $planet->id }}">{{ $planet->name }}</option>
                @else
                    <option value="{{ $planet->id }}">{{ $planet->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <label for="films-input"><b>Films</b></label>
        <select multiple name="films[]" id="films-input">
            <option value="">Unknown</option>
            @foreach($films as $film)
                <option value="{{ $film->id }}">{{ $film->title }}</option>
            @endforeach
        </select>
    </div>
    <input type="submit">
</form>
@endsection
