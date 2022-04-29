<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('estados')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        
        $carreras = DB::connection('mysql2')->table('e_estado')->get();

        foreach ($carreras as $key => $value) {
            Estado::create([
                'name' => $value->Desc_estado,                
            ]);
        }
    }
}
