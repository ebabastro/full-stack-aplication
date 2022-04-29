<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera_nacional;

class CarreraNacionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('carrera_nacionals')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $carreras_nacionales = DB::connection('mysql2')->table('e_carrera_nacional')->get();

        foreach ($carreras_nacionales as $key => $value) {
            Carrera_nacional::create([
                'name' => $value->Nombre,
                'code' => $value->code,
                'identificador' => $value->Id_carrera_nacional,
            ]);
        }
    }
}
