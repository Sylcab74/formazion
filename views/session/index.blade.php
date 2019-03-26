@extends('layouts.layout')

@section('title', 'Sessions')

@section('content')
    <h1>Sessions</h1>

    <div class="row">
        <div class="col-sm">
            <ul>
            @foreach($sessions as $session)
            <a href="/session/show/{{$session->getId()}}"><li>{{$session->getStarting()->format('Y-m-d H:i:s')}} - {{$session->getEnding()->format('Y-m-d H:i:s')}} \ {{$session->getFormations()->getName()}}</li></a>
            @endforeach
            </ul>
        </div>
    </div>
    
    <a href="/session/create"><button class="btn btn-success">Add a session</button></a>
@endsection
