@extends('footerCliente')
@extends('header')
@section('header')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/styleFormularioUsuario.css">
		<div id="login-box">
  			<div class="left" ng-controller="ctrl">
      
	    		<h1>Registrarse</h1>
	    		<form name="frmUsuarios">

	   			<input type="text" name="nombre" placeholder="Nombre"  ng-model="cliente.nombre"  required ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/" onchange="return validatexto(this)"/>
	   			
			

	    		<input type="text" name="apellidos" placeholder="Apellidos" ng-model="cliente.apellidos"  required  ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/" onchange="return validatexto(this)"/>


	    		<input type="email" name="email" placeholder="E-mail" ng-model="cliente.correo"  required />
	 

	    		<input type="password" name="password" placeholder="Password" ng-model="cliente.contrasena"  required/>
	    		
	    
	    
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