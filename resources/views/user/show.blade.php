@extends('layouts.app')

@section('content')
    <div>
        <h1>Welcome {{ $name }}</h1>
        <small>(Your id is {{ $id }})</small>
    </div>
@endsection
