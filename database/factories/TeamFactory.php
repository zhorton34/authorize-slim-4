<?php


Factory::define(\App\Team::class, fn ($faker) => [
    'name' => $faker->firstName,
    'user_id' => 1, // Hard Code/Override User Id
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s'),
]);

