@extends('layouts.layout')

@section('title', 'Session')

@section('content')
    <h1>Session</h1>

    @if ($errors)
      <ul>
        @foreach($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif

    <form action="/session/create" method="POST">
      <label for="date">Date</label>
      <input type="date" name="date" id="date"><br>

      <label for="startHour">Start hour</label>
      <input type="time" name="startHour" id="startHour"><br>

      <label for="endHour">End hour</label>
      <input type="time" name="endHour" id="endHour"><br>
      
      <label for="report">Report</label>
      <textarea name="report" id="" cols="30" rows="10"></textarea>

      <label for="hours">Hours Performed</label>
      <input type="number" name="hours" min="0" max="20"/>

      <label for="room">Rooms</label>
      <select name="room" id="room">
        @foreach($rooms as $room)
          <option value="{{$room->getId()}}">{{$room->getNumber()}}</option>
        @endforeach
      </select>


      <label for="formation">Formations</label>
      <select name="formation" id="formation">
        @foreach($formations as $formation)
          <option value="{{$formation->getId()}}">{{$formation->getName()}}</option>
        @endforeach
      </select>

      <label for="teacher">Teachers</label>
      <select name="teacher" id="teacher">
        @foreach($teachers as $teacher)
          <option value="{{$teacher->getId()}}">{{$teacher->getFirstname()}}</option>
        @endforeach
      </select>
      <input type="submit" value="Submit">
    </form>
@endsection