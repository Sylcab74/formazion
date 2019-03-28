@extends('layouts.layout')

@section('title', 'Person')

@section('content')
  <h1>Person</h1>

  <p>Nom : <b>{{$person->getLastname()}}</b></p>
  <p>Prénom : <b>{{$person->getFirstname()}}</b></p>
  <p>Role : <b>{{$person->getRole()}}</b></p>

  @if ($person->getRole() === 'ROLE_EMPLOYEE')
    <p>Company : <b>{{$person->getCompanies()->getName()}}</b></p>
    
    <h2>Sessions</h2>
    <ul>
      @foreach($person->getStudents() as $session)
        <a href="/studentsSession/show/{{$session->getId()}}"><li>{{$session->getSessions()->getStarting()->format('Y-m-d H:i')}} – {{$session->getSessions()->getEnding()->format('Y-m-d H:i')}}</li></a>
      @endforeach
    </ul>
  @else 
    <h2>Sessions</h2>
    <ul>
      @foreach($person->getSessions() as $session)
        <a href="/session/show/{{$session->getId()}}"><li>{{$session->getStarting()->format('Y-m-d H:i')}} – {{$session->getEnding()->format('Y-m-d H:i')}}</li></a>
      @endforeach
    </ul>
    <h2>Formations</h2>
    <ul>
      @foreach($person->getFormations() as $formation)
        <a href="/formation/show/{{$formation->getId()}}"><li>{{$formation->getName()}}</li></a>
      @endforeach
    </ul>
  @endif

  <a href="/person/edit/{{$person->getId()}}"><button class="btn btn-success">Edit</button></a>
  @if ($person->getRole() === 'ROLE_EMPLOYEE')
    <a href="/person/assignSession/{{$person->getId()}}"><button class="btn btn-success">Assign to session</button></a>
  @endif
@endsection