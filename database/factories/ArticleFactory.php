<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'user_id'=>2,
           'title'=>$this->faker->sentence(),
           'description'=>$this->faker->paragraph(),
           'image'=>$this->faker->imageUrl()
        ];
    }
}
