@if (Auth::guest())
    <a href="/register">
        Register
    </a>
    <a href="/login">
        Login
    </a>
@else
    <a href="/logout">
        Logout
    </a>
@endif
