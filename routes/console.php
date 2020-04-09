<?php

use App\Support\Console\Console;

Console::command('make:test {name} {config}', function () {
    $this->output->write($this->input->getArgument('name'));
})
->setDescription("Make Test Command");

