<?php

namespace App\Http\Controllers;
use App\Cliente;
use App\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;

class ClienteController extends Controller
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


    public function Usuarios(){
        $mostrarusuarios=DB::table('Usuarios');
        

        return view('formularioUsuario',compact('mostrarusuarios'));
    }


    public function store(Request $request)
    {

        

        $data = new Usuario();
        $contraseñaa=encrypt($request->input('contrasena'));
        $data->correo = $request->input('correo');
        $data->contraseña = $contraseñaa;
        $data->tipo =3;


        $data->save();

         $id=DB::getPdo()->lastInsertId();

         echo $id;

        $datos = new Cliente();
        $datos->nombre = $request->input('nombre');
        $datos->apellido = $request->input('apellido');
        $datos->idusuario = $id;

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
}
