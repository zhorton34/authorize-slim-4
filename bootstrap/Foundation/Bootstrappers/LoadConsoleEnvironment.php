<?php

namespace Boot\Foundation\Bootstrappers;

use App\Support\Console\Console;
use Symfony\Component\Console\Application;

class LoadConsoleEnvironment extends Bootstrapper
{
    public function beforeBoot()
    {
        $console = new Application;
        $this->app->bind(Application::class, $console);

        Console::setup($this->app, $console);
    }

    public function boot()
    {

    }
}
