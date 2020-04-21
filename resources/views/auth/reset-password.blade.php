@extends('layouts.app')

@section('content')

    @include('sections.errors')

    <div class="flex justify-center">
        <form class="bg-white shadow-md hover:shadow-xl rounded-lg w-1/2 p-4 mt-10 flex justify-around flex-wrap items-center" action="/reset-password/{{ $key }}" method="POST">
            @csrf
            <input
                type="password"
                name="password"
                value="{{ old('password') }}"
                placeholder="New Password"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <input
                type="password"
                name='confirm_password'
                placeholder="Confirm Password"
                class="w-full border-2 focus:shadow-md rounded-lg p-4 mt-6"
            />

            <button type="submit" class="bg-blue-500 w-1/2 text-white focus:shadow-md border-2 rounded-lg p-4 mt-6">
                Reset Password
            </button>
        </form>
    </div>
@endsection
