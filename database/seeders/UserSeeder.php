<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ["name" => "admin", "role" => 1],
            ["name" => "shahrukh", "role" => 3],
            ["name" => "bilawal", "role" => 3]
        ];
        foreach ($users as $key => $user) {
            User::create([
                "id" => ++$key,
                "name" => $user["name"],
                "email" => $user["name"] . "@gmail.com",
                "password" => '$2y$10$iY/e2lmJtXGvqwdpZRbKFeI5LWHS2m/P9M8ceIEtzTg/.fz7GdTsi', //extra1010
                "role" => $user["role"],
                "mobile_number" => "$key"
            ]);
        }
    }
}
