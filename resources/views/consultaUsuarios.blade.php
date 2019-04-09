@extends('footer')
@extends('header')


@section('header')
   @parent



<div class="header"></div>
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
  </label>
  <div id="sidebarMenu">
    <ul class="sidebarMenuInner">
      <li>Liliana García Guevara <span>Administrador</span></li>
      <li><a href="https://vanila.io" target="_blank">Preguntas de Clientes</a></li>
      <li><a href="https://instagram.com/plavookac" target="_blank">Configurar usuario</a></li>
      <li><a href="https://twitter.com/plavookac" target="_blank">Subir actualización</a></li>
    </ul>
  </div>


<div   class="main center" ng-controller="ctrl" >
  <div class="container">
      <h1 style="padding: 40px 0px 0px 150px;display: inline;">CONSULTA USUARIOS SOPORTE</h1>
      <input style="padding-right: 15px;display: inline;" type=image src="{{asset('fondos/usuarios.png')}}" width="90" height="90">
      <a href="{{url('/formularioTrabajador')}}"> <img id="btnEdicion2" src="fondos/agregarUsuario.png" style="margin-left: 160px;"></a>
      <br>
      
      <br>
      <div style="padding: 0px 0px 0px 150px;margin-left: -400px;">
      <table class="table">
        <thead class="thead-dark">
          <tr>  
            <th scope="col">ID</th>
              <th  scope="col">NOMBRE</th>
              <th  scope="col">APELLIDO</th>
              <th  scope="col">RFC</th>
              <th  scope="col">CURP</th>
              <th  scope="col">TELEFONO</th>
              <th  scope="col">DIRECCIÓN</th>
              <th  scope="col">FECHA NACIMIENTO</th>
              <th  scope="col">CORREO</th>
            
               <th scope="col">ACCIONES</th>
          </tr>
        </thead>
        <tbody>
            @foreach($consulta as $user)
          <tr>
             <td>{{$user->idtrabajadores}}</td>
              <td>{{$user->nombre}}</td>
              <td>{{$user->apellido}}</td>
              <td>{{$user->rfc}}</td>
              <td>{{$user->curp}}</td>
              <td>{{$user->telefono}}</td>
              <td>{{$user->direccion}}</td>
              <td>{{date("d-m-Y",strtotime($user->fecha_nac."- 1 days"))}}</td>
              <td>{{$user->correo}}</td>
             
              
          
 <td>
         <a  href="{{url('/datosModificar/'.encrypt($user->idtrabajadores))}}"> <img id="btnEdicion" src="fondos/editar.png" ></a></td>
          <td><a ng-click="eliminar({{$user->idtrabajadores}});"> <img id="btnEdicion" src="fondos/borrar.png"></a></td>
            
          </tr>
          @endforeach
        </tbody>

      </table>
      </div>  
  </div>
</div>




@section('footer')
      @parent
      <script>
         var app = angular.module('app',[])
        .controller('ctrl',function($scope,$http)
        {
          
            $scope.pasarDatos=function(id)
            {

              window.location.href=`{{url("/datosModificar/`+id+`")}}`
            }

             $scope.formulario=function()
            {
              window.location.href=`{{url("/formulario")}}`
            }

             $scope.eliminar=function(id)
             {
               var bool=confirm("Seguro de eliminar el dato?");
               if(bool){
               $http.delete('/eliminarUsuarios/'+id).then(
                function(response){
                   console.log(response);
                    location.reload();
                 },function(errorResponse)
                 {
                  alert('error');
                 }
                 );
               alert("se elimino correctamente");
               }else{
               alert("cancelo la solicitud");
               }
             }
        });
    </script>  

     @endsection
  @endsection
