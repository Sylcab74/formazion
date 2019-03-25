@extends('layouts.layout')

@section('title', 'Companies')

@section('content')
    <h1>Companies</h1>

    <div class="row">
        <div class="col-sm">
            <h2>Companies</h2>
            <ul>
            @foreach($companies as $company)
                <li>{{ $company->getName() }}</li>
            @endforeach
            </ul>
        </div>
    </div>
@endsection
