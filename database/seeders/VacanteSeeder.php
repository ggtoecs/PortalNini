<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Vacante;
use App\Models\MejorarPerfil;

class VacanteSeeder extends Seeder
{
    public function run(): void
    {
        // Obtener el usuario empleador (Vanessa Torres)
        $empleador = User::where('email', 'vane@gmail.com')->first();

        if ($empleador) {
            Vacante::create([
                'titulo' => 'Desarrollador Backend Laravel',
                'descripcion' => 'Se busca desarrollador con experiencia en Laravel y bases de datos MySQL.',
                'salario' => 15000.00,
                'ubicacion' => 'Ciudad de México',
                'tipo_trabajo' => 'remoto',
                'empleador_id' => $empleador->id,
            ]);

            Vacante::create([
                'titulo' => 'Diseñador UI/UX',
                'descripcion' => 'Responsable del diseño de interfaces y experiencia de usuario para aplicaciones web.',
                'salario' => 12000.00,
                'ubicacion' => 'Monterrey, Nuevo León',
                'tipo_trabajo' => 'presencial',
                'empleador_id' => $empleador->id,
            ]);

            Vacante::create([
                'titulo' => 'Analista de Datos',
                'descripcion' => 'Se requiere experiencia con herramientas de análisis como Power BI y Python.',
                'salario' => 18000.00,
                'ubicacion' => 'Guadalajara, Jalisco',
                'tipo_trabajo' => 'remoto',
                'empleador_id' => $empleador->id,
            ]);
        } else {
            echo "⚠️ Usuario empleador no encontrado. Asegúrate de ejecutar primero el UserSeeder.";
        }
    }
}
