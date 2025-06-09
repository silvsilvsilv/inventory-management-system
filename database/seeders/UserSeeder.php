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
            'name' => 'John Leonil Silva',
            'email' => 'john@john.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Lorie Ann Mae Santillan',
            'email' => 'lorie@ann.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'Cheny Ann Lenohan',
            'email' => 'chenny@ann.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'Lebronus Jamus IV',
            'email' => 'lebron@james.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'Kobe Bryant',
            'email' => 'kobe@bean.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'Michael Jordan',
            'email' => 'michael@jordan.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'Stephen Curry',
            'email' => 'steph@curry.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'Kevin Durant',
            'email' => 'kevin@durant.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'James Harden',
            'email' => 'james@harden.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);

        User::factory()->create([
            'name' => 'Kyrie Irving',
            'email' => 'kyrie@irving.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);
        
        User::factory()->create([
            'name' => 'Giannis Antetokounmpo',
            'email' => 'greek@freak.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
        ]);
    }
}
