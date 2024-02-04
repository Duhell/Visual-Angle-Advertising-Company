<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'FullName' => fake()->name,
            'Email' => fake()->unique()->safeEmail,
            'PhoneNumber' => fake()->phoneNumber,
            'Country' => fake()->country,
            'Province' => fake()->state,
            'City' => fake()->city,
            'Street' => fake()->streetAddress,
            'PostCode' => fake()->postcode,
            'OrderDate' => fake()->dateTimeBetween('-1 year', 'now'),
            'OrderStatus' => fake()->randomFloat(2,0,1),
            'OrderSubtotal' => fake()->randomFloat(2, 50, 500),
            'OrderShippingFee' => fake()->randomFloat(2, 5, 50),
            'OrderTotal' => fake()->randomFloat(2, 60, 550),
            'AdditionalNotes' => fake()->sentence,
        ];
    }
}
