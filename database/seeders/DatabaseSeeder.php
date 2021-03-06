<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AnnoSeeder::class);
        $this->call(CarreraNacionalSeeder::class);
        $this->call(CumSeeder::class);
        $this->call(FacultadSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(TipoCursoSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(EstudianteSeeder::class);
    }
}
