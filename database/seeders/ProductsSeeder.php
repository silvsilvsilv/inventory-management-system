<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Products::factory()->create([
            'name' => 'Smartphone',
            'category_id' => 1, // Assuming category_id 1 is Electronics
            'price' => 699.99,
            'stock' => 50,
        ]);

        Products::factory()->create([
            'name' => 'Organic Apples',
            'category_id' => 2, // Assuming category_id 2 is Produce
            'price' => 2.99,
            'stock' => 50,
        ]);

        Products::factory()->create([
            'name' => 'Denim Jacket',
            'category_id' => 3, // Assuming category_id 3 is Clothing
            'price' => 49.99,
            'stock' => 50,
        ]);
    }
}
