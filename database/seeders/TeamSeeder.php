<?php


use Phinx\Seed\AbstractSeed;

class TeamSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        factory(\App\User::class, 10)->create()->each(function ($user) {
            factory(\App\Team::class, 5)->create([
                'user_id' => $user->id
            ]);
        });
    }
}
