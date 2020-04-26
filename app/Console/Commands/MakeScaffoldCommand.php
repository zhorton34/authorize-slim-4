<?php


namespace App\Console\Commands;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

abstract class MakeScaffoldCommand extends Command
{
    protected $stub;
    protected $files;

    protected function scaffold($stub, $search_and_replace)
    {
        $bindings = function ($replace, $search) {
            if (!Str::of($replace)->contains([':', '*', ':'])) {
                return $replace;
            }

            $binding = Str::of($replace)->between(':', ':');

            if (Str::contains($search, '|')) {
                $filter = Str::of($search)->between('|', '}')->__toString();

                return Str::of($this->input->getArgument($binding))->$filter()->__toString();
            }

            return $this->input->getArgument($binding);
        };

        /*$bindings = fn ($replace, $search) => Str::of($replace)->contains([':', '*', ':'])
            ? $this->input->getArgument(Str::of($replace)->between(':', ':'))
            : $replace;
        */
        $resolved = collect($search_and_replace)->map($bindings);
        $searching = $resolved->keys();

        return $searching->reduce(
            fn ($stub, $search) => Str::of($stub)->replace($search, $resolved[$search]),
            $stub
        );
    }

    public function stub($key)
    {
        return data_get($this->stub, $key);
    }

    public function afterConfiguration()
    {
        $this->stub = config("stubs.{$this->name}");
        $this->files = app()->resolve(Filesystem::class);
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
