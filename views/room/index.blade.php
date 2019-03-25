@extends('layouts.layout')

@section('title', 'Room')

@section('content')
    <h1>Rooms</h1>

    <div class="row">
        <div class="col-sm">
            <ul>
            @foreach($rooms as $room)
                <a href="/room/show/{{ $room->getId()}}"><li>{{ $room->getNumber() }}</li></a>
            @endforeach
            </ul>
        </div>
    </div>
    
    <a href="/room/create"><button class="btn btn-success">Add a room</button></a>
@endsection
