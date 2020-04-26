<?php

namespace App\Listeners;

use App\Events\UserLogout;

class FlashSuccessfullyLoggedOutMessage
{
    public function __invoke(UserLogout $event)
    {
        $event->session->flash()->add('success', 'Come back soon!');
    }
}
