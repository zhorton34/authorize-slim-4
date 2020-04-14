@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <form class="bg-white shadow-md hover:shadow-xl rounded-lg border-2 w-1/2 p-4 mt-10 flex justify-around flex-wrap items-center" method="POST">
            <h1 class="text-2xl text-gray-600">
                Login
            </h1>

            <input
                type="email"
                name="email"
                class="w-full border-2 focus:shadow-md border-2 rounded-lg p-4 mt-6"
                placeholder="Email Address"
                required
            />

            <input
                type="password"
                name="password"
                class="w-full border-2 focus:shadow-md border-2 rounded-lg p-4 mt-6"
                placeholder="Password"
                required
            />

            <button class="bg-blue-500 w-1/2 text-white focus:shadow-md border-2 rounded-lg p-4 mt-6" type="submit">
                Login
            </button>
        </form>
    </div>
@endsection
