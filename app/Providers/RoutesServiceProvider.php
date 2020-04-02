<?php

namespace App\Providers;

use App\Support\Route;

class RoutesServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::setup($this->app);
    }

    public function boot()
    {
        require routes_path('web.php');
    }
}
