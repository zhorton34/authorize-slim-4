<?php


use Phinx\Seed\AbstractSeed;

class UserTableSeeder extends AbstractSeed
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
        factory(App\User::class, 10)->create([
            'first_name' => 'does matter theyll save'
        ]);
    }
}
