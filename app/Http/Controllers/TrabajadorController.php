<?php

namespace App\Http\Controllers;
use App\Trabajadore;
use App\Usuario;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
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
        $data->->insertGetId;
        $data->correo = $request->input('correo');
        $data->contraseña = $request->input('contrasenaTraba');
        $data->tipo =1;

        $data->save();

        $datos = new Trabajadore();

        $datos->nombre = $request->input('nombre');
        $datos->apellido = $request->input('apellidos');

        $datos->fecharegistro ='1998-01-01';
        $datos->idusuarios = $data->idusuarios;

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


    public function validacion(){
        $vaso=\DB::table('usuarios')
        ->select(DB::raw('correo'))
        ->get(); 
        return view ('formularioTrabajador',compact('vaso'));
    }
}
