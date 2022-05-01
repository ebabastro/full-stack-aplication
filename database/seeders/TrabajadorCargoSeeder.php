<?php

namespace Database\Seeders;

use App\Models\Trabajador_cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrabajadorCargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('trabajador_cargos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $annos = DB::connection('mysql2')->table('t_cargos')->get();

        foreach ($annos as $key => $value) {
            Trabajador_cargo::create([
                'identificador' => $value->Id_cargo,
                'name' => $value->Desc_cargo
            ]);
        }
    }
}
