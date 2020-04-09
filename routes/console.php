<?php

use App\Support\Console;

Console::command('tinker', function () {
    $team = \App\Team::first();

    $this->info("$team->name belongs to {$team->user->first_name}");
});
