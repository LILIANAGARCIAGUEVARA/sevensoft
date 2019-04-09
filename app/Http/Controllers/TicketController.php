<?php

namespace App\Http\Controllers;
use App\Ticket;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
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
        $datos = new Ticket();

        $datos->descripcion = $request->input('descripcionTickets');
        $datos->fecha = $request->input('fechaTickets');
        $datos->idclientes=1;
        $datos->save();
        $id=DB::getPdo()->lastInsertId();

         $soporte=\DB::table('tickets')
    ->select(DB::raw('tickets.`idtickets`,tickets.`descripcion`,clientes.`nombre`,clientes.`apellido`,usuarios.`correo` as correo'))
        -> join('clientes','tickets.idclientes','=','clientes.idclientes')
        -> join('usuarios','usuarios.idusuarios','=','clientes.idusuario')
        ->where('tickets.idtickets','=',$id)
        ->get();

        $descripcion = array('descripcion'=>$request->input('descripcion'));
        $nombre = array('nombre'=>$soporte[0]->nombre);
        $fromEmail=$soporte[0]->correo;
        $fromName = $soporte[0]->nombre;

          Mail::send('mail3', $descripcion+$nombre, function($message) use ($fromEmail, $fromName) {
            $message->to($fromEmail, $fromName)->subject
            ('SOPORTE SEVENSOFT');
             $message->from('sevensoft.soporte@gmail.com','Soporte Sevensoft');
             });
            

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
