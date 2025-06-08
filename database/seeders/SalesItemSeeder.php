<?php

namespace Database\Seeders;

use App\Models\SalesItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SalesItem::factory()->create([
            'sale_id' => 1, // Assuming sale_id 1 is an existing sale
            'product_id' => 1, // Assuming product_id 1 is an existing product
            'quantity' => 2,
            'price' => 699.99, // Price of the product at the time of sale
        ]);
    }
}
