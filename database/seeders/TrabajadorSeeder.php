<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Trabajador;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('trabajadors')->truncate();
        

        $trabajadores = DB::connection('mysql2')->table('t_trabajadores')->get();

        foreach ($trabajadores as $key => $value) {
            Trabajador::create([
                'ci' => $value->No_CI,
                'name' => $value->Nombre,
                'last_name_1' => $value->Apellido_1,
                'last_name_2' => $value->Apellido_2,
                'sexo' => $value->sexo,
                'color_piel' => $value->color_piel,
                'address' => $value->Direccion,
                'phone' => $value->Telefono_Particular,
                'militancia' =>$value->militancia,
                'fecha_contratacion' =>$value->fecha_contratacion,
                'baja' =>$value->Baja,
                'fecha_baja' =>$value->fecha_baja,
                'docente' =>$value->Docente,
                'categoria_ocupa_id' =>$value->Id_Categoria,
                'categoria_dinvest_id' =>$value->Id_Categoria_DI,
                'fecha_categoria_docente' =>$value->fecha_categoria_docente,
                'grado_cientifico_id' =>$value->Id_Grado_Cientifico,
                'direccion_id' =>$value->Id_Direccion,
                'cargo_id' =>$value->Id_cargo,
                'profesion_id' =>$value->Id_Profesion,
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    
    }
}
