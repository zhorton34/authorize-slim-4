<?php

namespace App\Providers;

use Illuminate\Database\Capsule\Manager as DB;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $settings = config("database.connections.mysql");
        $capsule = new DB;
        $capsule->addConnection($settings);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $this->app->getContainer()->set(DB::class, fn () => $capsule);
    }

    public function boot()
    {
        //
    }
}
