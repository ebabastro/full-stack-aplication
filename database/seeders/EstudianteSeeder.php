<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Estudiante;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('estudiantes')->truncate();
        

        $carreras = DB::connection('mysql2')->table('e_estudiantes')->get();

        foreach ($carreras as $key => $value) {
            Estudiante::create([
                'ci' => $value->No_CI,
                'name' => $value->Nombre,
                'last_name_1' => $value->Apellido_1,
                'last_name_2' => $value->Apellido_2,
                'address' => $value->Direccion,
                'phone' => $value->Telefono,
                'carrera_id' => $value->Carrera,
                'tipo_curso_id' => $value->Tipo_Curso,
                'estado_id' => $value->Estado,
                'facultad_id' => $value->FAC,
                'cum_id' => $value->CUM,
                'anno_id' => $value->Id_anno,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    
    }
}
