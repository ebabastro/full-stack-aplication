<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function getAreas(){
        $facultades = DB::table('facultads')->select('name')->take(7)->get();
        // return response([
        //     'areas' => $facultades,
        // ]);
        return $facultades;
    }
}
