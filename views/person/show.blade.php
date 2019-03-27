@extends('layouts.layout')

@section('title', 'Person')

@section('content')
  <h1>Person</h1>

  <p>Nom : <b>{{$person->getLastname()}}</b></p>
  <p>Prénom : <b>{{$person->getFirstname()}}</b></p>
  <p>Role : <b>{{$person->getRole()}}</b></p>

  @if ($person->getRole() === 'ROLE_TEACHER')
    <ul>
      @foreach($person->getFormations() as $formation)
        <a href="/formation/show/{{$formation->getId()}}"><li>{{$formation->getName()}}</li></a>
      @endforeach
    </ul>
  @endif

  <a href="/room/edit/{{$room->getId()}}"><button class="btn btn-success">Edit</button></a>
@endsection