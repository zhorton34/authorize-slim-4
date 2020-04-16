<?php

namespace Boot\Foundation\Bootstrappers;

use App\Providers\ServiceProvider;

class LoadServiceProviders extends Bootstrapper
{
    public function boot()
    {
        $app = $this->app;
        $providers = config('app.providers');

        if ($app->bootedViaHttpRequest()) {
            $providers = [...$providers, \App\Providers\RouteServiceProvider::class];
        } else if ($app->bootedViaConsole()) {
            $providers = [...$providers, \App\Providers\ConsoleServiceProvider::class];
        }

        $foundation_service_providers = [
            \Boot\Foundation\Providers\FileSystemServiceProvider::class,
            \Boot\Foundation\Providers\TranslatorServiceProvider::class,
            \Boot\Foundation\Providers\ValidatorServiceProvider::class,
        ];

        ServiceProvider::setup($app, [
            ...$foundation_service_providers,
            ...$providers
        ]);
    }
}
