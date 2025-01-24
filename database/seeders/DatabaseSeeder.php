<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        \App\Models\User::truncate();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('adminPass'),
            'remember_token' => Str::random(10),
        ]);
        User::factory()->create([
            'name' => 'Vanessa Torres',
            'email' => 'vane@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('vane300'),
            'remember_token' => Str::random(10),
        ]);
    }
}
