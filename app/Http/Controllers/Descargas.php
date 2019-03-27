<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Quotation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Descargas;
use App\Http\Requests;
use App\Descarga;

class Descargas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mostraract=\DB::table('Descargas')
        ->select(DB::raw('Descargas.`idDescargas`,Descargas.`fecha`,Descargas.`versiones`,Descargas.`informacion`,Descargas.`ruta`'))
        ->get();
        return view('actualizaciones', compact('mostraract'));
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

        $data=new Descarga();
        $data->fecha=$request->input('fecha');
        $data->versiones=$request->input('versiones');
        $data->informacion=$request->input('informacion');
        $data->ruta=$request->input('ruta');
        $data->idtrabajador="1";
        $data->save();
    }

  public function preeditar($id)
    {
         $idDM=decrypt($id);
        $editaract=\DB::table('descargas')
        ->select(DB::raw('descargas.`idDescargas`,descargas.`versiones`,descargas.`informacion`, descargas.`ruta`, descargas.`fecha`'))
        -> where('descargas.idDescargas','=',$idDM)
        ->get();
        return view('modificarActualizacion', compact('editaract'));
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
        echo "holaaa";
        $datosModificados=\DB::table('descargas')
            ->where('iddescargas',$id)
            ->update(['versiones'=>$request->input('versiones'),'informacion'=>$request->input('informacion'),'ruta'=>$request->input('ruta')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $eliminar=DB::table('Descargas')->where('Descargas.idDescargas',$id)->delete(); 
    }
}
