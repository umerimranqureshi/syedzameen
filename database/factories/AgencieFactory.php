<?php

namespace Database\Factories;

use App\Models\Agencie;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgencieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agencie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name"=>$this->faker->name(),
            "address"=>$this->faker->address,
            // "logo"=,
            "city"=>$this->faker->city,
            "user_id"=>$this->faker->numberBetween($min=6,$max=15),
        ];
    }
}
