@if (Auth::guest())
    <a href="/login">
        Login
    </a>

    <a href="/register">
        Register
    </a>
@else
    <a href="/logout">
        Logout
    </a>
@endif
