<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrabajadorController extends Controller
{
    public function getTrabajador(Request $request)
    {

        $rules = [
            '_value' => 'required',
            '_value' => 'exists:trabajadors,ci'
        ];

        $message = [
            '_value.required' => 'Es necesario el carnet de identidad',
            '_value.exists' => 'No se encuentra en nuestras bases de datos',
        ];

        // $ci = $request->input('_value');

        $ci = $request->validate($rules, $message);

        $trabajador = DB::table('trabajadors')
            ->select('trabajadors.ci as ci',
                    DB::raw("CONCAT (trabajadors.name, ' ', trabajadors.last_name_1, ' ', trabajadors.last_name_2) as full_name"),
                    'trabajadors.address as address',
                    'trabajadors.phone as phone',
                    'trabajadors.docente as docente')
            ->where('trabajadors.ci','LIKE',$ci['_value'].'%')
            ->get();

        

        return $trabajador;



    }
}
