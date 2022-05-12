<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AreaController extends Controller
{
    public function getAreas(){
        $areas = DB::table('areas')->select('name')->get();
        return $areas;
    }
}
