@extends('layouts.layout')

@section('title', 'Formation')

@section('content')
  <h1>Formation</h1>

  <p>Name : <b>{{$formation->getName()}}</b></p>
  <p>Teacher : <b>{{$formation->getResponsibleProfessor()->getFirstname()}} {{$formation->getResponsibleProfessor()->getLastname()}}</b></p>
  <p>Sessions : </p>
  <ul>
    @foreach($formation->getSession() as $session)
      <a href="/session/show/{{$session->getId()}}"><li>{{$session->getStarting()->format('Y-m-d H:i:s')}} - {{$session->getEnding()->format('Y-m-d H:i:s')}}</li></a>
    @endforeach
  </ul>

  <a href="/formation/edit/{{$formation->getId()}}"><button class="btn btn-success">Edit</button></a>

@endsection