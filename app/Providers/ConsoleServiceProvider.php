<?php

namespace App\Providers;

use App\Support\Console;
use Boot\Foundation\Kernel;

class ConsoleServiceProvider extends ServiceProvider
{
    public function register()
    {

    }

    public function boot()
    {
        require routes_path('console.php');

        $kernel = $this->app->resolve(Kernel::class);

        $route_commands = Console::commands();
        $kernel_commands = collect($kernel->commands)->map(fn ($command) => new $command);

        collect([...$kernel_commands, ...$route_commands])->each(
            fn ($command) => Console::console()->add($command)
        );
    }
}
