<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
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



    public function consulta(){
        $consultarUsuario=\DB::table('usuarios')
        ->select(DB::raw('idusuarios,correo,contraseña,tipo'))
        ->get(); 

  

        return view ('login',compact('consultarUsuario'));
    }

    public function login(Request $request,$usuario,$contrasena)
    {
       

       
      $vaso=DB::table('Usuarios')
      ->select(DB::raw('contraseña'))
      ->where('correo',$usuario)
      ->get();

      $vaso2=decrypt($vaso[0]->contraseña);
       $datos = DB::table('Usuarios')
       ->where('correo',$usuario)
       ->get();
     
       if($vaso2==$contrasena)
       {

          $contra=$vaso2;
       }
      
    
        return view('control',compact('datos','contra'));
    }

}
