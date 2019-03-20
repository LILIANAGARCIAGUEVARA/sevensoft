@extends('footer')
@extends('header')
@section('header')
	@parent
	<link rel="stylesheet" type="text/css" href="/css/styleFormularioUsuario.css">
		<div id="login-box">
  			<div class="left" ng-controller="ctrl">
      
	    		<h1>Registrarse</h1>
	    		<form name="frmUsuarios">

	   			<input type="text" name="nombre" placeholder="Nombre"  ng-model="persona.nombre"  required ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/"/>
	   			
			

	    		<input type="text" name="apellidos" placeholder="Apellidos" ng-model="persona.apellidos"  required  ng-pattern="/^[a-zA-Z\sZñÑáéíóúÁÉÍÓÚ]*$/" />
	    	

	    		<input type="email" name="email" placeholder="E-mail" ng-model="persona.correo"  required />
	 

	    		<input type="password" name="password" placeholder="Password" ng-model="persona.contrasena"  required/>
	    		
	    
	    
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
	@section('footer')
		@parent
		
		</script>
	@endsection
@endsection