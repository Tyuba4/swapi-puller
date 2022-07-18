@extends('master')
@section('content')
    <h2>Vehicles Index</h2>
    <div>
        <table>
            <tr>
                <th>Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
                @foreach($vehicles as $vehicle)
                     <tr>
                         <td><a href="/vehicles/{{ $vehicle->id }}">{{ $vehicle->name }}</a></td>
                         <td>
                             <button onclick="window.location.href='/vehicles/update/{{ $vehicle->id }}';">Update Starship</button>
                         </td>
                         <td>
                             <button>Delete Vehicle</button>
                         </td>
                     </tr>
                @endforeach

        </table>
        <button onclick="window.location.href='/vehicles/create';">Create Vehicle</button>
        <div class="pagination-container">
            {{ $vehicles->links() }}
        </div>
    </div>
@endsection
