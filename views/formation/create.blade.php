@extends('layouts.layout')

@section('title', 'Companies')

@section('content')
    <h1>Room</h1>

    @if ($errors)
      <ul>
        @foreach($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif

    <form action="/formation/create" method="POST">
      <label for="name">Name</label>
      <input type="text" name="name" id="name"><br>
      <label for="teacher">Responsible teacher</label>
      <select name="teacher" id="teacher">
        @foreach($teachers as $teacher)
            <option value="{{$teacher->getId()}}">{{$teacher->getFirstname()}}</option>
        @endforeach
      </select>
      <input type="submit" value="Submit">
    </form>
@endsection