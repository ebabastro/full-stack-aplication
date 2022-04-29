<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\Anno;
use Illuminate\Support\Facades\DB;



class AnnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('annos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $annos = DB::connection('mysql2')->table('e_annos')->get();

        foreach ($annos as $key => $value) {
            Anno::create([
                'name' => $value->Anno,
                'code' => $value->Code
            ]);
        }
    }
}
