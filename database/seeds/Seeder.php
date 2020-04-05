<?php

use Phinx\Seed\AbstractSeed;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;


class Seeder extends AbstractSeed
{
    public static $app;
    public $factories = [];
    public $beforeSeeding;

    public static function initialize()
    {
        require base_path('vendor/autoload.php');
        self::$app = require base_path('bootstrap/app.php');

        $factories = array_map(
            fn ($factory) => database_path("factories/{$factory}.php"),
            ['UserFactory']
        );

        self::$app->getContainer()->set('factories', $factories);

        foreach ($factories as $file)
        {
            [$model, $fake] = require $file;
            $factory = (new Factory(new Faker));
            $factory->define($model, $fake);

            self::$app->getContainer()->set("{$model}Factory", $factory);
        }
    }

    public function init()
    {
        self::initialize();
    }
}
