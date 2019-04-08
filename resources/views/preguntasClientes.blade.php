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
      <li>Liliana García Guevara <span>Cliente</span></li>
      <li><a href="/verrespuesta">Preguntas</a></li>
      <li><a href="/descargacliente">Descargas</a></li>
      <li><a href="/tickets">Tickets</a></li>
    </ul>
  </div>



      <div ng-controller="ctrl">
   
       <div id="formulario">
      <h1>¿En qué podemos ayudarte?</h1>
      <form name="frm" style="width: 500px;height: 500px;">
            <div>
              <textarea  class="form-control" id="inputSeleccionado" type="text" name="descripcion" ng-model="preguntas.descripcion" placeholder="Envianos tu pregunta para poder ayudarte." rows="7" required> </textarea>
              <span ng-show="frm.descripcion.$dirty && frm.descripcion.$error.required">  </span> <br>
              <img id="cuaderno" src="fondos/cuaderno.png" > 
            </div>
            <button type="image" id="btnEnviar" ng-click="enviar()" ng-disabled="frm.$invalid" class="btn btn-primary" ><img id="enviar" src="fondos/enviar.png" ></button>
      </form>

       </div> 
      </div>




    	@section('footer')
   	  	@parent
         <script> 
         var app = angular.module('app',[])
        .controller('ctrl',function($scope,$http)
         {

            $scope.fechaHoy = new Date().toISOString().split("T")[0];
            $scope.preguntas={
              descripcion:$scope.descripcion,
              fecha:$scope.fechaHoy,
              cliente:1
            }


             $scope.enviar=function(){
             angular.element(document.getElementById('btnEnviar'))[0].disabled = true;
             $http.post('/savePregunta',$scope.preguntas).then(
                function(response){
                  alert('Su peticion se ha realizado correctamente');
                  $scope.preguntas={};
                  window.location.href=`{{url("/preguntas")}}`;
              },function(errorResponse)
              {
                alert('error');
              });
             
            }

        });

        </script>
       @endsection
@endsection
