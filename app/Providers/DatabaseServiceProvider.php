<?php

namespace App\Providers;

use Illuminate\Database\Capsule\Manager;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->getContainer()->set('DB', function () {
            $capsule = new Manager;
            $capsule->addConnection(config('database.mysql'));
            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            return $capsule;
        });
    }

    public function boot()
    {
        //
    }
}
