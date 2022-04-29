<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Trabajador_grado_cientifico;

class TrabajadorGradoCientificoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('trabajador_grado_cientificos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $annos = DB::connection('mysql3')->table('t_grado_cientifico')->get();

        foreach ($annos as $key => $value) {
            Trabajador_grado_cientifico::create([
                'identificador' => $value->ID_GC,
                'name' => $value->DESC_GC,
            ]);
        }
    }
}
