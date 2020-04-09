<?php

namespace App\Support\Console;

use Boot\Foundation\Console\Command as SlimCommand;

class Command extends SlimCommand
{
    public $namespace;

    public static function execute()
    {
        Command::console()->run();
    }
}
