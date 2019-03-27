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

        <label for="numberAddress">Number address</label>
        <input type="text" name="numberAddress" id="numberAddress" value="{{$company->getNumberAddress()}}"><br>

        <label for="street">Street</label>
        <input type="text" name="street" id="street" value="{{$company->getStreet()}}"><br>

        <label for="postalcode">Postal code</label>
        <input type="text" name="postalcode" id="postalcode" value="{{$company->getPostalCode()}}"><br>

        <label for="city">City</label>
        <input type="text" name="city" id="city" value="{{$company->getCity()}}"><br>

        <label for="country">Country</label>
        <input type="text" name="country" id="country" value="{{$company->getCountry()}}"><br>

        <input type="submit" value="Submit">
    </form>
@endsection