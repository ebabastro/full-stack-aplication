<?php

namespace Database\Seeders;

use App\Models\Trabajador_area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrabajadorAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('trabajador_areas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $annos = DB::connection('mysql3')->table('t_plantilla')->get();

        foreach ($annos as $key => $value) {
            Trabajador_area::create([
                'nivel' => $value->Nivel,
                'identificador' => $value->Id_Direccion,
                'name' => $value->Desc_Direccion,
                'clave' => $value->Id_Clave,
            ]);
        }
    }
}
