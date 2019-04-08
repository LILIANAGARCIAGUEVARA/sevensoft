@extends('footer')
@extends('header')
@section('header')

	@parent
	<link rel="stylesheet" type="text/css" href="/css/styleFormularioTrabajador.css">
		<div id="login-box">
  			<div class="left" ng-controller="ctrl">
      
	    		<h1>Registrar Trabajadores</h1>

	    		<form name="frmTrabajador">

	   			<input type="text" name="nombre" placeholder="Nombre"  ng-model="trabajador.nombre"  required ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/" onchange="return validatexto(this)"/>
	   			

	    		<input type="text" name="apellidos" placeholder="Apellidos" ng-model="trabajador.apellidos"  required  ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/" onchange="return validatexto(this)"/>

	    		<input type="text" name="domicilio" placeholder="Domicilio" ng-model="trabajador.domicilio" onchange="return validatexto(this)" required  />

	    		<input type="date" name="fechaNac" placeholder="Fecha Nacimiento" ng-model="date" required max="@{{hoy}}">

	    		<input type="text" name="curp" placeholder="CURP" ng-model="trabajador.curp"  required  ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ1-9]*$/"  maxlength="18" minlength="18" onchange="return validaNumLet(this)"/>

	    		<input type="text" name="telefono" placeholder="Telefono" ng-model="trabajador.telefono" maxlength="10" minlength="10" required onchange="return validaNum(this)" />

	    		<input type="text" name="rfc" placeholder="RFC" ng-model="trabajador.rfc" maxlength="18" minlength="18" required onchange="return validaNumLet(this)" />


	    		<input type="email" name="email" placeholder="E-mail" ng-model="trabajador.correo"  required />
	 


	    		<input type="password" name="password" placeholder="Password" ng-model="trabajador.contrasenaTraba" maxlength="20" required/>

	    		
	    
	    
	    		<input type="submit" name="signup_submit" value="Registrar" ng-disabled="!frmTrabajador.$valid" ng-click="guardar()"/>
	    		<div class="d-flex justify-content-center links">
					¿Ya Tienes una Cuenta?<a href="/login">Login</a>
				</div>
				</form>
  			</div>
  		<div class="right">
     		<img src="{{asset('fondos/logito.png')}}">   
  		</div>
	</div>


<script type="text/javascript">
 function validatexto(elemento)
 {
  if (!/^([a-zA-Zá-úñÑáéíóúÁÉÍÓÚ ])*$/.test(elemento.value)){
      alert("Solo se permiten letras");
      elemento.value = '';
  }
}
</script>

<script type="text/javascript">
 function validaNumLet(elemento)
 {
  if (!/^([a-zA-Zá-úñÑáéíóúÁÉÍÓÚ1-9])*$/.test(elemento.value)){
      alert("Solo se permiten letras sin espacios");
      elemento.value = '';
  }
}
</script>

<script type="text/javascript">
 function validaNum(elemento)
 {
  if (!/^([1-9])*$/.test(elemento.value)){
      alert("Solo se permiten números");
      elemento.value = '';
  }
}
</script>
@section('footer')
		@parent

		<script >
	     var app = angular.module('app',[])
        .controller('ctrl',function($scope,$http,$filter)
   	     {
        	$scope.hoy= $filter('date')(new Date(),'yyyy-MM-dd');


          	$scope.trabajador={};

        	 $scope.fechaHoy = new Date().toISOString().split("T")[0];
          	$scope.trabajador={
          		fechaRegistro:$scope.fechaHoy
          	};
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
								$scope.trabajador={};
								$scope.trabajador.fechaNac={};
								window.location.href = '{{url("/login")}}';
								
							},function(errorResponse){
								alert("FALLO LA CONEXION");
						}
						);
					}	
					$scope.trabajador={};
        		}
        });
    			
        		     			
		</script>
		
	@endsection
@endsection

