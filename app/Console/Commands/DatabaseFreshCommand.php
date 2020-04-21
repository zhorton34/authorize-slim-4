<?php

namespace App\Console\Commands;

use DB;

class DatabaseFreshCommand extends Command
{
    protected $name = 'db:fresh';
    protected $help = 'Drop all database table and re-migrate, then re-seed all tables';
    protected $description = 'Drop all database table and re-migrate, then re-seed all tables';

    public function handler()
    {
       $column = "Tables_in_" . env("DB_DATABASE");
       $tables = DB::select("SHOW TABLES");

       foreach ($tables as $table) {
           $dropping[] = $table->$column;
       }

       if (empty($dropping)) {
           $this->info("No Tables in Database To Drop");
       } else {
           $dropping = implode(',', $dropping);

           DB::beginTransaction();

           DB::statement("DROP TABLE {$dropping}");

           DB::commit();

           $this->info("Dropped All Tables: {$dropping}");
       }

       $this->info("=============");
       $this->info("Migrating Tables");
       $this->info("=============");
       $command = './vendor/bin/phinx migrate';
       shell_exec($command);
       $this->info("Migrations Completed");

       $this->info("=============");
       $this->info("Seeding Database Tables");
       $this->info("=============");

       $command = "./vendor/bin/phinx seed:run";
       shell_exec($command);
       $this->info("Seeders Completed");
    }
}
