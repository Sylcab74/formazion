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

    <form action="/room/create" method="POST">
      <label for="number">Number</label>
      <input type="text" name="number" id="number"><br>
      <input type="submit" value="Submit">
    </form>
@endsection