<?php

namespace Boot\Foundation\Bootstrappers;

use Boot\Foundation\Http\Session;

class LoadSession extends Bootstrapper
{
    public function boot()
    {
        $session = new Session();
        $session->start();

        $this->app->bind(Session::class, $session);
    }
}
