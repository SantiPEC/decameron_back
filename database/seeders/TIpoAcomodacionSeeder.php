<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TIpoAcomodacionSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $acomodacion = [
            ['nombre' => 'Sencilla'],
            ['nombre' => 'Doble'],
            ['nombre' => 'Triple'],
            ['nombre' => 'Cuadruple'],
        ];

        DB::table('tipo_acomodaciones')->insert($acomodacion);
    }
}
