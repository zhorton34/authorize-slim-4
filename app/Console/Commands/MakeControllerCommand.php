<?php

namespace App\Console\Commands;

class MakeControllerCommand extends MakeScaffoldCommand
{
    /**
     * Define console command name
     * php slim make:command
     */
    protected $name = 'make:controller';
    protected $help = 'help text for console command';
    protected $description = 'description text for console command';

    protected function arguments()
    {
        return [
            'name' => $this->require('MakeController name command description'),
        ];
    }

    public function handler()
    {
        $file = $this->scaffold(
            $this->stub('file'),
            $this->stub('replace.file')
        );

        $content = $this->scaffold(
            $this->stub('content'),
            $this->stub('replace.content')
        );

        $path = "{$this->stub('make_path')}/{$file}";

        $exists = $this->files->exists($path);

        if ($exists) {
            return $this->error("{$file} already exists!");
        }

        $status = $this->files->put($path, $content);

        return $this->info("Successfully Generated {$file}! (status: {$status})");
    }
}
