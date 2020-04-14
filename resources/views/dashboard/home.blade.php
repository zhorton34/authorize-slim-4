@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center">
    <div class="bg-white shadow-md hover:shadow-xl rounded-lg border-2 w-5/6 p-4 mt-10">
        <h1 class="text-6xl text-gray-800 font-semibold">
            Home Dashboard!
        </h1>
        <h2 class="2xl">
            Welcome {{ $user->first_name }}, {{ $user->last_name }}
        </h2>
    </div>
</div>
@endsection
