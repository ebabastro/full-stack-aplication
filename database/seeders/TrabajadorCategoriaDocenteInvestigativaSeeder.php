<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Trabajador_categoria_docente_investigativa;

class TrabajadorCategoriaDocenteInvestigativaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('trabajador_categoria_docente_investigativas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $annos = DB::connection('mysql3')->table('t_categorias_docente_invest')->get();

        foreach ($annos as $key => $value) {
            Trabajador_categoria_docente_investigativa::create([
                'identificador' => $value->Id_Categoria_DI,
                'name' => $value->Desc_Categoria_DI,
                'code' => $value->Identificacion_DI,
                'clasificacion' => $value->Clasificacion_DI,
                'annos' => $value->Anos_DI,
            ]);
        }
    }
}
