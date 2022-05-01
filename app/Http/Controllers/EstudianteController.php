<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Symfony\Component\String\length;

class EstudianteController extends Controller
{


    public function getEstudiante(Request $request)
    {

        $rules = [
            '_value' => 'required',
            '_value' => 'exists:estudiantes,ci'
        ];

        $message = [
            '_value.required' => 'Es necesario el carnet de identidad',
            '_value.exists' => 'No se encuentra en nuestras bases de datos',
        ];

        // $ci = $request->input('_value');

        $ci = $request->validate($rules, $message);

        $estudiante = DB::table('estudiantes')
            ->select('estudiantes.ci as ci',
                    DB::raw("CONCAT (estudiantes.name, ' ', estudiantes.last_name_1, ' ', estudiantes.last_name_2) as full_name"),
                    'estudiantes.address as address',
                    'estudiantes.phone as phone',
                    DB::raw("CONCAT (facultads.name,' ',cums.name) as ubicacion_escolar"),
                    'carrera_nacionals.name as carrera',
                    'tipo_cursos.name as tipo_curso',
                    'annos.name as anno')
            ->join('carreras', 'estudiantes.carrera_id','=','carreras.identificador')
            ->join('carrera_nacionals','carreras.carrera_nacional_id', '=','carrera_nacionals.identificador')
            ->join('facultads','estudiantes.facultad_id','=','facultads.identificador')
            ->join('cums','estudiantes.cum_id','=','cums.identificador')
            ->join('tipo_cursos','estudiantes.tipo_curso_id','=','tipo_cursos.id')
            ->join('annos', 'estudiantes.anno_id','=','annos.code')
            ->where('estudiantes.ci','=',$ci)
            ->where('estudiantes.estado_id','=','2')
            ->get();

            if (sizeof($estudiante) == 0) {
                return response([
                    'message' => 'No se encuentra el carnet de identidad'
                ],422);
            }
            else {
                return $estudiante;
            }



    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
