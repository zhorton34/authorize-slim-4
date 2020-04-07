<?php

namespace Boot\Foundation\Bootstrappers;

class LoadAliases extends Bootstrapper
{
    public function boot()
    {
        $aliases = config('app.aliases');
        $apply_alias = fn ($path, $alias) => class_alias($path, $alias, true);

        collect($aliases)->each($apply_alias);
    }
}
