@extends('layouts.layout')

@section('title', 'Person')

@section('content')
  <h1>Person</h1>

  <p>Nom : <b>{{$person->getLastname()}}</b></p>
  <p>Prénom : <b>{{$person->getFirstname()}}</b></p>
  <p>Role : <b>{{$person->getRole()}}</b></p>

  @if ($person->getRole() === 'ROLE_EMPLOYEE')
    <p>Company : <b>{{$person->getCompanies()->getName()}}</b></p>
    <ul>
      @foreach($formations as $formation)
        <a href="/formation/show/{{$formation->getId()}}"><li>{{$formation->getName()}}</li></a>
      @endforeach
    </ul>
  @endif

  <a href="/person/edit/{{$person->getId()}}"><button class="btn btn-success">Edit</button></a>
  @if ($person->getRole() === 'ROLE_EMPLOYEE')
    <a href="/person/assignSession/{{$person->getId()}}"><button class="btn btn-success">Assign to session</button></a>
  @endif
@endsection