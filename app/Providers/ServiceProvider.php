<?php

namespace App\Providers;

use Boot\Foundation\Providers\ServiceProvider as FoundationServiceProvider;

abstract class ServiceProvider extends FoundationServiceProvider
{
    abstract public function register();
    abstract public function boot();
}
