<?php

namespace Database\Seeders;

use App\Models\Trabajador_profesion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrabajadorProfesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('trabajador_profesions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $annos = DB::connection('mysql3')->table('t_profesiones')->get();

        foreach ($annos as $key => $value) {
            Trabajador_profesion::create([
                'identificador' => $value->Id_Profesion,
                'name' => $value->Desc_Profesion
            ]);
        }
    }
}
