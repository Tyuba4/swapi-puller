@extends('master')
@section('content')
    <h2>Starship</h2>
    <a href="/starships">Go to index Starships ></a>
    <h2>{{ $starship->name }}</h2>
    <div><b>Model</b> - {{ $starship->model }}</div>
    <div><b>Cost</b> - {{ $starship->cost_in_credits }}</div>
    <div><b>Length</b> - {{ $starship->length }}</div>
    <div><b>Max Atmosphering Speed</b> - {{ $starship->max_atmosphering_speed }}</div>
    <div><b>Crew</b> - {{ $starship->crew }}</div>
    <div><b>Passengers</b> - {{ $starship->passengers }}</div>
    <div><b>Cargo Capacity</b> - {{ $starship->cargo_capacity }}</div>
    <div><b>Consumables</b> - {{ $starship->consumables }}</div>
    <div><b>Hyperdrive Raitng</b> - {{ $starship->hyperdrive_raitng }}</div>
    <div><b>MGLT</b> - {{ $starship->MGLT }}</div>
    <div><b>Starship Class</b> - {{ $starship->starship_class }}</div>
    @if ($starship->manufacturers->isEmpty())
        <div><b>Manufacturer</b> - unknown</div>
    @else
        <div><b>Manufacturer</b> -

            @foreach($starship->manufacturers as $manufacturer)
                {{ $manufacturer->name }},&nbsp;
            @endforeach
        </div>
    @endif

    <div>
        <button onclick="window.location.href='/starships/update/{{ $starship->id }}';">Update</button>
    </div>
    <div>
        <form method="post" action="/starships/delete/{{ $starship->id }}">
            @csrf
            <button>Delete</button>
        </form>
    </div>

@endsection
