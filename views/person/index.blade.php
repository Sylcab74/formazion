@extends('layouts.layout')

@section('title', 'Person')

@section('content')
    <h1>Person</h1>
    <h2>Teachers</h2>
    <div class="row">
        <div class="col-sm">
            <ul>
            @foreach($teachers as $teacher)
                <a href="/person/show/{{ $teacher->getId()}}"><li>{{ $teacher->getFirstname() }} {{ $teacher->getLastname() }}</li></a>
            @endforeach
            </ul>
        </div>
    </div>

    <h2>Employees</h2>
    <div class="row">
        <div class="col-sm">
            <ul>
            @foreach($employees as $employee)
                <a href="/person/show/{{ $employee->getId()}}"><li>{{ $employee->getFirstname() }} {{ $employee->getLastname() }}</li></a>
            @endforeach
            </ul>
        </div>
    </div>
    
    <a href="/room/create"><button class="btn btn-success">Add a room</button></a>
@endsection
