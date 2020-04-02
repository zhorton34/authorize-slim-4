<?php

namespace App\Providers;

class ErrorMiddlewareServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->addErrorMiddleware(
            config('logging.middleware.displayErrorDetails'),
            config('logging.middleware.logErrors'),
            config('logging.middleware.logErrorDetails')
        );
    }

    public function boot()
    {

    }
}
