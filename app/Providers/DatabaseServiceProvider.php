<?php

namespace App\Providers;

use DB;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {

        $default = config('database.default');
        $connections = config('database.connections');
        $capsule = new DB;
        $capsule->addConnection(data_get($connections, $default));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        $this->bind(DB::class, fn () => $capsule);
    }

    public function boot()
    {
        //
    }
}
