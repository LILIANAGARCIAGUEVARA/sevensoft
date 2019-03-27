@extends('footerCliente')
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



      <div ng-controller="ctrl">
   
       <div id="formulario">
      <h1>Preguntas</h1>
      <form name="frm" style="width: 500px;height: 500px;">
            <div>
              <textarea  class="form-control" id="inputSeleccionado" type="text" name="descripcion" ng-model="preguntas.descripcion" placeholder="Escribenos tu pregunta para poder ayudarte." rows="7" required> </textarea>
              <span ng-show="frm.descripcion.$dirty && frm.descripcion.$error.required">  </span> <br>
              <img id="cuaderno" src="fondos/cuaderno.png" > 
            </div>
            <button type="image" id="btnEnviar" ng-click="enviar()" ng-disabled="frm.$invalid" class="btn btn-primary" ><img id="enviar" src="fondos/enviar.png" ></button>
      </form>

       </div> 
      </div>

      


    	@section('footerCliente')
   	  	@parent
         <script> 
         var app = angular.module('app',[])
        .controller('ctrl',function($scope,$http)
         {

            $scope.fechaHoy = new Date().toISOString().split("T")[0];
            $scope.preguntas={
             
              descripcion:$scope.descripcion,
              fecha:$scope.fechaHoy,
              cliente:7
            }


             $scope.enviar=function(){
              console.log($scope.preguntas)

              $http.post('/savePregunta',$scope.preguntas).then(
                function(response){
                  alert('Su peticion se ha realizado correctamente');
                
              },function(errorResponse)
              {
                alert('error');
              });
              $scope.preguntas={};
            }

        });

        </script>
       @endsection
@endsection
