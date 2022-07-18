@extends('master')
@section('content')
    <h2>Starships Index</h2>
    <div>
        <table>
            <tr>
                <th>Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            @foreach($starships as $starship)
                <tr>
                    <td><a href="/starships/{{ $starship->id }}">{{ $starship->name }}</a></td>
                    <td>
                        <button onclick="window.location.href='/starship/update/{{ $starship->id }}';">Update Starship</button>
                    </td>
                    <td>
                        <button>Delete Starship</button>
                    </td>
                </tr>
            @endforeach

        </table>
        <button onclick="window.location.href='/starships/create';">Create Starship</button>
        <div class="pagination-container">
            {{ $starships->links() }}
        </div>
    </div>
@endsection
