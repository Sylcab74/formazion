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

    <form action="/session/edit/{{$session->getId()}}" method="POST">
      <label for="date">Date</label>
      <input type="date" name="date" id="date" value="{{$session->getStarting()->format('Y-m-d')}}"><br>

      <label for="startHour">Start hour</label>
      <input type="time" name="startHour" id="startHour" value="{{$session->getStarting()->format('H:i')}}"><br>

      <label for="endHour">End hour</label>
      <input type="time" name="endHour" id="endHour" value="{{$session->getEnding()->format('H:i')}}"><br>
      
      <label for="report">Report</label>
      <textarea name="report" id="" cols="30" rows="10">{{$session->getReport()}}</textarea>

      <label for="hours">Hours Performed</label>
      <input type="number" name="hours" min="0" max="20" value="{{$session->getHoursPerformed()}}"/>

      <label for="room">Rooms</label>
      <select name="room" id="room">
        @foreach($rooms as $room)
          @if ($session->getRooms()->getId() === $room->getId())
            <option value="{{$room->getId()}}" selected>{{$room->getNumber()}}</option>
          @else
            <option value="{{$room->getId()}}">{{$room->getNumber()}}</option>
          @endif
        @endforeach
      </select>


      <label for="formation">Formations</label>
      <select name="formation" id="formation">
        @foreach($formations as $formation)
          @if ($session->getFormations()->getId() === $formation->getId())
            <option value="{{$formation->getId()}}" selected>{{$formation->getName()}}</option>
          @else
            <option value="{{$formation->getId()}}">{{$formation->getName()}}</option>
          @endif
        @endforeach
      </select>

      <label for="teacher">Teachers</label>
      <select name="teacher" id="teacher">
        @foreach($teachers as $teacher)
          @if ($session->getTeacher()->getId() === $teacher->getId())
            <option value="{{$teacher->getId()}}" selected>{{$teacher->getFirstname()}}</option>
          @else
            <option value="{{$teacher->getId()}}">{{$teacher->getFirstname()}}</option>
          @endif
        @endforeach
      </select>
      <input type="submit" value="Submit">
    </form>
@endsection