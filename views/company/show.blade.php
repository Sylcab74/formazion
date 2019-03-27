@extends('layouts.layout')

@section('title', 'Company')

@section('content')
    <h1>Companies</h1>

    <p>Noms : <b><li>{{$company->getName()}}</li></b></p>


        <ul>
        @foreach($company->getPersons() as $person)
            <li> {{$person->getFirstname() ." " . $person->getLastname()}}</li>
        @endforeach
        </ul>



    <a href="/company/edit/{{$company->getId()}}"><button class="btn btn-success">Edit</button></a>
@endsection



