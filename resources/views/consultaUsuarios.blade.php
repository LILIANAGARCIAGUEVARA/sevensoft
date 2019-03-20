@extends('footer')
@extends('header')


@section('header')
   @parent


<div ng-controller="ctrl">
<div id="tablaUsuarios">
     <table class="table">
          <thead class="thead-dark" >
            <tr>
              <th scope="col">***ID****</th>
              <th  scope="col">***CORREO***</th>
              <th  scope="col">***CONTRASEÑA***</th>
            </tr>
          </thead>
        <tbody>
      @foreach($consulta as $user)
      <tr >
        <td>{{$user->idusuarios}}</td>
        <td>{{$user->correo}}</td>
        <td>{{$user->contraseña}}</td>
        <td><a id="btnCircular"  ng-click="pasarDatos({{$user->idusuarios}});"><img id="btnEdicion" src="fondos/editar usuario.png" ></a></td>
        <td><a ng-click="eliminar({{$user->idusuarios}});"> <img id="btnEdicion" src="fondos/eliminar.png"></a></td>
        
      </tr>
    @endforeach

      <div>
       
         </div>
       </tbody>
      </table>
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
