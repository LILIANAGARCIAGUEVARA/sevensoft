@extends('footerCliente')
@extends('header')
@section('header')

	@parent
	<link rel="stylesheet" type="text/css" href="/css/styleFormularioTrabajador.css">
		<div id="login-box">
  			<div class="left" ng-controller="ctrl">
      
	    		<h1>Registrar Trabajadores</h1>

	    		<form name="frmUsuarios">

	   			<input type="text" name="nombre" placeholder="Nombre"  ng-model="trabajador.nombre"  required ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/"/>
	   			
			

	    		<input type="text" name="apellidos" placeholder="Apellidos" ng-model="trabajador.apellidos"  required  ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/" />


	    		<input type="email" name="email" placeholder="E-mail" ng-model="trabajador.correo"  required />
	 

	    		<input type="password" name="password" placeholder="Password" ng-model="trabajador.contrasenaTraba"  required/>
	    		
	    
	    
	    		<input type="submit" name="signup_submit" value="Registrar" ng-click="guardar()"/>
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
        	
          $scope.trabajador={};
          
 				$scope.guardar=function(){
 					$scope.mostrar = {!! json_encode($vaso->toArray()) !!}
 					var contenido = 0;
					var ban = 0;
					if($scope.mostrar[0]!=null){
						for(contenido = $scope.mostrar.length -1; contenido >=0; contenido--){
							if($scope.trabajador.correo == $scope.mostrar[contenido].correo){
								ban=1;
							}
						}
					}
					if(ban == 1){
						window.location.href = '{{url("/login")}}';
					}
					else if(ban == 0){
						alert($scope.trabajador)
						$http.post('/saveTrabajador', $scope.trabajador).then(
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