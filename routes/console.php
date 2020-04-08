<?php

use App\Support\Console\Arg;
use App\Support\Console\Command;


Command::define('make:migration', [
    Arg::make('name', Command::arg(2)),
    Arg::make('config', "-c " . config_path('migrations.php'))
])
->run(new \App\Console\Commands\MakeMigrationCommand);


Command::define('make:test', [
    Arg::make('name'),
    Arg::make('flag'),
])
->run(function (Command $command, $flag, $namespace) {

    $command->console()->write("test {$flag} {$namespace}");

});

