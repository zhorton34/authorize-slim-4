<?php

namespace Boot\Foundation\Providers;

use Illuminate\Filesystem\Filesystem;

class FileSystemServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Filesystem::class, fn () => new Filesystem);
    }

    public function boot()
    {

    }
}
