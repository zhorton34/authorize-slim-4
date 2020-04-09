<?php

namespace Boot\Foundation\Bootstrappers;

use App\Providers\ServiceProvider;

class LoadServiceProviders extends Bootstrapper
{
    public function boot()
    {
        $app = $this->app;
        $providers = config('app.providers');

        if ($app->runningViaHttpRequest()) {
            $providers = [...$providers, \App\Providers\RouteServiceProvider::class];
        } else if ($app->runningViaConsole()) {
            $Providers = [...$providers, \App\Providers\ConsoleServiceProvider::class];
        }

        ServiceProvider::setup($app, $providers);
    }
}
