<?php

class UsersTableSeeder extends Seeder
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
        $factory = self::$app->getContainer()->get("App\UserFactory");

        for ($i = 0; $i < 5; $i++)
        {
            $factory->create(App\User::class);
        }
    }
}
