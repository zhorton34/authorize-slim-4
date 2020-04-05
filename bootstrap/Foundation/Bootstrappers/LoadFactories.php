<?php

namespace Boot\Foundation\Bootstrappers;

class LoadFactories extends Bootstrapper
{
    public function boot()
    {
        $aliases = config('app.aliases');

        foreach ($aliases as $alias => $points_at) {
            class_alias($points_at, $alias, true);
        }
    }
}
