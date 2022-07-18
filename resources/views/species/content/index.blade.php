@extends('master')
@section('content')
    <h2>Species Index</h2>
    <div>
        <table>
            <tr>
                <th>Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
                @foreach($species as $oneSpecies)
                     <tr>
                         <td><a href="/species/{{ $oneSpecies->id }}">{{ $oneSpecies->name }}</a></td>
                         <td>
                             <button onclick="window.location.href='/species/update/{{ $oneSpecies->id }}';">Update Species</button>
                         </td>
                         <td>
                             <button>Delete Person</button>
                         </td>
                     </tr>
                @endforeach

        </table>
        <button onclick="window.location.href='/species/create';">Create Species</button>
        <div class="pagination-container">
            {{ $species->links() }}
        </div>
    </div>
@endsection
