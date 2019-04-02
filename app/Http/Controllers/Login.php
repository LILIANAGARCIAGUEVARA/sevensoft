<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\DB;
class Login extends Controller
{
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
        $data=\DB::table('usuarios')
        ->where('idusuarios',$id)->get();
            return view('recuperar',compact('data'));
            }


    public function updatecontra(Request $request, $id)
    {
    
        $data=\DB::table('usuarios')
        ->where('idusuarios',$id)
        ->update(['contraseña'=>$request->input('contrasena')]);
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



    public function consulta(){
        $consultarUsuario=\DB::table('usuarios')
        ->select(DB::raw('idusuarios,correo,contraseña,tipo'))
        ->get(); 
        return view ('login',compact('consultarUsuario'));
    }

    public function login($usuario,$contrasena)
    {

        $datos = DB::table('Usuarios')->where('correo',$usuario)->where('contraseña',$contrasena)->get();
        return view('control',compact('datos'));
    }

    
    public function recuperar($usuario,$pregunta,$respuesta){
        $datos= DB::table('Usuarios')->where('correo',$usuario)->where('pregunta',$pregunta)->where('respuesta',$respuesta)->get();
        return view('control2',compact('datos'));
    }



}
