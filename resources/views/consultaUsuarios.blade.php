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


<div  id='center' class="main center" ng-controller="ctrl" >
  <div class="container">
      <h1 style="padding: 40px 0px 0px 150px;">CONSULTA USUARIOS</h1>
      <br>
      
      <br>
      <div style="padding: 0px 0px 0px 150px;">
      <table class="table">
        <thead class="thead-dark">
          <tr>  
            <th scope="col">***ID****</th>
              <th  scope="col">***CORREO***</th>
              <th  scope="col">***CONTRASEÑA***</th>
              <th  scope="col">***TIPO***</th>
            <th scope="col">**ACCIONES**</th>
          </tr>
        </thead>
        <tbody>
            @foreach($consulta as $user)
          <tr>
             <td>{{$user->idusuarios}}</td>
              <td>{{$user->correo}}</td>
              <td>{{$user->contraseña}}</td>
              <td>{{$user->tipo}}</td>
          
          <td><a id="btnCircular"  ng-click="pasarDatos({{$user->idusuarios}});"><img id="btnEdicion" src="fondos/editar usuario.png" ></a></td>
          <td><a ng-click="eliminar({{$user->idusuarios}});"> <img id="btnEdicion" src="fondos/eliminar.png"></a></td>
            
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
