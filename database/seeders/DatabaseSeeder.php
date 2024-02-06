<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'Admin Visual',
             'email' => 'visual@example.com',
             'password' => Hash::make('Visual2024'),
        ]);

        //\App\Models\Customer::factory(500)->create();
        //\App\Models\Inquire::factory(500)->create();
        //\App\Models\Order::factory(500)->create();
        //\App\Models\Voucher::factory(500)->create();
    }
}
