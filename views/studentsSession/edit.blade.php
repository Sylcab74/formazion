@extends('layouts.layout')

@section('title', 'Student session')

@section('content')
    <h1>Students session</h1>

    @if ($errors)
      <ul>
        @foreach($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif

    <form action="/studentsSession/edit/{{$studentsSession->getId()}}" method="POST">
      <label for="note">Note</label>
      <input type="text" name="note" id="note" value="{{$studentsSession->getNote()}}"><br>
      <input type="submit" value="Submit">
    </form>
@endsection