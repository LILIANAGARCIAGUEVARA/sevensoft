@extends('footerCliente')
@extends('header')
@section('header')
	@parent
		
	<link rel="stylesheet" type="text/css" href="/css/styleRecuperarContrasena.css">
		<div id="login-box">
  			<div class="left" ng-controller="ctrl">
      	
	    		<h1>Cambiar Contraseña</h1>
	    		<form name="frmUsuarios">
	    			<div>
	    				<input type="text" readonly name="correo" placeholder="Correo" ng-model="datos[0].correo" required>	
	    			</div>

	    			<div>
	    				<input  type="text" ng-model="dato.contrasena" required placeholder="Nueva contraseña"></input>	
	    			</div>

	    			<div>
	    				<input type="text" name="respuesta" placeholder="Confirmar Contraseña" ng-model="dato.contra" required>	
	    			</div>

	    			<input type="submit" name="signup_submit" value="Cambiar Contraseña" ng-disabled="!frmUsuarios.$valid" ng-click="entrar(datos[0].idusuarios)"/>
	    			<div class="d-flex justify-content-center links"><a href="/login">Regresar al login.</a>
				</div>
				</form>
  			</div>
  			<div class="right">
     		<img src="{{asset('fondos/logito2.png')}}">   
  		</div>
  		
	</div>
@section('footerCliente')
		@parent
		<script >
	    var app = angular.module('app',[]);
    	app.controller('ctrl',function($scope,$http)
   	     {
   	     	$scope.datos={!! json_encode($data->toArray()) !!};
   	     	$scope.dato={};
   	     	console.log($scope.datos);
   	     
   	     	$scope.entrar=function(idusuarios){
   	     		if($scope.dato.contrasena == $scope.dato.contra){
   	     			$http.put('/recuperar/'+idusuarios, $scope.dato).then(
				function(response){
					alert("Modificado Correctamente");
				window.location.href = '{{url("/login")}}';
				},function(errorResponse){
					alert("no jalo");
					}	
				);
   	     		}
   	    
   	     	}
   	    

        });	
		</script>
	@endsection
@endsection