<?php

namespace App\Console\Commands;

class MakeServiceProviderCommand extends MakeScaffoldCommand
{
    protected $name = 'make:provider';
    protected $help = 'Generate Service Provider';
    protected $description = 'Scaffold new Service Provider';

    protected function arguments()
    {
        return [
            'name' => $this->require('Scaffold ServiceProviderName'),
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
