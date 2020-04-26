<?php

namespace App\Events;

use App\User as Auth;
use Boot\Foundation\Http\Session;

class UserLogin
{
    public $user;
    public $session;

    public function __construct(Session $session, Auth $user)
    {
        $this->user = $user;
        $this->session = $session;

        return $this;
    }
}
