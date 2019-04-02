<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quotation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Tickets;
use App\Http\Requests;
use App\Ticket;
use Mail;
use App\Http\Controllers\Controllers;



class Tickets extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ticketsop=\DB::table('tickets')
        ->select(DB::raw('tickets.`idtickets`,tickets.`descripcion`,tickets.`fecha`,tickets.`status`'))
        ->get();

        return view('ticketsoporte', compact('ticketsop'));
      
    }


    public function consulta($id)
    {

        $ticketsop=\DB::table('tickets')
        ->select(DB::raw('tickets.`idtickets`,tickets.`descripcion`,tickets.`fecha`,tickets.`status`,clientes.`nombre`,clientes.`apellido`,usuarios.`correo`'))
        -> join('clientes','tickets.idclientes','=','clientes.idclientes')
        -> join('usuarios','usuarios.idusuarios','=','clientes.idusuario')
        ->where('tickets.idtickets','=',$id)
        ->get();

        return view('ticket', compact('ticketsop'));
        
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

    public function correo($id){
        DB::enableQueryLog();
        $correos=\DB::table('tickets')
        ->select(DB::raw('usuarios.`correo` as correo'))
        -> join('clientes','tickets.idclientes','=','clientes.idclientes')
        -> join('usuarios','usuarios.idusuarios','=','clientes.idusuario')
        ->where('tickets.idtickets','=',$id)
        ->get();
        foreach ($correo as $k) {
            return $k->correo;
            # code...
        }

    }
    public function update(Request $request, $id)
    {
      //  DB::enableQueryLog();
        $soporte=\DB::table('tickets')
        ->select(DB::raw('tickets.`idtickets`,tickets.`descripcion`,tickets.`fechacompromiso`, tickets.`fecha`,tickets.`status`,clientes.`nombre`,clientes.`apellido`,usuarios.`correo` as correo'))
        -> join('clientes','tickets.idclientes','=','clientes.idclientes')
        -> join('usuarios','usuarios.idusuarios','=','clientes.idusuario')
        ->where('tickets.idtickets','=',$id)
        ->get();

        $data = array('obs'=>$request->input('observaciones'));
        $nombre = array('nombre'=>$soporte[0]->nombre);
        $comp = array('comp'=>$soporte[0]->fechacompromiso);
        $fromEmail=$soporte[0]->correo;
        $fromName = $soporte[0]->nombre;

          Mail::send('mail', $data+$comp+$nombre, function($message) use ($fromEmail, $fromName) {
            $message->to($fromEmail, $fromName)->subject
            ('SOPORTE SEVENSOFT');
             $message->from('sevensoft.soporte@gmail.com','Soporte Sevensoft');
             });
            
   
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
