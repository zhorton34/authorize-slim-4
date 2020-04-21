<?php

namespace App\Support;

use Illuminate\Support\Str;

class Route
{
    public static $app;

    public static function setup(&$app)
    {
        self::$app = $app;

        return $app;
    }

    public static function __callStatic($verb, $parameters)
    {
        $app = self::$app;

        [$route, $action] = $parameters;

        self::validation($route, $verb, $action);

        return is_callable($action)
            ? $app->$verb($route, $action)
            : $app->$verb($route, self::resolveViaController($action));
    }

    public static function resolveViaController($action)
    {
        $class = Str::before($action, '@');
        $method = Str::after($action, '@');

        $namespaces = config('routing.controllers.namespaces');

        foreach ($namespaces as $namespace)
        {
            if (class_exists($namespace . $class))
            {
                $controller = $namespace . $class;
            }
        }

        throw_when(!isset($controller), "Unresolvable action, wasn't able to find controller for {$action}");

        return [$controller, $method];
    }

    protected static function validation($route, $verb, $action)
    {
        $exception = "Unresolvable Route Callback/Controller action";
        $context = json_encode(compact('route', 'action', 'verb'));
        $fails = !((is_callable($action)) or (is_string($action) and Str::is("*@*", $action)));

        throw_when($fails, $exception . $context);
    }
}
