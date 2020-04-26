<?php

namespace App\Listeners;

use App\Events\UserLogin;

class FlashWelcomeBackMessage
{
    public function __invoke(UserLogin $event)
    {
        $event->session->flash()->add('success', 'Welcome Back!');
    }
}
