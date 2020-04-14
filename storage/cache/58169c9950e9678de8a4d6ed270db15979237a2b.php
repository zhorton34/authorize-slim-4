<?php if(Auth::guest()): ?>
    <a href="/login">
        Login
    </a>

    <a href="/register">
        Register
    </a>
<?php else: ?>
    <a href="/logout">
        Logout
    </a>
<?php endif; ?>
<?php /**PATH /home/vagrant/code/resources/views/sections/navigation/top-right.blade.php ENDPATH**/ ?>