<?php


namespace App\Console;

use Boot\Foundation\ConsoleKernel as Kernel;

class ConsoleKernel extends Kernel
{
    public array $commands = [
        Commands\Command::class
    ];
}
