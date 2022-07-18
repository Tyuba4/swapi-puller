@extends('master')
@section('content')
    <h2>People Index</h2>
    <div>
        <table>
            <tr>
                <th>Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
                @foreach($people as $person)
                     <tr>
                         <td><a href="/people/{{ $person->id }}">{{ $person->name }}</a></td>
                         <td>
                             <button onclick="window.location.href='/people/update/{{ $person->id }}';">Update Person</button>
                         </td>
                         <td>
                             <button>Delete Person</button>
                         </td>
                     </tr>
                @endforeach

        </table>
        <button onclick="window.location.href='/people/create';">Create Person</button>
        <div class="pagination-container">
            {{ $people->links() }}
        </div>
    </div>
@endsection
