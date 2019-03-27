@extends('layouts.layout')

@section('title', 'Person')

@section('content')
    <h1>Person</h1>
    <div class="row">
        <div class="col-sm">
            <h2>Teachers</h2>
            <ul>
            @foreach($teachers as $teacher)
                <a href="/person/show/{{ $teacher->getId()}}"><li>{{ $teacher->getFirstname() }} {{ $teacher->getLastname() }}</li></a>
            @endforeach
            </ul>
        </div>

        <div class="col-sm">
            <h2>Employees</h2>
            <ul>
            @foreach($employees as $employee)
                <a href="/person/show/{{ $employee->getId()}}"><li>{{ $employee->getFirstname() }} {{ $employee->getLastname() }}</li></a>
            @endforeach
            </ul>
        </div>
    </div>
    
    <a href="/person/create"><button class="btn btn-success">Add a Person</button></a>
@endsection
