@extends('layouts.app')

@section('content')
    <div>
        Home Page

        {{ $team->name }}
        @foreach ($users as $user)
            <pre>
                {{ $user->name }} {{ $user->email }} {{ $user->password }}
            </pre>
        @endforeach
    </div>
@endsection
