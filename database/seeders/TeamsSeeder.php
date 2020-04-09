<?php


use Phinx\Seed\AbstractSeed;

class TeamsSeeder extends AbstractSeed
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
        $users = factory(\App\User::class, 10)->create();

        $users->each(fn ($user) => factory(\App\Team::class, 1)->create([
            'user_id' => $user->id
        ]));
    }
}
