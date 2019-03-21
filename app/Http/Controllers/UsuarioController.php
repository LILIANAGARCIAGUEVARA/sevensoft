<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
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
        $data = new Usuario();
        $data->correo = $request->input('correo');
        $data->contrasena = $request->input('contrasena');
        $data->tipo =1;

        $data->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosModificadosUsuarios=\DB::table('usuarios')
            ->where('idusuarios',$id)
            ->update(['correo'=>$request->input('correo'), 'contraseña'=>$request->input('contrasena'),'tipo'=>$request->input('tipo')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminar=DB::table('usuarios')->where('usuarios.idusuarios',$id)->delete();
    }
    

      public function consulta()
    {
        $consulta=\DB::table('usuarios')
        ->select(DB::raw('idusuarios,correo,contraseña,tipo'))
        ->get();
        return view('consultaUsuarios',compact('consulta'));
    }

     public function datosModificar($id)
    {
         $modificarUsuarios=\DB::table('usuarios')
        ->select(DB::raw('idusuarios,correo,contraseña,tipo'))
        ->where('idusuarios',$id)
        ->get();
       return view('modificarUsuarios',compact('modificarUsuarios'));
    }





        public function formulario()
    {

        return view('formularioUsuario');
    }

    public function login()
    {
        return view('login');
    }

}
