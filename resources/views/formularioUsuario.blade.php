@extends('footerCliente')
@extends('header')
@section('header')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/styleFormularioUsuario.css">
		<div id="login-box">
  			<div class="left" ng-controller="ctrl">
      
	    		<h1>Registrarse</h1>
	    		<form name="frmUsuarios">

	   			<input type="text" name="nombre" placeholder="Nombre"  ng-model="cliente.nombre"  required ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/"/>
	   			
			

	    		<input type="text" name="apellidos" placeholder="Apellidos" ng-model="cliente.apellidos"  required  ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/" />


	    		<input type="email" name="email" placeholder="E-mail" ng-model="cliente.correo"  required />
	 

	    		<input type="password" name="password" placeholder="Password" ng-model="cliente.contrasena"  required/>

	    		<select  type="text" ng-model="cliente.pregunta" ng-options="x for x in preguntas" required placeholder="Pregunta de Seguridad"></select>

	    		<input type="text" name="respuesta" placeholder="respuesta" ng-model="cliente.respuesta" required>	
	    		
	    
	    		<input type="submit" name="signup_submit" value="Registrar" ng-disabled="!frmUsuarios.$valid" ng-click="guardar()"/>
	    		<div class="d-flex justify-content-center links">
					Ya Tienes una Cuenta?<a href="/login">Login</a>
				</div>
				</form>
  			</div>
  		<div class="right">
     		<img src="{{asset('fondos/logito.png')}}">   
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
          $scope.cliente={};
    			
 				$scope.guardar=function(){
 					$scope.mostrar = {!! json_encode($consultaa->toArray()) !!}
 					var contenido = 0;
					var ban = 0;
					if($scope.mostrar[0]!=null){
						for(contenido = $scope.mostrar.length -1; contenido >=0; contenido--){
							if($scope.cliente.correo == $scope.mostrar[contenido].correo){
								ban=1;
							}
						}
					}
					if(ban == 1){
						alert("Correo ya Registrado");
					}
					else if(ban == 0){
						$http.post('/guardarUsuario', $scope.cliente).then(
							function(response){
                				alert("AGREGADO CON EXITO");
       						},function(errorResponse){
       							alert("FALLO LA CONEXION");
        					}
        				);
					}
    			}
    	});
    			
        		     			
		</script>
		
	@endsection
@endsection