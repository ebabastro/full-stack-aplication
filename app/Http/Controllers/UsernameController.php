<?php

namespace App\Http\Controllers;

use App\Models\Username;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;

class UsernameController extends Controller
{

    public function createUser(Request $request){

       $rules = [
           'ci' => 'bail|required|unique:usernames,ci',
           'username' => 'bail|required|string|unique:usernames,username',
           'password' => [
               'bail',
               'required',
               'confirmed',
               Password::min(8)->mixedCase()->numbers()->symbols()
           ]
       ];
       
       $messages = [
           'ci.required' => 'El carnet de identidad es necesario',
           'ci.unique' => 'Ya existe un usuario con el carnet de identidad enviado',
           'username.required' => 'El nombre de ususario es necesario',
           'username.unique' => 'El nombre de usuario ya existe',
           'password.required' => 'La contraseña  es necesaria',
           'password.confirmed' => 'Debe confirmar la contraseña',
        //    Password::min(8) => 'La contraseña debe tener al menos 8 caracteres',
        //    Password::mixedCase() => 'La contraseña debe contener mayúsculas y minúsculas',
        //    Password::numbers() => 'La contraseña debe contener números',
        //    Password::symbols() => 'La contraseña debe contener símbolos'
       ];
        $data = $request->validate($rules, $messages);
        /** @var \App\Models\Username $user */
        $user = Username::create([
            'ci' => $data['ci'],
            'username' => $data['username'],
        ]);

        return response([
            'message' => 'Usuario creado con éxito'
        ]);
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
