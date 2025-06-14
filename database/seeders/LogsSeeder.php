<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Logs;

class LogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Logs::factory()->create([
            'user_id' => 1,
            'category_id' => 1,
            'type' => 'create',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Logs::factory()->create([
            'user_id' => 2,
            'category_id' => 2,
            'type' => 'create',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Logs::factory()->create([
            'user_id' => 3,
            'category_id' => 3,
            'type' => 'create',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Logs::factory()->create([
            'user_id' => 1,
            'category_id' => 1,
            'type' => 'update',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Logs::factory()->create([
            'user_id' => 2,
            'category_id' => 2,
            'type' => 'update',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Logs::factory()->create([
            'user_id' => 3,
            'category_id' => 3,
            'type' => 'update',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Logs::factory()->create([
            'user_id' => 1,
            'product_id' => 1,
            'stock_added' => 50,
            'type' => 'create',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Logs::factory()->create([
            'user_id' => 2,
            'product_id' => 2,
            'stock_added' => 50,
            'type' => 'create',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Logs::factory()->create([
            'user_id' => 3,
            'product_id' => 3,
            'stock_added' => 50,
            'type' => 'create',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
