<?php

namespace App\Console;

class ConsoleKernel extends \Boot\Foundation\ConsoleKernel
{
    /**
     * The Console Commands We Want To Boot up for our Console App
     * @var array
     */
    public $commands = [
        Commands\MigrateCommand::class,
        Commands\MakeSeederCommand::class,
        Commands\SeedDatabaseCommand::class,
        Commands\FreshDatabaseCommand::class,
        Commands\MakeMigrationCommand::class,
        Commands\DatabaseTableDisplay::class,
        Commands\RollbackMigrationCommand::class,
    ];
}
