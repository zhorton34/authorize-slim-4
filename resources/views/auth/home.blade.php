@extends('layouts.app')

@section('content')
    <div>
        Home Page {{ env('NON_EXISTING_ENV_VALUE', 'Value Default To Me!!') }}
    </div>
@endsection
