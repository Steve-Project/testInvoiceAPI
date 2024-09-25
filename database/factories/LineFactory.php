<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product' => fake()->name(),
            'amount' => fake()->randomFloat(2, 10, 10000)
        ];
    }
}
