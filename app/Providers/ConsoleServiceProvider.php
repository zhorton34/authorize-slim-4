<?php

namespace App\Providers;

use App\Support\Console\Console;

class ConsoleServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        require routes_path('console.php');

        Console::commands()->each(fn ($command) => Console::console()->add($command));
    }
}
