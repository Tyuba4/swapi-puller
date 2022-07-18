@extends('master')
@section('content')
    <h2>Film</h2>
    <a href="/films">Go to index Films ></a>
    <h2>{{ $film->title }}</h2>
    <div><b>Episode</b> - {{ $film->episode_id }}</div>
    <div><b>Opening Crawl</b> - {{ $film->opening_crawl }}</div>
    <div><b>Director</b> - {{ $film->director }}</div>
    <div><b>Release Date</b> - {{ $film->release_date }}</div>
    @if ($film->starships->isEmpty())
        <div><b>Starship</b> - unknown</div>
    @else
        <div><b>Starship</b> -

            @foreach($film->starships as $starship)
                {{ $starship->name }},&nbsp;
            @endforeach
        </div>
    @endif
    @if ($film->vehicles->isEmpty())
        <div><b>Terrain</b> - unknown</div>
    @else
        <div><b>Terrain</b> -

            @foreach($film->vehicles as $vehicle)
                {{ $vehicle->name }},&nbsp;
            @endforeach
        </div>
    @endif
    @if ($film->producers->isEmpty())
        <div><b>Producer</b> - unknown</div>
    @else
        <div><b>Producer</b> -

            @foreach($film->producers as $producer)
                {{ $producer->name }},&nbsp;
            @endforeach
        </div>
    @endif
    @if ($film->planets->isEmpty())
        <div><b>Planet</b> - unknown</div>
    @else
        <div><b>Planet</b> -

            @foreach($film->planets as $planet)
                {{ $planet->name }},&nbsp;
            @endforeach
        </div>
    @endif


    <div>
        <button onclick="window.location.href='/films/update/{{ $film->id }}';">Update</button>
    </div>
    <div>
        <form method="post" action="/planets/delete/{{ $film->id }}">
            @csrf
            <button>Delete</button>
        </form>
    </div>

@endsection
