@extends('layouts.layout')

@section('title', 'Formation')

@section('content')
    <h1>Formation</h1>

    @if ($errors)
      <ul>
        @foreach($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif

    <form action="/formation/edit/{{$formation->getId()}}" method="POST">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" value="{{$formation->getName()}}"><br>
      <label for="teacher">Responsible teacher</label>
      <select name="teacher" id="teacher">
        @foreach($teachers as $teacher)
          @if ($formation->getResponsibleProfessor()->getId() === $teacher->getId())
            <option value="{{$teacher->getId()}}" selected>{{$teacher->getFirstname()}}</option>
          @else
            <option value="{{$teacher->getId()}}">{{$teacher->getFirstname()}}</option>
          @endif
        @endforeach
      </select>
      <input type="submit" value="Submit">
    </form>
@endsection