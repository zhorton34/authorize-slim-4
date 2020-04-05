@extends('layouts.app')

@section('content')
    <div>
        {{ \Illuminate\Support\Str::plural($name) }} Home Page
        <pre>
            {{ $user }}
        </pre>
    </div>
@endsection
