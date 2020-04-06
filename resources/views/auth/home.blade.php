@extends('layouts.app')

@section('content')
    <div>
        Home Page

        @foreach ($users as $user)
            <pre>
                {{ $user->name }} {{ $user->email }} {{ $user->password }}
            </pre>
        @endforeach
    </div>
@endsection
