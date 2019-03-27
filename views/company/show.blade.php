@extends('layouts.layout')

@section('title', 'Company')

@section('content')
    <h1>Companies</h1>


    <h2> {{$company->getName()}} </h2>
    <h3> {{$company->getNumberAddress() ." ". $company->getStreet()}} </h3>
    <h3> {{$company->getPostalCode() . " " . $company->getCity() . " " . $company->getCountry()}}</h3>


    <br/>

        <ul>
        @foreach(($company->getPersons()) as $person)
            <li> {{$person->getFirstname()}}</li>
                <li> {{$person->getFirstname()}}</li>
        @endforeach
        </ul>



    <a href="/company/edit/{{$company->getId()}}"><button class="btn btn-success">Edit</button></a>
@endsection



