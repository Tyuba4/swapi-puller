@extends('master')
@section('content')
    <h2>Films Index</h2>
    <div>
        <table>
            <tr>
                <th>Title</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
                @foreach($films as $film)
                     <tr>
                         <td><a href="/films/{{ $film->id }}">{{ $film->title }}</a></td>
                         <td>
                             <button onclick="window.location.href='/planets/update/{{ $film->id }}';">Update Film</button>
                         </td>
                         <td>
                             <button>Delete Film</button>
                         </td>
                     </tr>
                @endforeach

        </table>
        <button onclick="window.location.href='/films/create';">Create Film</button>
        <div class="pagination-container">
            {{ $films->links() }}
        </div>
    </div>
@endsection
