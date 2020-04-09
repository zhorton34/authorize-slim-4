<?php


namespace App\Console\Commands;


class DatabaseRunSeeders extends Command
{
    protected $name = 'db:seed';
    protected $help = 'Seed Database Using Seeders';
    protected $description = 'Run Database Seeders';

    public function handler()
    {
        shell_exec("./vendor/bin/phinx seed:run");

        $this->info("Successful (If no error shown above)");
    }
}
