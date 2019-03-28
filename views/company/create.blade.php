@extends('layouts.layout')

@section('title', 'Companies')

@section('content')
    <h1>Companies</h1>

    @if ($errors)
        <ul>
            @foreach($errors as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="/company/create" method="POST">

        <label for="name">Name</label>
        <input type="text" name="name" id="name"><br>

        <label for="numberAddress">address number</label>
        <input type="text" name="numberAddress" id="numberAddress"><br>

        <label for="street">street</label>
        <input type="text" name="street" id="street"><br>

        <label for="postalcode">postal code</label>
        <input type="text" name="postalcode" id="postalcode"><br>

        <label for="city">city</label>
        <input type="text" name="city" id="city"><br>

        <label for="country">country</label>
        <input type="text" name="country" id="country"><br>

        <input type="submit" value="Submit">
    </form>
@endsection