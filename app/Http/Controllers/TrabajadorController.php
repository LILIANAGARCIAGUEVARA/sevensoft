<?php

namespace App\Http\Controllers;
use App\Trabajadore;
use App\Usuario;
use Illuminate\Contracts\Encryption\DecryptException;
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

      /*$contraseña=Trabajadore::findOrFail($id);
      $contraseña->fill(['contraseña'=>encrypt($request->input('contrasenaTraba'))]);*/

         $data = new Usuario();
         $datos = new Trabajadore();
           $contraseña=encrypt($request->input('contrasenaTraba'));
         
         if($datos->where('curp', '=' ,$request->input('curp'))
            ->count() > 0)
            {   

                
                return 0;
                
            }
        elseif($datos->where('rfc', '=' ,$request->input('rfc'))
            ->count() > 0)
             {
               return 1;
             }
        elseif($data->where('correo', '=' ,$request->input('correo'))
            ->count() > 0)
            {
                return 2;
            }

        else
           {
            
             $data->correo = $request->input('correo');
             $data->contraseña = $contraseña;
             $data->tipo =2;
             $data->save();
             $id=DB::getPdo()->lastInsertId();


            $datos = new Trabajadore();
            $format="Y-m-d";
            $datos->nombre = $request->input('nombre');
            $datos->apellido = $request->input('apellidos');
            $datos->direccion = $request->input('domicilio');
            $datos->fecha_nac = date_format(date_create($request->input('fechaNac')),$format);
            $datos->rfc = $request->input('rfc');
            $datos->curp = $request->input('curp');
            $datos->telefono= $request->input('telefono');

            $datos->fecharegistro =$request->get('fechaRegistro');;
            $datos->idusuarios = $data->id;

            $datos->save();
            return 3;
          }



        


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
