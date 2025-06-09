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
            'total_amount' => 1399.98, // Total amount for the sale
            'created_at' => now(),
            'customer_name' => 'John Doe',
            'product_id' => 1, // Assuming product_id 1 is an existing product
            'quantity' => 2, // Quantity of the product sold 
            'price' => 699.99, // Price per unit of the product
        ]);

        Sales::factory()->create([
            'created_by' => 2, // Assuming user_id 2 is an existing user
            'total_amount' => 2.99, // Total amount for the sale
            'created_at' => now(),
            'customer_name' => 'Jane Smith',
            'product_id' => 2, // Assuming product_id 2 is an existing product
            'quantity' => 1, // Quantity of the product sold 
            'price' => 2.99, // Price per unit of the product
        ]);

        Sales::factory()->create([
            'created_by' => 3, // Assuming user_id 3 is an existing user
            'total_amount' => 49.99, // Total amount for the sale
            'created_at' => now(),
            'customer_name' => 'Alice Johnson',
            'product_id' => 3, // Assuming product_id 3 is an existing product
            'quantity' => 1, // Quantity of the product sold 
            'price' => 49.99, // Price per unit of the product
        ]);
     
        
    }
}
