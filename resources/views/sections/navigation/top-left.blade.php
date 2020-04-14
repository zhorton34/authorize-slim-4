@include('sections.navigation.logo')

@if (Auth::check())
    <a href="/home">
        Home
    </a>
@endif
