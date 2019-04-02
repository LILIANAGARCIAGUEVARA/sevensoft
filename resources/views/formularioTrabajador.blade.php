@extends('footerCliente')
@extends('header')
@section('header')

	@parent
	<link rel="stylesheet" type="text/css" href="/css/styleFormularioTrabajador.css">
		<div id="login-box">
  			<div class="left" ng-controller="ctrl">
      
	    		<h1>Registrar Trabajadores</h1>

	    		<form name="frmTrabajador">

	   			<input type="text" name="nombre" placeholder="Nombre"  ng-model="trabajador.nombre"  required ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/"/>
	   			

	    		<input type="text" name="apellidos" placeholder="Apellidos" ng-model="trabajador.apellidos"  required  ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/" />

	    		<input type="text" name="domicilio" placeholder="Domicilio" ng-model="trabajador.domicilio"  required  />

	    		<input type="date" name="fechaNac" placeholder="Fecha Nacimiento" ng-model="date" required max="@{{hoy}}">

	    		<input type="text" name="curp" placeholder="CURP" ng-model="trabajador.curp"  required  ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/" />

	    		<input type="number" name="telefono" placeholder="Telefono" ng-model="trabajador.telefono"  required  />

	    		<input type="email" name="email" placeholder="E-mail" ng-model="trabajador.correo"  required />
	 

	    		<input type="password" name="password" placeholder="Password" ng-model="trabajador.contrasenaTraba"  required/>
	    		
	    		<select  type="text" ng-model="trabajador.pregunta" ng-options="x for x in preguntas" required placeholder="Pregunta de Seguridad"></select>

	    		<input type="text" name="respuesta" placeholder="respuesta" ng-model="trabajador.respuesta" required>	
	    
	    
	    		<input type="submit" name="signup_submit" value="Registrar" ng-disabled="!frmTrabajador.$valid" ng-click="guardar()"/>
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
        .controller('ctrl',function($scope,$http,$filter)
   	     {
        	$scope.hoy= $filter('date')(new Date(),'yyyy-MM-dd');
			$scope.preguntas=['Cuál fue el nombre de tu primera mascota',
    							'Cuál es tu comida favorita',
    							'Cuál es el nombre de tu madre',
    							'Cuál es el nombre de tu mejor amigo'];
          	$scope.trabajador={};
          	$scope.date;
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
						alert("Correo ya Registrado");
					}
					else if(ban == 0){
						$scope.trabajador.fechaNac = $filter('date')($scope.date,'yyyy-MM-d hh:mm:ss');
						$http.post('/saveTrabajador', $scope.trabajador).then(
							function(response){
								alert("AGREGADO CON EXITO");
								window.location.href = '{{url("/login")}}';
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