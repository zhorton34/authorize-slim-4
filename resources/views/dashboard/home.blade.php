@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center">
    <div class="bg-white shadow-md hover:shadow-xl rounded-lg border-2 w-4/6 p-4 mt-10">
        <h1 class="text-4xl text-gray-800 font-semibold bg-gray">
            Home Dashboard!
        </h1>

        <hr>

        <h2 class="2xl mt-2">
            Welcome {{ $user->first_name }}, {{ $user->last_name }}
        </h2>
    </div>
</div>
@endsection
