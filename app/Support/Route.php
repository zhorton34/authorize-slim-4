<?php

namespace App\Support;

use Illuminate\Support\Str;

class Route
{
    public static function __callStatic($verb, $parameters)
    {
        [$route, $action] = $parameters;

        self::validation($route, $verb, $action);

        return is_callable($action)
            ? app()->$verb($route, $action)
            : app()->$verb($route, self::resolutionViaController($action));
    }

    public static function resolutionViaController($action)
    {
        $class = Str::before($action, '@');
        $method = Str::after($action, '@');
        $controller = config('routing.controllers.namespace') . $class;

        return [$controller, $method];
    }

    protected static function validation($route, $verb, $action)
    {
        $exception = "Unresolvable Callback/Controller route action. \n";
        $context = json_encode(compact('route', 'action', 'verb'));
        $fails = !((is_callable($action)) or (is_string($action) and Str::is('*@*', $action)));

        throw_when($fails, $exception . $context);
    }
}

