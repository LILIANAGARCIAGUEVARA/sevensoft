@extends('footer')
@extends('header')

@section('header')
   @parent


      <div ng-controller="ctrl">
      <a href="/index"><img id="espalda" src="fondos/espalda.png" > </a>
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


    	@section('footer')
   	  	@parent
         <script> 
         var app = angular.module('app',[])
        .controller('ctrl',function($scope,$http)
         {

            $scope.fechaHoy = new Date().toISOString().split("T")[0];
            $scope.preguntas={
              idPregunta:1,
              descripcion:$scope.descripcion,
              fecha:$scope.fechaHoy,
              cliente:2
            }


             $scope.enviar=function(){
              console.log($scope.preguntas)

              $http.post('/save',$scope.preguntas).then(
                function(response){
                
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
