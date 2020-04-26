<?php

namespace App\Events;

use Boot\Foundation\Http\Session;

class UserLogout
{
    public $session;

    public function __construct(Session $session)
    {
        $this->session = $session;

        return $this;
    }
}
