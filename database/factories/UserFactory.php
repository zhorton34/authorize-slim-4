<?php

Factory::define(\App\User::class, fn ($faker) => [
    'first_name' => $faker->firstName,
    'last_name' => $faker->lastName,
    'email' => $faker->unique()->email,
    'password' => sha1('secret'),
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s'),
]);
