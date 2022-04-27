<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Facultad;

class FacultadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('facultads')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $facultades = DB::connection('mysql2')->table('e_fac')->get();

        foreach ($facultades as $key => $value) {
            Facultad::create([
                'name' => $value->Nombre,
                'code' => $value->Code,
                'identificador' => $value->Id_FAC,
            ]);
        }
    }
}
