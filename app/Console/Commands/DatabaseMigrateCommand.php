<?php


namespace App\Console\Commands;


class DatabaseMigrateCommand extends Command
{
    protected $name = 'db:migrate';
    protected $help = 'migrate';
    protected $description = 'Migration migrations to database';

    public function handler()
    {
        shell_exec("./vendor/bin/phinx migrate");

        $this->info("Successful when no error shown above");
    }
}
