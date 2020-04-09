<?php

namespace Boot\Foundation\Bootstrappers;

use App\Support\Console\Command;
use Symfony\Component\Console\Application;

class LoadConsoleEnvironment extends Bootstrapper
{
    public function beforeBoot()
    {
        Command::setup($this->app, new Application());
    }

    public function boot()
    {
        collect($this->kernel->commands)->each(fn ($command) => Command::console()->add(new $command));
    }
}
