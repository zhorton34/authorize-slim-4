<?php

namespace App\Support\Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;

class Input
{
    public static function definition(array $arguments) : InputDefinition
    {
        $build = collect($arguments)->map(function ($defined) {
            $argument = (new InputArgument($defined->name));
            $argument->setDefault($defined->default);

            if (!$defined->required) return $argument;

            $argument->isRequired();

            return $argument;
        })->toArray();

        return new InputDefinition($build);
    }
}
