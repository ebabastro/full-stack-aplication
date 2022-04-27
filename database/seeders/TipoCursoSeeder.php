<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tipo_curso;

class TipoCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('tipo_cursos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
        $carreras = DB::connection('mysql2')->table('e_tipo_curso')->get();

        foreach ($carreras as $key => $value) {
            Tipo_curso::create([
                'name' => $value->nombre,
                'code' => $value->code,                
            ]);
        }
    }
}
