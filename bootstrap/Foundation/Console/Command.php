<?php

namespace Boot\Foundation\Console;

use Boot\Foundation\App;
use Symfony\Component\Console\Application as Console;

class Command
{
    public static $app;
    public static $console;

    public static function app()
    {
        return Command::$app;
    }

    public static function console()
    {
        return Command::$console;
    }

    public static function setup(App &$app, Console $console)
    {
        Command::$app = $app;
        Command::$console = $console;

        $app->bind(Console::class, Command::$console);
    }
}
