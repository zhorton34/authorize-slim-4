<?php

namespace App\Providers;

use App\Support\Console\Arg;
use App\Support\Console\Command;

class ConsoleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Command::class, new Command);

        Command::define('make:migration', [
            Arg::make('name', 'ExampleMigrationFile'),
            Arg::make('flag', '-c')->require(),
            Arg::make('config_path', './config/migrations')
        ]);
    }

    public function boot()
    {
        require routes_path('console.php');
    }
}
