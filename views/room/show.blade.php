@extends('layouts.layout')

@section('title', 'Room')

@section('content')
  <h1>Room</h1>

  <p>Numéro : <b>{{$room->getNumber()}}</b></p>

  <ul>
  @foreach($room->getSession() as $session)
  <a href="/session/show/{{$session->getId()}}"><li>{{$session->getStarting()->format('Y-m-d H:i')}} - {{$session->getEnding()->format('Y-m-d H:i')}} </li></a>
  @endforeach
  </ul>

  <a href="/room/edit/{{$room->getId()}}"><button class="btn btn-success">Edit</button></a>
@endsection