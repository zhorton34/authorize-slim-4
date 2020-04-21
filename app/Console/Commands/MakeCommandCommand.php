<?php

namespace App\Console\Commands;

class MakeCommandCommand extends MakeScaffoldCommand
{
    protected $name = 'make:command';
    protected $help = 'Generate Command Scaffold';
    protected $description = 'Generate Command Scaffold';

    public function arguments()
    {
        return [
            'name' => $this->require('New Command Name')
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
