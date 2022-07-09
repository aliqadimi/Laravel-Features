<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CallFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'std_number'=> 205,
           'str_number'=>$this->faker->phoneNumber(),
           'date'=>$this->faker->date()
        ];
    }
}
