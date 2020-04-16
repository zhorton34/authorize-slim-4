<?php

namespace App\Providers;

use Boot\Foundation\Providers\SlimServiceProvider;

abstract class ServiceProvider extends SlimServiceProvider
{
    abstract public function register();
    abstract public function boot();
}
