@extends('layouts.layout')

@section('title', 'Room')

@section('content')
  <h1>Room</h1>

  <p>Numéro : <b>{{$room->getNumber()}}</b></p>

  <a href="/room/edit/{{$room->getId()}}"><button class="btn btn-success">Edit</button></a>
@endsection