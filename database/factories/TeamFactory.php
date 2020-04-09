<?php

Factory::define(\App\Team::class, fn ($faker) => [
    'name' => $faker->name,
    'user_id' => 1, // Hard Code it in
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s'),
]);
