<?php


class FactoryMakeOrCreate
{
    public $model;
    public $count;
    public $defaultAttributes;

    public function __construct($model, $count, $defaultAttributes)
    {
        $this->model = $model;
        $this->count = $count;
        $this->defaultAttributes = $defaultAttributes;
    }

    public static function options(...$arguments)
    {
        return new static (...$arguments);
    }

    public function create($attributes = [])
    {
        $model = $this->model;
        $default = $this->defaultAttributes;

        $created = collect([]);

        for ($creating = 1; $creating <= $this->count; $creating++)
        {
            $created->push(
                $model::forceCreate(
                    array_merge($default(Faker\Factory::create()), $attributes)
                )
            );
        }

        return $created;
    }

    public function make($attributes = [])
    {
        $model = $this->model;
        $default = $this->defaultAttributes;

        $made = collect([]);

        for ($making = 1; $making <= $this->count; $making++)
        {
            $made->push(
                $model::make(
                    array_merge($default(Faker\Factory::create()), $attributes)
                )
            );
        }

        return $made;
    }
}
