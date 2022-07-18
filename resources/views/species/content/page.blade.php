@extends('master')
@section('content')
    <h2>Species</h2>
    <a href="/species">Go to index Species ></a>
    <h2>{{ $species->name }}</h2>
    <div><b>Classification</b> - {{ $species->classification }}</div>
    <div><b>Designation</b> - {{ $species->designation }}</div>
    <div><b>Average Height</b> - {{ $species->average_height }}</div>
    <div><b>Average Lifespan</b> - {{ $species->average_lifespan }}</div>
    <div><b>Language</b> - {{ $species->language }}</div>
    <div><b>Planet</b> - {{ $species->planet->name }}</div>
    @if ($species->planet !== null)
        <div><b>Homeworld</b> - {{ $species->planet->name }}</div>
    @else
        <div><b>Homeworld</b> - unknown</div>
    @endif
    <div>
        <button onclick="window.location.href='/species/update/{{ $species->id }}';">Update</button>
    </div>
    <div>
        <button onclick="window.location.href='/species/delete/{{ $species->id }}';">Delete</button>
    </div>

@endsection
