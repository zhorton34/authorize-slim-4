<?php


namespace App\Console;

use Boot\Foundation\ConsoleKernel as Kernel;

class ConsoleKernel extends Kernel
{
    public array $commands = [
        Commands\MakeSeederCommand::class,
        Commands\DatabaseRunSeeders::class,
        Commands\DatabaseFreshCommand::class,
        Commands\MakeMigrationCommand::class,
        Commands\DatabaseMigrateCommand::class,
        Commands\DatabaseTableDisplayCommand::class,
        Commands\DatabaseRollbackMigrationCommand::class
    ];
}
