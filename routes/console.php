<?php

use App\Support\Console\Console;

Console::command('show:example {name}', function () {
    $this->output->write($this->input->getArgument('name'));
});
