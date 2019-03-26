@extends('layouts.layout')

@section('title', 'Session')

@section('content')
  <h1>Session</h1>

  <p>Start : <b>{{$session->getStarting()->format('Y-m-d H:i:s')}}</b></p>
  <p>End : <b>{{$session->getEnding()->format('Y-m-d H:i:s')}}</b></p>
  <p>Room : <b>{{$session->getRooms()->getNumber()}}</b></p>
  <p>Formation : <b>{{$session->getFormations()->getName()}}</b></p>
  <p>Teacher : <b>{{$session->getTeacher()->getFirstname()}} {{$session->getTeacher()->getLastname()}}</b> </p>
  <p>Report : <b>{{$session->getReport()}}</b></p>
  <p>Hours performed : <b>{{$session->getHoursPerformed()}}</b></p>
  <p>Students : </p>
  <ul>
    @foreach($studentsSession as $students)
      <a href="/studentsSession/show/{{$students->getId()}}"><li>{{$students->getStudents()->getFirstname()}} {{$students->getStudents()->getLastname()}}</li></a>
    @endforeach
  </ul>

  <a href="/session/edit/{{$session->getId()}}"><button class="btn btn-success">Edit</button></a>
  <a href="/session/delete/{{$session->getId()}}"><button class="btn btn-danger">Delete</button></a>
@endsection