@extends('layouts.layout')

@section('title', 'Company')

@section('content')
    <h1>Companies</h1>



    <p>Name : <b>{{$company->getName()}}</b></p>
    <p>Number Address : <b>{{$company->getNumberAddress()}}</b></p>
    <p>Street : <b>{{$company->getStreet()}}</b></p>
    <p>Postal code : <b>{{$company->getPostalCode()}}</b></p>
    <p>City : <b>{{$company->getCity()}}</b></p>
    <p>Country : <b>{{$company->getCountry()}}</b></p>


    <h2>Persons</h2>
    <ul>
    @foreach($company->getPersons() as $person)
        <li> {{$person->getFirstname() ." " . $person->getLastname()}}</li>
    @endforeach
    </ul>


    <a href="/company/edit/{{$company->getId()}}"><button class="btn btn-success">Edit</button></a>
@endsection
