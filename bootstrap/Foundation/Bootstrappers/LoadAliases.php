<?php

namespace Boot\Foundation\Bootstrappers;

class LoadAliases extends Bootstrapper
{
    public function boot()
    {
        $aliases = config('app.aliases');

        array_walk($aliases, fn ($path, $alias) => class_alias($path, $alias, true));
    }
}
