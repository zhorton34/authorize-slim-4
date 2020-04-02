<?php

namespace App\Providers;

use Slim\App;

abstract class ServiceProvider
{
    public $app;

    public function __construct(App &$app)
    {
        $this->app = $app;
    }

    // all provider register methods run first
    abstract public function register();

    // all provider boot methods run second
    abstract public function boot();

    final public static function setup(App &$app, array $providers)
    {
        $providers = array_map(fn ($provider) => new $provider($app), $providers);

        array_walk($providers, fn (ServiceProvider $provider) => $provider->register());
        array_walk($providers, fn (ServiceProvider $provider) => $provider->boot());
    }
}
