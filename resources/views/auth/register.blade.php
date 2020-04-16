@extends('layouts.app')

@section('content')

    @include('sections.errors')

    <div class="flex justify-center">
        <form class="bg-white shadow-md hover:shadow-xl rounded-lg w-1/2 p-4 mt-10 flex justify-around flex-wrap items-center" method="POST" action="/register">
            <h1 class="text-2xl text-gray-600">
                Register
            </h1>

            @csrf

            <input
                name='first_name'
                placeholder='First Name'
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                name='last_name'
                placeholder='Last Name'
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                name="email"
                placeholder="Email Address"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                name='password'
                placeholder="Password"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                name='confirm_password'
                placeholder="Confirm Password"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <button type="submit" class="bg-blue-500 w-1/2 text-white focus:shadow-md border-2 rounded-lg p-4 mt-6">
                Register
            </button>
        </form>
    </div>
@endsection
