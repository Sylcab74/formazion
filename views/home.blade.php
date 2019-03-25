@extends('layouts.layout')

@section('title', 'Accueil')

@section('content')
    <h1>Le contenu de Formazion</h1>
    

    <div class="row">
        <div class="col-sm">
            <h2>Employees</h2>
            <ul>
            @foreach($employees as $employee)
                <li>{{ $employee->getFirstname() }}</li>
            @endforeach
            </ul>
        </div>
        <div class="col-sm">
            <h2>Teachers</h2>
            <ul>
            @foreach($teachers as $teacher)
                <li>{{ $teacher->getFirstname() }}</li>
            @endforeach
            </ul>
        </div>
        <div class="col-sm">
            <h2>Companies</h2>
            <ul>
            @foreach($companies as $company)
                <li>{{ $company->getName() }}</li>
            @endforeach
            </ul>
        </div>
        <div class="col-sm">
            <h2>Formations</h2>
            <ul>
            @foreach($formations as $formation)
                <li>{{ $formation->getName() }}</li>
            @endforeach
            </ul>
        </div>
    </div>
@endsection
