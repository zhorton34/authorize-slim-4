<?php

namespace App\Console\Commands;

use App\Support\Console\Command;

class MakeMigrationCommand extends HandleCommand
{
    public function __invoke(Command $command, $namespace, $name, $config)
    {
        $stream = Command::console()->getStream();


        Command::console()->writeln(
            "./phinx create {$name} -configuration {$config}",
            config('console.output.output_type')
        );
    }
}
