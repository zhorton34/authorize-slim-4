<?php

namespace App\Console\Commands;

use App\Support\Console\Arg;
use App\Support\Console\Command;

class MakeMigrationCommand extends HandleCommand
{
    public $namespace = 'make:migration';
    public $description = 'Scaffold A Database Migration';

    public function arguments()
    {
        return [
            Arg::make('name')->require(),
            Arg::make('config', "-c " . config_path('migrations.php'))
        ];
    }

    public function handle($name, $config)
    {
        Command::console()->write('hello world of slim commands');
        Command::shell("./phinx create {$name} {$config}");
    }
}
