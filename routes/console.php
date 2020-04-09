<?php

use App\Support\Console;

Console::command('show:example {name}', function () {
    $this->output->writeln("Hello World");
})
->setDescription('Show Example Command!');
