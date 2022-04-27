<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('carreras')->truncate();
        

        $carreras = DB::connection('mysql2')->table('e_carrera')->get();

        foreach ($carreras as $key => $value) {
            Carrera::create([
                'identificador' => $value->Id_carrera,
                'facultad_id' => $value->FAC,
                'cum_id' => $value->CUM,
                'carrera_nacional_id' => $value->Id_carrera_nacional,
                'tipo_curso_id' => $value->Id_tipo_curso
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
