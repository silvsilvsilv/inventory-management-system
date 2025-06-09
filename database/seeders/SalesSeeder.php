<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sales;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sales::factory()->create([
            'created_by' => 1, // Assuming user_id 1 is an existing user
            'total_amount' => 1499.98, // Total amount for the sale
            'created_at' => now(),
            'customer_name' => 'John Doe',
        ]);
    }
}
