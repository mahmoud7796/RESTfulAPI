<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class user_roleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1,10),
            'role_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
