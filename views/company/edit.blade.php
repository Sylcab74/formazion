@extends('layouts.layout')

@section('title', 'Company')

@section('content')
    <h1>Company</h1>

    @if ($errors)
        <ul>
            @foreach($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="/company/edit/{{$company->getId()}}" method="POST">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{$company->getName()}}"><br>
        <input type="submit" value="Submit">
    </form>
@endsection