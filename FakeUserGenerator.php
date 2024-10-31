<?php

namespace Database\Factories;

use Faker\Factory;

class FakeUserGenerator
{
    /**
     * Generate a staff user or a collection of staff users.
     * @param int $count
     * @return array|\Illuminate\Support\Collection
     */
    public static function generate(int $count = 1): array|\Illuminate\Support\Collection
    {
        $faker = Factory::create();
        $users = [];
        for ($i = 0; $i < $count; $i++) {
            $surname = $faker->unique()->lastName();
            $forename = $faker->unique()->firstName();
            $username = strtolower($forename[0] . $faker->randomLetter() . $surname[0] . random_int(1, 9) . $faker->randomLetter());
            $email = ucfirst($forename) . '.' . ucfirst($surname) . '@example.ac.uk';
            $users[] = [
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

    public static function generateStaff(int $count = 1): array|\Illuminate\Support\Collection
    {
        return self::generate($count);
    }

    /**
     * Generate a student user or a collection of student users.
     * @param int $count
     * @return array|\Illuminate\Support\Collection
     */
    public static function generateStudent(int $count = 1): array|\Illuminate\Support\Collection
    {
        $faker = Factory::create();
        $users = [];
        for ($i = 0; $i < $count; $i++) {
            $surname = $faker->unique()->lastName();
            $forename = $faker->unique()->firstName();
            $username = random_int(1000000, 9999999) . strtolower($surname[0]);
            $email = $username . '@student.example.ac.uk';
            $users[] = [
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
