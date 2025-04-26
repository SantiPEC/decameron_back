<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TIpoHabitacionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $habitaciones = [
            ['nombre' => 'Estandar'],
            ['nombre' => 'Junior'],
            ['nombre' => 'Suite'],
        ];

        DB::table('tipo_habitaciones')->insert($habitaciones);
    }
}
