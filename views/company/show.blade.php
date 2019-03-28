@extends('layouts.layout')

@section('title', 'Company')

@section('content')
    <h1>Companies</h1>

    <h2>{{$company->getName()}}</h2>
    <h3>{{$company->getNumberAddress() . ' ' . $company->getStreet()}}</h3>
    <h3>{{$company->getCity() . ' ' . $company->getPostalCode() }}</h3>
    <h3>{{$company->getCountry()}}</h3>

<br/>
        <ul>
        @foreach($company->getPersons() as $person)
            <li> {{$person->getFirstname() ." " . $person->getLastname()}}</li>
        @endforeach
        </ul>



    <a href="/company/edit/{{$company->getId()}}"><button class="btn btn-success">Edit</button></a>
@endsection



