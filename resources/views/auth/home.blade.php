@extends('layouts.app')

@section('content')
    <div>
        Welcome Home {{ $user->first_name }} {{ $user->last_name }}
        <small>
            ({{ $user->email }})
        </small>
    </div>
@endsection
