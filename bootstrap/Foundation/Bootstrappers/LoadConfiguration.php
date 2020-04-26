<?php

namespace Boot\Foundation\Bootstrappers;

use Illuminate\Support\Str;

class LoadConfiguration extends Bootstrapper
{
    public function boot()
    {
        $config = [];
        $folder = scandir(config_path());
        $config_files = array_slice($folder, 2, count($folder));

        foreach ($config_files as $file)
        {
            throw_when(
                Str::after($file, '.') !== 'php',
                'Config files must be .php files'
            );

            data_set($config, Str::before($file, '.php'), require config_path($file));
        }

        app()->bind('config', $config);
    }
}
