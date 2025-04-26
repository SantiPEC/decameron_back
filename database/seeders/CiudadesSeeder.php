<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $ciudades = [
            ['nombre' => 'Bogotá', 'departamento' => 'Cundinamarca'],
            ['nombre' => 'Medellín', 'departamento' => 'Antioquia'],
            ['nombre' => 'Cali', 'departamento' => 'Valle del Cauca'],
            ['nombre' => 'Barranquilla', 'departamento' => 'Atlántico'],
            ['nombre' => 'Cartagena', 'departamento' => 'Bolívar'],
            ['nombre' => 'Cúcuta', 'departamento' => 'Norte de Santander'],
            ['nombre' => 'Bucaramanga', 'departamento' => 'Santander'],
            ['nombre' => 'Pereira', 'departamento' => 'Risaralda'],
            ['nombre' => 'Manizales', 'departamento' => 'Caldas'],
            ['nombre' => 'Armenia', 'departamento' => 'Quindío'],
            ['nombre' => 'Ibagué', 'departamento' => 'Tolima'],
            ['nombre' => 'Neiva', 'departamento' => 'Huila'],
            ['nombre' => 'Villavicencio', 'departamento' => 'Meta'],
            ['nombre' => 'Santa Marta', 'departamento' => 'Magdalena'],
            ['nombre' => 'Sincelejo', 'departamento' => 'Sucre'],
            ['nombre' => 'Montería', 'departamento' => 'Córdoba'],
            ['nombre' => 'Popayán', 'departamento' => 'Cauca'],
            ['nombre' => 'Pasto', 'departamento' => 'Nariño'],
            ['nombre' => 'Tunja', 'departamento' => 'Boyacá'],
            ['nombre' => 'Florencia', 'departamento' => 'Caquetá'],
            ['nombre' => 'Riohacha', 'departamento' => 'La Guajira'],
            ['nombre' => 'Yopal', 'departamento' => 'Casanare'],
        ];

        DB::table('ciudades')->insert($ciudades);
    }
}
