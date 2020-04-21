<?php

namespace App\Console\Commands;

class MakeMiddlewareCommand extends MakeScaffoldCommand
{
    protected $name = 'make:middleware';
    protected $help = 'Scaffold Http Middleware';
    protected $description = 'Generate or make Scaffold for new http middleware class';

    protected function arguments()
    {
        return [
            'name' => $this->require('Make Middleware Class Name'),
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
