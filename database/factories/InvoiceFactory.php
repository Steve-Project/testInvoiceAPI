<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $statuses = [null, 'sent', 'late', 'paid', 'canceled'];
        // TODO : Add date logic based on status
        return [
            'customer' => fake()->name(),
            'number' => fake()->unique()->uuid(),
            'status' => $statuses[rand(0,4)],
            'sent_at' => now(),
            'paid_at' => now(),
            'internal_note' => fake()->text()
        ];
    }
}
