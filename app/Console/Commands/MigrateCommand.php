<?php


namespace App\Console\Commands;


class MigrateCommand extends Command
{
    protected $name = 'migrate';
    protected $help = 'Migrate Database Tables';
    protected $description = 'Migrate Database Tables';

    protected function arguments()
    {
        return [];
    }

    public function handler()
    {
        shell_exec("./vendor/bin/phinx migrate");

        $this->info("Successful (If this message is the only message, Error Would Show Above)");
    }
}
