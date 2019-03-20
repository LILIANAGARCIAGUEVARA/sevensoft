<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use Illuminate\Support\Facades\DB;
use App\Pregunta;

class Controlador extends Controller
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
        $datos=new Pregunta(); 
        $datos->idpreguntas=$request->input('idPregunta');
        $datos->descripcion=$request->get('descripcion');
        $format="Y-m-d";
        $datos->fecha=date_format(date_create($request->input('fecha')),$format);
        $datos->idCliente=$request->input('cliente');
        $datos->save();
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
        $datosModificadosUsuarios=\DB::table('usuarios')
            ->where('idusuarios',$id)
            ->update(['correo'=>$request->input('correo'), 'contraseña'=>$request->input('contrasena')]);


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminar=DB::table('usuarios')->where('usuarios.idusuarios',$id)->delete();
    }


    public function consulta()
    {
        $consulta=\DB::table('usuarios')
        ->select(DB::raw('idusuarios,correo,contraseña'))
        ->get();
        return view('consultaUsuarios',compact('consulta'));
    }

     public function datosModificar($id)
    {
         $modificarUsuarios=\DB::table('usuarios')
        ->select(DB::raw('idusuarios,correo,contraseña'))
        ->where('idusuarios',$id)
        ->get();
       return view('modificarUsuarios',compact('modificarUsuarios'));
    }

}
