@extends('master')
@section('content')
<h2>Update Film</h2>
<form method="post" action="/films/update/{{ $film->id }}">
    @csrf
    <div>
        <label for="title-input"><b>Title</b></label>
        <input type="text" name="title" id="title-input" placeholder="{{ $film->title }}">
    </div>
    <div>
        <label for="episode_id-input"><b>Episode</b></label>
        <input type="text" name="episode_id" id="episode_id-input" placeholder="{{ $film->episode_id }}">
    </div>
    <div>
        <label for="opening_crawl-input"><b>Opening Crawl</b></label>
        <input type="text" name="opening_crawl" id="opening_crawl-input" placeholder="{{ $film->opening_crawl }}">
    </div>
    <div>
        <label for="director-input"><b>Director</b></label>
        <input type="text" name="director" id="director-input" placeholder="{{ $film->director }}">
    </div>
    <div>
        <label for="release_date-input"><b>Release Date</b></label>
        <input type="text" name="release_date" id="release_date-input" placeholder="{{ $film->release_date }}">
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
        <label for="producer-input"><b>Producer</b></label>
        <select multiple name="producer[]" id="producer-input">
            <option value="">Unknown</option>
            @foreach($producers as $producer)
                <option value="{{ $producer->id }}">{{ $producer->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="planet-input"><b>Planet</b></label>
        <select multiple name="planet[]" id="planet-input">
            <option value="">Unknown</option>
            @foreach($planets as $planet)
                <option value="{{ $planet->id }}">{{ $planet->name }}</option>
            @endforeach
        </select>
    </div>

    <input type="submit">
</form>
@endsection
