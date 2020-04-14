@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="bg-white shadow-md hover:shadow-xl rounded-lg border-2 w-4/5 p-4 mt-10">
            <h1 class="text-4xl text-gray-800 font-semibold">
                Home Dashboard
            </h1>
            <hr>
            <h2 class="2xl mt-6">
                {{ Auth::user()->email }} ({{ Auth::user()->first_name }}, {{ Auth::user()->last_name }})
            </h2>
        </div>
    </div>
@endsection
