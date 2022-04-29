<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Trabajador_categoria_ocupacional;

class TrabajadorCategoriaOcupacionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('trabajador_categoria_ocupacionals')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $annos = DB::connection('mysql3')->table('t_categorias_ocupacionales')->get();

        foreach ($annos as $key => $value) {
            Trabajador_categoria_ocupacional::create([
                'identificador' => $value->Id_Categoria,
                'name' => $value->Desc_Categoria,
                'code' => $value->Identificacion,
                'clasificacion' => $value->Clasificacion,
            ]);
        }
    }
}
