<?php

use Faker\Factory as Factory;
use Phinx\Seed\AbstractSeed;

class DatabaseShemaTableSeeder extends AbstractSeed
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
        $faker = Factory::create();

        /* users */

        $userAmount = 3000000; # Change only this
        $users = $this->table('users');
        $users->truncate();

        for ($i=1; $i<=$userAmount; $i++) :
            $userSet = [
                'username' => $faker->userName(),
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'is_enable' => true,
                'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
            ];
            $users
                ->insert($userSet)
                ->saveData()
            ;
        endfor;

        /* credit_cards */

        $creditCardAmount = $userAmount / 10;
        $creditCards = $this->table('credit_cards');
        $creditCards->truncate();

        for ($i=1; $i<=$creditCardAmount; $i++) :
            $creditCardSet = [
                'user_id' => rand(1, $userAmount),
                'type' => $faker->creditCardType(),
                'number' => $faker->creditCardNumber(),
                'amount' => rand(99999, 999999),
            ];
            $creditCards
                ->insert($creditCardSet)
                ->saveData()
            ;
        endfor;

        /* informations */

        $informationAmount = $userAmount / 10;
        $informations = $this->table('informations');
        $informations->truncate();

        for ($i=1; $i<=$informationAmount; $i++) :
            $informationSet = [
                'user_id' => rand(1, $userAmount),
                'ipv4' => $faker->localIpv4(),
                'ipv6' => $faker->ipv6(),
                'email' => $faker->safeEmail(),
                'mac_address' => $faker->macAddress(),
            ];
            $informations
                ->insert($informationSet)
                ->saveData()
            ;
        endfor;
    }
}
