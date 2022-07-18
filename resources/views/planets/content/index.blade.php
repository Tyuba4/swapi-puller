@extends('master')
@section('content')
    <h2>Planets Index</h2>
    <div>
        <table>
            <tr>
                <th>Name</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
                @foreach($planets as $planet)
                     <tr>
                         <td><a href="/planets/{{ $planet->id }}">{{ $planet->name }}</a></td>
                         <td>
                             <button onclick="window.location.href='/planets/update/{{ $planet->id }}';">Update Planet</button>
                         </td>
                         <td>
                             <button>Delete Planet</button>
                         </td>
                     </tr>
                @endforeach

        </table>
        <button onclick="window.location.href='/planets/create';">Create Planet</button>
        <div class="pagination-container">
            {{ $planets->links() }}
        </div>
    </div>
@endsection
