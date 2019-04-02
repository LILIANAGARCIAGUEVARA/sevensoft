<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\PreguntasAdmin;
use App\Http\Requests;
use App\PreguntaAdmin;
use App\Respuesta;
use Illuminate\Contracts\Encryption\DecryptException;

class PreguntasAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $mostrarpreguntas=\DB::table('preguntas')
        ->select(DB::raw('preguntas.`idpreguntas`,preguntas.`descripcion`,respuestas.`respuesta`'))
        -> leftjoin('respuestas','preguntas.idpreguntas','=','respuestas.idpregunta')
        ->get();

        return view('preguntastrabajador', compact('mostrarpreguntas'));
    }

     public function respuesta()
    {
         $mostrarpreguntas=\DB::table('preguntas')
        ->select(DB::raw('preguntas.`idpreguntas`,preguntas.`descripcion`,respuestas.`respuesta`'))
        ->join('respuestas','preguntas.idpreguntas','=','respuestas.idpregunta')
        ->get();

        return view('verrespuesta', compact('mostrarpreguntas'));
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

     public function preeditar($id)
    {
         $idP=decrypt($id);
        $pregunadmin=\DB::table('preguntas')
        ->select(DB::raw('preguntas.`idpreguntas`,preguntas.`descripcion`'))
        -> where('preguntas.idpreguntas','=',$idP)
        ->get();
        return view('respuesta', compact('pregunadmin'));
    }

         public function modificar($id)
    {

        $idR=decrypt($id);
            
        $respuestaadmin=\DB::table('preguntas')
       ->select(DB::raw('preguntas.`idpreguntas`,preguntas.`descripcion`,respuestas.`respuesta`'))
        -> leftjoin('respuestas','preguntas.idpreguntas','=','respuestas.idpregunta')
        -> where('preguntas.idpreguntas',$idR)
        ->get();
        return view('modificarRespuesta', compact('respuestaadmin'));
       }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=new Respuesta();
        $data->respuesta=$request->input('respuestaadmin');
        $data->idtrabajador=$request->input('idtrabajadoradmin');
        $data->idpregunta=$request->input('idpreguntaadmin');
        $data->save();

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
        $datosModificadosRespuesta=\DB::table('respuestas')
            ->where('idpregunta',$id)
            ->update(['respuesta'=>$request->input('respuesta')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminar=DB::table('preguntas')->where('preguntas.idpreguntas',$id)->delete();  
    }
}
