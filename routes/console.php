<?php

use App\Support\Console\Arg;
use App\Support\Console\Command;

Command::run('make:test', function (Command $command, $file, $flag) {
    $command->console()->write($flag);
})
->define('make:test', [
    Arg::make('file', 'test.php'),
    Arg::make('flag', '--v')
]);

Command::run('make:migration', function (Command $command) {
    $command::console()->write('pit');
});
