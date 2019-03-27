@extends('layouts.layout')

@section('title', 'Accueil')

@section('content')
    <h1>Le contenu de Formazion</h1>
    

    <div class="row">
        <div class="col-sm">
            <h2>Employees</h2>
            <ul>
            @foreach($employees as $employee)
                <a href="/person/show/{{$employee->getId()}}"><li>{{ $employee->getFirstname() }}</li></a>
            @endforeach
            </ul>
        </div>
        <div class="col-sm">
            <h2>Teachers</h2>
            <ul>
            @foreach($teachers as $teacher)
                <a href="/person/show/{{$teacher->getId()}}"><li>{{ $teacher->getFirstname() }}</li></a>
            @endforeach
            </ul>
        </div>
        <div class="col-sm">
            <h2>Companies</h2>
            <ul>
            @foreach($companies as $company)
                <a href="/company/show/{{$company->getId()}}"><li>{{ $company->getName() }}</li></a>
            @endforeach
            </ul>
        </div>
        <div class="col-sm">
            <h2>Formations</h2>
            <ul>
            @foreach($formations as $formation)
                <a href="/formation/show/{{$formation->getId()}}"><li>{{ $formation->getName() }}</li></a>
            @endforeach
            </ul>
        </div>
    </div>
@endsection
