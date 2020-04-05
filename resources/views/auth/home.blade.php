@extends('layouts.app')

@section('content')
    <div>
        Home Page

        @if($user->actingAs('Admin', 'SuperAdmin'))
            <pre>
                {{ $user->name }} {{ $user->email }} {{ $user->password }}
            </pre>
        @endif

    </div>
@endsection
