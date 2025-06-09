<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::factory()->create([
            'name' => 'Electronics',
            'description' => 'Devices and gadgets',
        ]);
        Categories::factory()->create([
            'name' => 'Produce',
            'description' => 'Fresh fruits and vegetables',
        ]);
        Categories::factory()->create([
            'name' => 'Clothing',
            'description' => 'Apparel and accessories',
        ]);
    }
}
