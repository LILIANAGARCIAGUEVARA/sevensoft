@extends('footerCliente')
@extends('header')
@section('header')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/styleFormularioUsuario.css">
		<div id="login-box">
  			<div class="left" ng-controller="ctrl">
      
	    		<h1>Registrarse</h1>
	    		<form name="frmUsuarios">

	   			<input type="text" name="nombre" placeholder="Nombre"  ng-model="cliente.nombre"  required maxlength="25" onchange="return validatexto(this)"/>
	   			<span ng-show="frmUsuarios.nombre.$dirty && frmUsuarios.nombre.$error.required" style="color: red;"> Campo requerido<br>Longitud de 4 a 25 caracteres </span> 
                 <br>
	   			
				<input type="text" name="apellidos" placeholder="Apellidos" ng-model="cliente.apellido"  required  maxlength="25" onchange="return validatexto(this)"/>
	    		 <span ng-show="frmUsuarios.apellidos.$dirty && frmUsuarios.apellidos.$error.required" style="color: red;"> Campo requerido<br>Longitud de 4 a 25 caracteres </span> 
                 <br>


	    		<input type="email" name="email" placeholder="E-mail" ng-model="cliente.correo"  required />
	    		 <span ng-show="frmUsuarios.email.$dirty && frmUsuarios.email.$error.required" style="color: red;"> Campo requerido </span>
                <span ng-show="frmUsuarios.email.$error.email" style="color: red;"> Formato e-mail incorrecto</span> 
	 

	    		<input type="password" name="password" placeholder="Password" ng-model="cliente.contrasena" maxlength="25" required onchange="return validacontra(this)" required/>
	    	    <span ng-show="frmUsuarios.password.$dirty && frmUsuarios.password.$error.required" style="color: red;"> Campo requerido </span> <br>


	    		
	    		<input type="submit" name="signup_submit" value="Registrar" ng-disabled="!frmUsuarios.$valid" ng-click="guardar()"/>
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
  if (!/^([a-zA-Zá-úñÑáéíóúÁÉÍÓÚ ]{4,25})*$/.test(elemento.value)){
      alert("Solo se permiten letras, Longitud de 4 a 25 caracteres");
      elemento.value = '';
  }
}
</script>


<script type="text/javascript">
 function validacontra(elemento)
 {
  if (!/^([0-9a-zA-Zá-úñÑáéíóúÁÉÍÓÚ ]{8,45})*$/.test(elemento.value)){
      alert("este espacio debe contener al menos 8 caracteres. solo se permiten letras y numeros");
      elemento.value = '';
  }
}
</script>
@section('footerCliente')
		@parent

		<script >
	     var app = angular.module('app',[])
        .controller('ctrl',function($scope,$http)
   	     {

          
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
                				window.location.href = '{{url("/login")}}';

       						},function(errorResponse){
       							alert("FALLO LA CONEXION");
        					}

        				);
						$scope.cliente={};

					}

    			}
    	});
    			
        		     			
		</script>
		
	@endsection
@endsection