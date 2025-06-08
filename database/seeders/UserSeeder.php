<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Lebron James',
            'email' => 'admin@fake.com',
            'password' => bcrypt('admin1234'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'James Harden',
            'email' => 'james@harden.com',
            'password' => bcrypt('password'),
            'role' => 'staff',
        ]);

        User::factory()->create([
            'name' => 'Michael Jordan',
            'email' => 'michael@jordan.com',
            'password' => bcrypt('password'),
            'role' => 'staff',
        ]);
    }
}
