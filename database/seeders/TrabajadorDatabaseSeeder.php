<?php

namespace Database\Seeders;

use App\Models\Trabajador_area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrabajadorDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TrabajadorAreaSeeder::class);
        $this->call(TrabajadorCargoSeeder::class);
        $this->call(TrabajadorCategoriaDocenteInvestigativaSeeder::class);
        $this->call(TrabajadorCategoriaOcupacionalSeeder::class);
        $this->call(TrabajadorGradoCientificoSeeder::class);
        $this->call(TrabajadorProfesionSeeder::class);
    }
}
