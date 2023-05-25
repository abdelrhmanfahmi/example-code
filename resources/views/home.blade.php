@extends('app.index')
@section('main')

    <div>
        <h3>welcome {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h3>
    </div>


@endsection
