<?php

namespace Database\Factories;

use Faker\Factory;

class FakeUserGenerator
{
    /**
     * Generate a user or a collection of users.
     * @param int $count
     * @return object|\Illuminate\Support\Collection
     */
    public static function generate(int $count = 1): object
    {
        $faker = Factory::create();
        $users = [];
        for ($i = 0; $i < $count; $i++) {
            $surname = $faker->unique()->lastName();
            $forename = $faker->unique()->firstName();
            $username = strtolower($forename[0] . $faker->randomLetter() . $surname[0] . random_int(1, 9) . $faker->randomLetter());
            $email = ucfirst($forename) . '.' . ucfirst($surname) . '@example.ac.uk';
            $users[] = (object) [
                'surname' => $surname,
                'forenames' => $forename,
                'username' => $username,
                'email' => $email,
            ];
        }

        if ($count == 1) {
            return $users[0];
        }

        return collect($users);
    }
}
