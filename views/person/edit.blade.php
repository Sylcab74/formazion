@extends('layouts.layout')

@section('title', 'Person')

@section('content')
    <h1>Person</h1>

    @if ($errors)
      <ul>
        @foreach($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif

    <form action="/person/edit/{{$person->getId()}}" method="POST">
      <label for="firstname">Firstname</label>
      <input type="text" name="firstname" id="firstname" value="{{$person->getFirstname()}}"><br>
      <label for="lastname">Lastname</label>
      <input type="text" name="lastname" id="lastname" value="{{$person->getLastname()}}"><br>
      <label for="firstname">Role</label>
      <select name="role" id="role">
        @foreach($roles as $role)
          @if($person->getRole() === $role)
            <option value="{{$role}}" selected>{{$role}}</option>
          @else
            <option value="{{$role}}">{{$role}}</option>
          @endif
        @endforeach
      </select>
      <input type="text" name="firstname" id="firstname" value="{{$person->getFirstname()}}"><br>
      <input type="submit" value="Submit">
    </form>
@endsection