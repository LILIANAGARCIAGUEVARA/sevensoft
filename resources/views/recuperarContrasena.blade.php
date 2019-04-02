@extends('footerCliente')
@extends('header')
@section('header')
	@parent
		
	<link rel="stylesheet" type="text/css" href="/css/styleRecuperarContrasena.css">
		<div id="login-box">
  			<div class="left" ng-controller="ctrl">
      	
	    		<h1>Recuperar Contraseña</h1>
	    		<form name="frmUsuarios">
	    			<div>
	    				<input type="email" name="correo" placeholder="correo" ng-model="datos.correo" required>	
	    			</div>

	    			<div>
	    				<select type="text" ng-model="datos.pregunta" ng-options="x for x in preguntas" required placeholder="Pregunta de Seguridad"></select>	
	    			</div>

	    			<div>
	    				<input type="text" name="respuesta" placeholder="respuesta" ng-model="datos.respuesta" required>	
	    			</div>

	    			<input type="submit" name="signup_submit" value="Cambiar Contraseña" ng-disabled="!frmUsuarios.$valid" ng-click="entrar()"/>
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
	    	var app = angular.module('app',[])
        	.controller('ctrl',function($scope,$http)
   	    	{
    			$scope.preguntas=['Cuál fue el nombre de tu primera mascota',
    								'Cuál es tu comida favorita',
    								'Cuál es el nombre de tu madre',
    								'Cuál es el nombre de tu mejor amigo'];
    			$scope.datos={};
    			$scope.entrar=function(){
                	window.location.href = `{{URL::to("/control2")}}`+`/`+$scope.datos.correo+`/`+$scope.datos.pregunta+`/`+$scope.datos.respuesta;
            	};		
    		});	     			
		</script>
	@endsection
@endsection