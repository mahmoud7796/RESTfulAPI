<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100,1000),
            'details' => $this->faker->text,
            'user_id' => $this->faker->numberBetween(1,10),
        ];
    }
}
