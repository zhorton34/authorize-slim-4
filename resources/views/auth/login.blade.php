@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap justify-center">
        <form class="bg-white shadow-md hover:shadow-xl rounded-lg w-1/2 p-4 mt-10 flex justify-around flex-wrap items-center" method="POST" action="/login">
            @csrf

            <input
                name="email"
                value="{{ old('email') }}"
                placeholder="Email Address"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                name='password'
                placeholder="Password"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <button type="submit" class="bg-blue-500 w-1/2 text-white focus:shadow-md border-2 rounded-lg p-4 mt-6">
                Login
            </button>

            <div class="flex justify-end mt-4 text-gray-500 w-full">
                <a href="/reset-password">
                    Forgot Password?
                </a>
            </div>
        </form>
    </div>
@endsection
