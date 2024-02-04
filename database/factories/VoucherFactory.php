<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voucher>
 */
class VoucherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $isPercentage = fake()->boolean; // 50% chance of being true

        if ($isPercentage) {
            // Generate a random percentage (up to 100%)
            $voucherValue = fake()->randomFloat(2, 0, 100) . '%';
        } else {
            // Generate a random fixed amount (e.g., between 100 and 500)
            $voucherValue = (string) fake()->randomFloat(2, 100, 500);
        }
        return [
            'Voucher_Name' => fake()->word,
            'Voucher_Expiry' => fake()->dateTimeBetween('now', '+1 year'),
            'Voucher_Value' => $voucherValue,
        ];
    }
}
