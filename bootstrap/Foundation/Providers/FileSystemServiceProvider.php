<?php

namespace Boot\Foundation\Providers;

use Illuminate\Filesystem\Filesystem;

class FileSystemServiceProvider extends SlimServiceProvider
{
    public function register()
    {
        $this->app->bind(Filesystem::class, new Filesystem);
    }

    public function boot()
    {

    }
}
