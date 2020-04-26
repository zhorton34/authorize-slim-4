<!doctype html>
<html>
<head>
    <title>
        Slim 4 Authentication
    </title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
    @include('sections.navigation.top')
    @include('sections.flash.messages')

    <div id="content">
        <div class="flex flex-wrap justify-center items-center">
            <div class="bg-white shadow-md hover:shadow-xl rounded-lg border-2 w-1/2 p-4 mt-10">
                <h1 class="text-6xl text-gray-800 font-semibold">
                    Slim 4
                </h1>
                <h2 class="2xl">
                    Welcome to our slim 4 Authentication Tutorial!
                </h2>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
