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
                @yield('content')
            </div>
        </div>

        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
