<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            $user = new User();
            $user->f_name = $faker->name;
            $user->m_name = $faker->name;
            $user->l_name = $faker->name;
            $user->dob = $faker->date;
            $user->email = $faker->email;
            $user->save();
        }
    }
}
