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
        // 🔧 Desactivar claves foráneas temporalmente
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // 🔄 Truncar tablas en orden correcto
        DB::table('vacantes')->truncate(); // si tienes datos ahí
        DB::table('users')->truncate();    // ahora ya no da error

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
            'name' => 'Vanessa Torres',
            'email' => 'vane@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('vane300'),
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
