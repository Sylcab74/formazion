@extends('layouts.layout')

@section('title', 'Formations')

@section('content')
    <h1>Formations</h1>

    <div class="row">
        <div class="col-sm">
            <ul>
            @foreach($formations as $formation)
                <a href="/formation/show/{{ $formation->getId()}}"><li>{{ $formation->getName() }}</li></a>
            @endforeach
            </ul>
        </div>
    </div>
    
    <a href="/formation/create"><button class="btn btn-success">Add a formation</button></a>
@endsection
