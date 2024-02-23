<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'client_id' => fake()->numberBetween(1, 100),
        'location' => fake()->address,
        'item' => fake()->sentence,
        'client_name' => fake()->name,
        'client_email' => fake()->email,
        'description' => fake()->paragraph,
        'quantity' => fake()->randomFloat(2, 1, 100),
        'unit_price' => fake()->randomFloat(2, 1, 100),
        'item_price' => fake()->randomFloat(2, 1, 100),
        ];
    }
}
