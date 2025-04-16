<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('vacantes')->truncate(); 
        DB::table('users')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 🧪 Crear usuarios
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('adminPass'),
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => 'Mayte Melendez',
            'email' => 'mayteee@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'empleador',
            'remember_token' => Str::random(10),
        ]);

        User::factory()->create([
            'name' => 'Nay Palmero',
            'email' => 'nay@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('pumpurin'),
            'role' => 'postulante',
            'remember_token' => Str::random(10),
        ]);

        $this->call(VacanteSeeder::class);

    }
}
