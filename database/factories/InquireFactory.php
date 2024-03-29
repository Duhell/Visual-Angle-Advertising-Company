<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inquire>
 */
class InquireFactory extends Factory
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
            'Message' => fake()->sentence,
        ];
    }
}
