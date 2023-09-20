<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'property_title'=>$this->faker->title(),
            'description'=>$this->faker->paragraph,
            'price'=>$this->faker->numberBetween($min=200000,$max=600000),
            'land_area'=>$this->faker->numberBetween($min=100,$max=500),
            'bedrooms'=>$this->faker->numberBetween($min=1,$max=4),
            'bathrooms'=>$this->faker->numberBetween($min=1,$max=4),
            "city_area_id"=>$this->faker->numberBetween($min=1,$max=25),
            'contact_person_name'=>$this->faker->name,
            'mobile_number'=>$this->faker->phoneNumber,
            'mobile2_number'=>$this->faker->phoneNumber,
            'email'=>$this->faker->email,
            'user_id'=>3,
            'property_categorie_id'=>$this->faker->numberBetween($min=1,$max=17),
            'address'=>$this->faker->address,
            'sold'=>0,
            'admin_post'=>$this->faker->randomElement($array = array ('1',null)),
            'post_boaster'=>'hot',
            'disable'=>0,
        ];
    }
}
