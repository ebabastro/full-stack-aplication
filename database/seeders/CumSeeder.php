<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cum;

class CumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('cums')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
        $carreras = DB::connection('mysql2')->table('e_cum')->get();

        foreach ($carreras as $key => $value) {
            Cum::create([
                'identificador' => $value->id_CUM,
                'name' => $value->Nombre,
                'code' => $value->Code
            ]);
        }
    }
}
