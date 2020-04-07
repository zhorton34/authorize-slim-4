<?php

namespace App\Providers;

use App\Support\Route;
use App\Support\RouteGroup;

class RouteServiceProvider extends ServiceProvider
{
    public function register()
    {
        Route::setup($this->app);

        $this->app->bind(RouteGroup::class, fn () => new RouteGroup($this->app));
    }

    public function boot()
    {
        $this->apiRouteGroup()->register();
        $this->webRouteGroup()->register();
    }

    protected function apiRouteGroup() : RouteGroup
    {
        $get = routes_path('api.php');
        $add = $this->app->resolve('middleware');
        $api = $this->app->resolve(RouteGroup::class);

        return $api->routes($get)->prefix('/api')->middleware([
            ...$add['api'],
            ...$add['global']
        ]);
    }

    protected function webRouteGroup() : RouteGroup
    {
        $get = routes_path('web.php');
        $add = $this->app->make('middleware');
        $web = $this->app->make(RouteGroup::class);

        return $web->routes($get)->prefix('')->middleware([
            ...$add['web'],
            ...$add['global']
        ]);
    }
}
