@extends('layouts.layout')

@section('title', 'Session Students')

@section('content')
  <p>Session : <b>{{$studentsSession->getSessions()->getStarting()->format('Y-m-d H:i')}} - {{$studentsSession->getSessions()->getEnding()->format('Y-m-d H:i')}} ––– {{$studentsSession->getSessions()->getFormations()->getName()}}</b></p>
  <p>Student : <b>{{$studentsSession->getStudents()->getFirstname()}} {{$studentsSession->getStudents()->getLastname()}}</b></p>
  <p>Note : <b>{{$studentsSession->getNote()}}</b></p>

  <a href="/studentsSession/edit/{{$studentsSession->getId()}}"><button class="btn btn-success">Edit</button></a>
@endsection