<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Customer_id' => function () {
            // Get a random customer ID from existing customers
                return \App\Models\Customer::inRandomOrder()->first()->id;
            },
            'Product' => fake()->word,
            'Quantity' => fake()->randomNumber(2),
            'Price' => fake()->randomFloat(2, 10, 100),
            'SubTotal' => fake()->randomFloat(2, 50, 500),
        ];
    }
}
