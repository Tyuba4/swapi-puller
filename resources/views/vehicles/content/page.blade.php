@extends('master')
@section('content')
    <h2>Vehicle</h2>
    <a href="/vehicles">Go to index Vehicles ></a>
    <h2>{{ $vehicle->name }}</h2>
    <div><b>Model</b> - {{ $vehicle->model }}</div>
    <div><b>Cost</b> - {{ $vehicle->cost_in_credits }}</div>
    <div><b>Length</b> - {{ $vehicle->length }}</div>
    <div><b>Max Atmosphering Speed</b> - {{ $vehicle->max_atmosphering_speed }}</div>
    <div><b>Crew</b> - {{ $vehicle->crew }}</div>
    <div><b>Passengers</b> - {{ $vehicle->passengers }}</div>
    <div><b>Cargo Capacity</b> - {{ $vehicle->cargo_capacity }}</div>
    <div><b>Consumables</b> - {{ $vehicle->consumables }}</div>
    <div><b>Vehicle Class</b> - {{ $vehicle->vehicle_class }}</div>
    @if ($vehicle->manufacturers->isEmpty())
        <div><b>Manufacturer</b> - unknown</div>
    @else
        <div><b>Manufacturer</b> -
            @foreach($vehicle->manufacturers as $manufacturer)
                {{ $manufacturer->name }},&nbsp;
            @endforeach
        </div>
    @endif

    <div>
        <button onclick="window.location.href='/vehicles/update/{{ $vehicle->id }}';">Update</button>
    </div>
    <div>
        <form method="post" action="/vehicles/delete/{{ $vehicle->id }}">
            @csrf
            <button>Delete</button>
        </form>
    </div>

@endsection
