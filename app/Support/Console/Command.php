<?php

namespace App\Support\Console;


use Boot\Foundation\Console\Command as SlimCommand;

class Command extends SlimCommand
{
    public static function run($namespace, callable $execute)
    {
        Command::app()->bind("{$namespace}", $execute);

        return new static;
    }

    public static function execute()
    {
        $namespace = Command::app()->resolve('namespace');

        Command::app()->make($namespace, Command::input()->getArguments());
    }
}
