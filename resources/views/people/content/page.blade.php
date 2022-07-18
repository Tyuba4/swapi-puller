@extends('master')
@section('content')
    <h2>Person</h2>
    <a href="/people">Go to index People ></a>
    <h2>{{ $person->name }}</h2>
    <div><b>Height</b> - {{ $person->height }}</div>
    <div><b>Mass</b> - {{ $person->mass }}</div>
    <div><b>Hair Color</b> - {{ $person->hair_color }}</div>
    <div><b>Skin Color</b> - {{ $person->skin_color }}</div>
    <div><b>Eye Color</b> - {{ $person->eye_color }}</div>
    <div><b>Birth year</b> - {{ $person->birth_year }}</div>
    <div><b>Gender</b> - {{ $person->gender }}</div>
    @if ($person->planet !== null)
        <div><b>Homeworld</b> - {{ $person->planet->name }}</div>
    @else
        <div><b>Homeworld</b> - unknown</div>
    @endif
    @if ($person->species !== null)
        <div><b>Species</b> - {{ $person->species->name }}</div>
    @else
        <div><b>Species</b> - unknown</div>
    @endif
    <div>
        <button onclick="window.location.href='/people/update/{{ $person->id }}';">Update</button>
    </div>
    <div>
        <button onclick="window.location.href='/people/delete/{{ $person->id }}';">Delete</button>
    </div>

@endsection
