<?php

namespace App\Events;

use App\Support\Auth;
use Boot\Foundation\Http\Session;

class UserLogin
{
    public $user;
    public $session;

    public function __construct(Session $session)
    {
        $this->user = Auth::user();
        $this->session = $session;

        return $this;
    }
}
