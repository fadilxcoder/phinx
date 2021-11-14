<?php


use Phinx\Seed\AbstractSeed;
use Faker\Factory as Faker;

class UserCompanySeeder extends AbstractSeed
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
        $faker = Faker::create();

        $data = [];
        for ($i = 0; $i < 100; $i++) {
            $data[] = [
                'username'      => $faker->userName,
                'email'         => $faker->email,
                'first_name'    => $faker->firstName,
                'last_name'     => $faker->lastName,
                'created'       => date('Y-m-d H:i:s'),
                'company'       => $faker->company
            ];
        }

        $users = $this->table('users');
        $users->truncate();
        $users
            ->insert($data)
            ->saveData()
        ;
    }
}
