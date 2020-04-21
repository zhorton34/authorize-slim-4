<?php

namespace App\Console\Commands;

class MakeRequestCommand extends MakeScaffoldCommand
{
    protected $name = 'make:request';
    protected $description = 'Generate Form Request Validation Scaffold';

    public function arguments()
    {
        return [
            'name' => $this->require('Form Request Class Name')
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
