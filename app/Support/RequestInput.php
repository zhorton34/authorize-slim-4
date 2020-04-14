<?php


namespace App\Support;


class RequestInput
{
    protected array $meta;
    protected array $attributes;

    public function __construct($request, $route)
    {
        $this->meta = [
            'name' => $route->getName(),
            'groups' => $route->getGroups(),
            'methods' => $route->getMethods(),
            'arguments' => $route->getArguments(),
            'currentUri' => $request->getUri()
        ];

        $this->attributes = $request->getParsedBody() ?? [];
    }

    public function all()
    {
        return $this->attributes;
    }

    public function __set($property, $value)
    {
        $this->attributes[$property] = $value;
    }

    public function __get($property)
    {
        throw_when(!isset($this->attributes[$property]), "{$property} does not exist on request input");

        return $this->attributes[$property];
    }

    public function __invoke($property)
    {
        return data_get($this->attributes, $property);
    }

    public function forget($property)
    {
        unset($this->attributes[$property]);

        return $this;
    }

    public function merge($array)
    {
        array_walk($array, fn ($value, $key) => data_set($this->attributes, $key, $value));

        return $this;
    }

    public function fill($array)
    {
        array_walk($array, fn ($value, $key) => data_fill($this->attributes, $key, $value));

        return $this;
    }

    /**
     * Define Methods To Gather Route Meta Information
     */
    public function getCurrentUri()
    {
        return data_get($this->meta, 'currentUri');
    }

    public function getName()
    {
        return data_get($this->meta, 'name');
    }

    public function getGroups()
    {
        return data_get($this->meta, 'groups');
    }

    public function getMethods()
    {
        return data_get($this->meta, 'methods');
    }

    public function getArguments()
    {
        return data_get($this->meta, 'arguments');
    }
}
