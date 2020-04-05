<?php

namespace Boot\Foundation\Bootstrappers;

use Zeuxisoo\Whoops\Slim\WhoopsMiddleware;

class LoadDebuggingPage extends Bootstrapper
{
    public function boot()
    {
        if (env('APP_DEBUG', false))
        {
            $this->app->add(new WhoopsMiddleware());
        }
    }
}
