<?php

use App\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$fake = Faker\Factory::create();

$dummy = (fn (Faker\Generator $faker) => [
    'last_name' => $fake->lastName,
    'first_name' => $fake->firstName,
    'email' => $fake->unique()->email,
    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
]);

return [User::class, $dummy];
