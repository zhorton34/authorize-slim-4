<?php

namespace App\Providers;

use App\Support\Console\Command;
use App\Support\Console\Console;

class ConsoleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Command::class, new Command);
    }

    public function boot()
    {
        require routes_path('console.php');

        collect(Console::$commands)->each(fn ($command) => Command::console()->add($command));
    }
}
