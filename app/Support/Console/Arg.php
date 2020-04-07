<?php


namespace App\Support\Console;

class Arg
{
    public $name;
    public $default;
    public $required;

    public static function make($name, $default = null)
    {
        return new static ($name, $default);
    }

    public function __construct($name, $default = null)
    {
        $this->name = $name;
        $this->default = $default;
        $this->required = is_null($this->default);
    }

    public function require()
    {
        $this->required = true;

        return $this;
    }

    public function default($to = null)
    {
        $this->default = $to;

        return $this;
    }
}
