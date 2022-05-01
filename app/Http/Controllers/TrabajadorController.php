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
                    'trabajadors.docente as docente',
                    'trabajador_categoria_ocupacionals.name as cate_ocupa',
                    'trabajador_areas.name as area',
                    'trabajador_categoria_docente_investigativas.name as cate_di',
                    'trabajador_cargos.name as cargo',
                    'trabajador_grado_cientificos.name as grado_cientifico')
            ->join('trabajador_categoria_ocupacionals', 'trabajadors.categoria_ocupa_id','=','trabajador_categoria_ocupacionals.identificador')
            ->join('trabajador_categoria_docente_investigativas', 'trabajadors.categoria_dinvest_id','=','trabajador_categoria_docente_investigativas.identificador')
            ->join('trabajador_areas', 'trabajadors.direccion_id','=','trabajador_areas.identificador')
            ->join('trabajador_cargos', 'trabajadors.cargo_id','=','trabajador_cargos.identificador')
            ->join('trabajador_grado_cientificos', 'trabajadors.grado_cientifico_id','=','trabajador_grado_cientificos.identificador')
            ->where('trabajadors.ci','LIKE',$ci['_value'].'%')
            ->where('trabajadors.baja','=','0')
            ->get();

        

        return $trabajador;



    }
}
