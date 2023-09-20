<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'mobile_number'=>$this->faker->unique()->phoneNumber,
            'role'=>1,
            'email_verified_at' => now(),
            'password' => '$2y$10$iY/e2lmJtXGvqwdpZRbKFeI5LWHS2m/P9M8ceIEtzTg/.fz7GdTsi', // extra1010
            'remember_token' => Str::random(10),
            'address'=>$this->faker->address,
            'cnic'=>$this->faker->creditCardNumber,
        ];
    }
}
