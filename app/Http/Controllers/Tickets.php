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
use Carbon\Carbon;



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
        ->select(DB::raw('tickets.`idtickets`,tickets.`descripcion`,tickets.`fecha`,tickets.`status`, tickets.`fechacompromiso`'))
        ->get();

        return view('ticketsoporte', compact('ticketsop'));
      
    }


       public function llenarticket($id)
    {

        $ticketsoporte= Carbon::now()->addMonths(6)->format('d/m/Y');
   

        $ticketsop=\DB::table('tickets')
        ->select(DB::raw('tickets.`idtickets`,tickets.`descripcion`,tickets.`observaciones`,tickets.`fechacompromiso`,tickets.`fecha`,tickets.`status`,clientes.`nombre`,clientes.`apellido`,usuarios.`correo`'))
        -> join('clientes','tickets.idclientes','=','clientes.idclientes')
        -> join('usuarios','usuarios.idusuarios','=','clientes.idusuario')
        ->where('tickets.idtickets','=',$id)
        ->get();
        
        return view('modificarTicketSoporte', compact('ticketsop','ticketsoporte'));
      
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

  
    public function update(Request $request, $id)
    {
      //  DB::enableQueryLog();
         $datosModificados=\DB::table('tickets')
            ->where('idtickets',$id)
            ->update(['observaciones'=>$request->input('observaciones'),'fechacompromiso'=>$request->input('fechacompromiso'),'status'=>'PENDIENTE']);


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


public function liberarticket($id)
    {
      //  DB::enableQueryLog();
         $datosModificados=\DB::table('tickets')
            ->where('idtickets',$id)
            ->update(['status'=>'LIBERADO']);


        $soporte=\DB::table('tickets')
        ->select(DB::raw('tickets.`idtickets`,tickets.`descripcion`,tickets.`fechacompromiso`, tickets.`fecha`,tickets.`status`,clientes.`nombre`,clientes.`apellido`,usuarios.`correo` as correo'))
        -> join('clientes','tickets.idclientes','=','clientes.idclientes')
        -> join('usuarios','usuarios.idusuarios','=','clientes.idusuario')
        ->where('tickets.idtickets','=',$id)
        ->get();

        $idtickets = array('idtickets'=>$soporte[0]->idtickets);
        $nombre = array('nombre'=>$soporte[0]->nombre);
        $comp = array('comp'=>$soporte[0]->fechacompromiso);
        $fromEmail=$soporte[0]->correo;
        $fromName = $soporte[0]->nombre;

          Mail::send('mail4', $idtickets+$nombre, function($message) use ($fromEmail, $fromName) {
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
