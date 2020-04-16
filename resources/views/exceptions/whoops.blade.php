@extends('layouts.app')

@section('content')
    <div class="pl-8 pr-8">
        <div class="bg-red-500 shadow-md hover:shadow-xl rounded-lg border-2 p-6 mt-8">
            <h1 class="text-white text-5xl">
                Whoops! {{ $title }}
            </h1>
            <hr>
            <h2 class="text-white lg:text-xl mt-4">
                Http Code: {{ $run->sendHttpCode() }}
            </h2>
        </div>

        <hr>

        <div class="flex flex-wrap justify-between items-start bg-gray-200 shadow-md hover:shadow-xl rounded-lg border-2 p-6 mt-8">
            <div class="text-gray-700 mt-6 p-10 text-xl w-45% mr-2 ml-2 bg-white shadow-md hover:shadow-xl rounded-lg border-2">
                <h3 class="xl:text-gray-800">
                    Exception Message
                </h3>
                <hr>
                {{ $message }}
            </div>


            <div class="text-gray-700 mt-6 p-10 text-xl w-45% mr-2 ml-2 bg-white shadow-md hover:shadow-xl rounded-lg border-2">
                <h3 class="xl:text-gray-800">
                    Exception Request Input
                </h3>
                <hr>
                <ul>
                    @foreach ($input as $name => $value)
                        <li>
                            <strong>{{ $name }}</strong>: {{ $value }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="text-gray-700 mt-6 p-10 text-xl w-45% mr-2 ml-2 bg-white shadow-md hover:shadow-xl rounded-lg border-2">
                <h3 class="xl:text-gray-800">
                    Stack Trace
                </h3>
                <h4>
                    (Open browser console for full stack trace)
                </h4>
                <hr>
                <stack-trace :stack="{{ json_encode($stack) }}"></stack-trace>
            </div>
        </div>
    </div>
@endsection
