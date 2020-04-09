<?php


namespace App\Console\Commands;


class DatabaseRollbackMigrationCommand extends Command
{
    protected $name = 'migrate:rollback';
    protected $help = 'Rollback Database Migration Command';
    protected $description = 'Rollback Previous Database Migration';

    public function handler()
    {
        $command = "./vendor/bin/phinx";
        shell_exec($command);

        $this->info("Successful (If this message is the only message, Errors show above)");
    }
}
