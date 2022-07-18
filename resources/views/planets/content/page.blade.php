@extends('master')
@section('content')
    <h2>Planet</h2>
    <a href="/planets">Go to index Planets ></a>
    <h2>{{ $planet->name }}</h2>
    <div><b>Model</b> - {{ $planet->model }}</div>
    <div><b>Rotation Period</b> - {{ $planet->rotation_period }}</div>
    <div><b>Orbital Period</b> - {{ $planet->orbital_period }}</div>
    <div><b>Diameter</b> - {{ $planet->diameter }}</div>
    <div><b>Gravity</b> - {{ $planet->gravity }}</div>
    <div><b>Surface Water</b> - {{ $planet->surface_water }}</div>
    <div><b>Population</b> - {{ $planet->population }}</div>
    @if ($planet->climates->isEmpty())
        <div><b>Climate</b> - unknown</div>
    @else
        <div><b>Climate</b> -

            @foreach($planet->climates as $climate)
                {{ $climate->name }},&nbsp;
            @endforeach
        </div>
    @endif
    @if ($planet->terrains->isEmpty())
        <div><b>Terrain</b> - unknown</div>
    @else
        <div><b>Terrain</b> -

            @foreach($planet->terrains as $terrain)
                {{ $terrain->name }},&nbsp;
            @endforeach
        </div>
    @endif
    @if ($planet->films->isEmpty())
        <div><b>Film</b> - unknown</div>
    @else
        <div><b>Film</b> -

            @foreach($planet->films as $film)
                {{ $film->title }},&nbsp;
            @endforeach
        </div>
    @endif

    <div>
        <button onclick="window.location.href='/planets/update/{{ $planet->id }}';">Update</button>
    </div>
    <div>
        <form method="post" action="/planets/delete/{{ $planet->id }}">
            @csrf
            <button>Delete</button>
        </form>
    </div>

@endsection
