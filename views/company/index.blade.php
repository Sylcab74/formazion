@extends('layouts.layout')

@section('title', 'Company')

@section('content')
    <h1>Companies</h1>

    <div class="row">
        <div class="col-sm">
            <ul>
                @foreach($companies as $company)
                    <a href="/company/show/{{$company->getId()}}"><li>{{ $company->getName()}}</li></a>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="/company/create"><button class="btn btn-success">Add a company</button></a>
@endsection