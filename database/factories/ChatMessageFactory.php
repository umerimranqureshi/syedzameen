<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\ChatMessage;

class ChatMessageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChatMessage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            "sender_id" => $this->faker->numberBetween($min = 1, $max = 3),
            "reciver_id" => $this->faker->numberBetween($min = 1, $max = 3),
            "message" => $this->faker->text(),

        ];
    }
}
