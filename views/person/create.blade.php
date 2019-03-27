@extends('layouts.layout')

@section('title', 'Person')

@section('content')
    <h1>Create person</h1>

    @if ($errors)
      <ul>
        @foreach($errors as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    @endif

    <form action="/person/create" method="POST">
      <label for="firstname">Firstname</label>
      <input type="text" name="firstname" id="firstname"><br>
      <label for="lastname">Lastname</label>
      <input type="text" name="lastname" id="lastname"><br>
      <label for="firstname">Role</label>
      <select name="role" id="role">
        @foreach($roles as $role)
          <option value="{{$role}}">{{$role}}</option>
        @endforeach
      </select>
      
      <select name="company" id="company">
        @foreach($companies as $company)
          @if($person->getCompanies()->getId() === $company->getId())
            <option value="{{$company->getId()}}" selected>{{$company->getName()}}</option>
          @else
            <option value="{{$company->getId()}}">{{$company->getName()}}</option>
          @endif
        @endforeach
      </select>

      <input type="submit" value="Submit">
    </form>
@endsection