<?php

namespace App\Console\Commands;

class MakeModelCommand extends MakeScaffoldCommand
{
    /**
     * Define console command name
     * php slim make:command
     */
    protected $name = 'make:model';
    protected $help = 'Scaffold Eloquent Model';
    protected $description = 'Generate The Scaffold For An Eloquent Model';

    protected function arguments()
    {
        return [
            'model' => $this->require('Model Name To Scaffold/Generate'),
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
