<?php

class Factory
{
    public static $definitions;

    public function __invoke(string $model, $count = 1)
    {
        $this->loadFactoryFor($model);

        return FactoryMakeOrCreate::options($model, $count, static::$definitions[$model]);
    }

    public function loadFactoryFor($model)
    {
        $name = class_basename($model);
        $factory = "{$name}Factory";

        require_once database_path("factories/{$factory}.php");
    }

    public static function define(string $model, callable $fake)
    {
        self::$definitions[$model] = $fake;

        return new static;
    }
}
