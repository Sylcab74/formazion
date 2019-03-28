@extends('layouts.layout')

@section('title', 'Person search')

@section('content')
    <h1>Person</h1>

    <form action="#" method="post">
        <input type="text" name="search" placeholder="Prénom">
        <submit>Search</submit>
    </form>

    @if (isset($persons))
      @foreach($persons as $person)
            <ul>
                <li>Nom : <b>{{$person->getLastname()}}</b></li>
                <li>Prénom : <b>{{$person->getFirstname()}}</b></li>
                <li>Role : <b>{{$person->getRole()}}</b></li>
            </ul>
      @endforeach
    @endif
@endsection
