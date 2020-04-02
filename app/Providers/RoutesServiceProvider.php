<?php

namespace App\Providers;

use App\Support\Route;

class RoutesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $app = Route::setApp($this->app);

        return require routes_path('web.php');
    }

    public function boot()
    {

    }
}
