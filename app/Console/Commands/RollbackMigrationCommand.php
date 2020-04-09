<?php


namespace App\Console\Commands;


use App\Support\Console\Console;

class RollbackMigrationCommand extends Command
{
    protected $name = 'migrate:rollback';
    protected $help = 'Rollback Migrated Database Tables';
    protected $description = 'Rollback Database Migrations For Tables';

    protected function arguments()
    {
        return [
        ];
    }

    public function handler()
    {
        shell_exec("./vendor/bin/phinx rollback");

        $this->info("Successful (If this message is the only message, Error Would Show Above)");
    }
}
