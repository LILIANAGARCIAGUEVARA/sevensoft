<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Encryption\DecryptException;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
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

        $data = new User();
        $data->email = $request->input('correo');
        $data->password = $request->input('contrasena');
        $data->tipo =3;

        $data->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

          $contraseña=encrypt($request->input('contrasenaUser'));
         if($datos=\DB::table('trabajadores')
            ->where('curp', '=' ,$request->input('curpModificar'))
            ->where('trabajadores.idusuarios','!=',$id)
            ->count() > 0)
            {
                return 0;
            }
        elseif($datos=\DB::table('trabajadores')
            ->where('rfc', '=' ,$request->input('rfcModificar'))
            ->where('trabajadores.idusuarios','!=',$id)
            ->count() > 0)
             {
               return 1;
             }
        elseif($datos=\DB::table('usuarios')
            ->where('correo', '=' ,$request->input('correoModificado'))
            ->where('idusuarios','!=',$id)
            ->count() > 0)
            {
                return 2;
            }
        else{

              $format="Y-m-d";
             
              \DB::table('trabajadores')
              ->join('usuarios','trabajadores.idusuarios',"=","usuarios.idusuarios")
              ->where('trabajadores.idusuarios',$id)
              ->update(['correo'=>$request->input('correoModificado'), 'contraseña'=>$contraseña,'nombre'=>$request->input('nombre'), 'apellido'=>$request->input('apellido'),'fecha_nac'=>date_format(date_create($request->input('edad')),$format),'direccion'=>$request->input('domicilioModificar'),'curp'=>$request->input('curpModificar'),'rfc'=>$request->input('rfcModificar'),'telefono'=>$request->input('telefonoModificar')]);

                
                 return 3;
            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminar=DB::table('usuarios')->where('usuarios.idusuarios',$id)->delete();
        $eliminarCliente=DB::table('trabajadores')->where('trabajadores.idtrabajadores',$id)->delete();
    }
    

      public function consulta()
    {
         $consulta=\DB::table('trabajadores')
         ->select(DB::raw('idtrabajadores,nombre,apellido,usuarios.`correo`,usuarios.`contraseña`,direccion,rfc,fecha_nac,telefono,curp'))
        ->join('usuarios','usuarios.idusuarios','=','trabajadores.idusuarios')
        ->get();
         return view('consultaUsuarios',compact('consulta'));

    }

     public function datosModificar($id)
    {
         $idDM=decrypt($id);

        $modificarUsuarios=\DB::table('trabajadores')
         ->select(DB::raw('idtrabajadores,nombre,trabajadores.`idusuarios`,direccion,rfc,telefono,curp,apellido,fecha_nac,usuarios.`correo`,usuarios.`contraseña`'))
        ->join('usuarios','usuarios.idusuarios','=','trabajadores.idusuarios')
        ->where('idtrabajadores',$idDM)
        ->get();

        return view('modificarUsuarios',compact('modificarUsuarios'));
    }

     public function validacion(){
        $consultaa=\DB::table('usuarios')
        ->select(DB::raw('correo'))
        ->get(); 
        return view ('formulariousuario',compact('consultaa'));
    }


        public function formulario()
    {

        return view('formularioUsuario');
    }

    public function login()
    {
        return view('login');
    }

}
