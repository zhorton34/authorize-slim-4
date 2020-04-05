<?php

namespace App\Providers;

use Zeuxisoo\Whoops\Slim\WhoopsMiddleware;

class DebugServiceProvider extends ServiceProvider
{
    public $bindings = [
        WhoopsMiddleware::class
    ];

    public function register()
    {
        if (env('APP_DEBUG')) {
            /** Add beautified debugging screen */
            $this->app->add(
                $this->resolve(WhoopsMiddleware::class)
            );
        }
    }

    public function boot()
    {
        //
    }
}
