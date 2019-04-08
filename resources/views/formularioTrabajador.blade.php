@extends('footer')
@extends('header')
@section('header')

	@parent
	<link rel="stylesheet" type="text/css" href="/css/styleFormularioTrabajador.css">
		<div id="login-box">
  			<div class="left" ng-controller="ctrl">
      
	    		<h1>Registrar Trabajadores</h1>

	    		<form name="frmTrabajador">

	   			<input type="text" name="nombre" placeholder="Nombre"  ng-model="trabajador.nombre"  required maxlength="25" onchange="return validatexto(this)"/>
	   			<span ng-show="frmTrabajador.nombre.$dirty && frmTrabajador.nombre.$error.required"> Campo requerido<br>Longitud de 4 a 25 caracteres </span> 
                 <br>
	   			

	    		<input type="text" name="apellidos" placeholder="Apellidos" ng-model="trabajador.apellidos"  required  maxlength="25" onchange="return validatexto(this)"/>
	    		 <span ng-show="frmTrabajador.apellidos.$dirty && frmTrabajador.apellidos.$error.required"> Campo requerido<br>Longitud de 4 a 25 caracteres </span> 
                 <br>

	    		<input type="text" name="domicilio" placeholder="Domicilio" ng-model="trabajador.domicilio" onchange="return validatext(this)" required  />
	    		<span ng-show="frmTrabajador.domicilio.$dirty && frmTrabajador.domicilio.$error.required"> Campo requerido <br>Longitud de 15 a 25 caracteres</span> <br>

	    		<input type="date" name="fechaNac" placeholder="Fecha Nacimiento" ng-model="trabajador.fechaNac" required min="1919-01-01" max="2001-12-31">
	    		<span ng-show="frmTrabajador.fechaNac.$dirty && frmTrabajador.fechaNac.$error.required"> Campo requerido </span> <br>
                <span ng-show="frmTrabajador.fechaNac.$dirty && frmTrabajador.fechaNac.$invalid"> Fecha de Nacimiento Invalida </span> <br>

	    		<input type="text" name="curp" placeholder="CURP" ng-model="trabajador.curp"  required    maxlength="18" minlength="18" onchange="return validaCurpRFC(this)"/>
	    		 <span ng-show="frmTrabajador.curp.$dirty && frmTrabajador.curp.$error.required"> Campo requerido </span>
                 <span ng-show="frmTrabajador.curp.$dirty && frmTrabajador.curp.$error.required"> Longitud 18 caracteres </span>
                 <br>

	    		<input type="text" name="telefono" placeholder="Telefono" ng-model="trabajador.telefono" maxlength="10" minlength="10" required onchange="return validaNum(this)" />
	    		 <span ng-show="frmTrabajador.telefono.$dirty && frmTrabajador.telefono.$error.required"> Campo requerido<br>Longitud 10 caracteres </span>
                 <br>

	    		<input type="text" name="rfc" placeholder="RFC" ng-model="trabajador.rfc" maxlength="18" minlength="18" required onchange="return validaCurpRFC(this)" />
	    		 <span ng-show="frmTrabajador.rfc.$dirty && frmTrabajador.rfc.$error.required"> Campo requerido <br>Longitud 18 caracteres </span> <br>



	    		<input type="email" name="email" placeholder="E-mail" ng-model="trabajador.correo"  required />


	    		<input type="email" name="email" placeholder="E-mail" ng-model="trabajador.correo"  required />
	    		 <span ng-show="frmTrabajador.email.$dirty && frmTrabajador.email.$error.required"> Campo requerido </span> <br>
                <span ng-show="frmTrabajador.email.$error.email"> Formato e-mail incorrecto</span> 
	 

	    		<input type="password" name="password" placeholder="Password" ng-model="trabajador.contrasenaTraba" maxlength="25" required onchange="return validacontra(this)" required/>
	    	    <span ng-show="frmTrabajador.password.$dirty && frmTrabajador.password.$error.required"> Campo requerido </span> <br>
                  <a id='resultado'></a>

	    		<input type="email" name="email" placeholder="E-mail" ng-model="trabajador.email"  required />

	 


	    		<input type="password" name="password" placeholder="Password" ng-model="trabajador.contrasenaTraba" maxlength="20" required/>

	    		
	    
	    
	    		<input type="submit" name="signup_submit" value="Registrar" id="desactivar" ng-disabled="!frmTrabajador.$valid" ng-click="guardar()"/>
	    		
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
 function validaNum(elemento)
 {
  if (!/^([0-9]{10})*$/.test(elemento.value)){
      alert("Solo se permiten numeros,su número telefonico debe contener 10 digitos");
      elemento.value = '';
  }
}
</script>

<script type="text/javascript">
 function validaCurpRFC(elemento)
 {
  if (!/^([0-9A-Z]{18})*$/.test(elemento.value)){
      alert("Solo se permiten letras Mayusculas y números sin espacios,este espacio debe contener 18 caracteres");
      elemento.value = '';
  }
}
</script>

<script type="text/javascript">
 function validatext(elemento)
 {
  if (!/^([0-9a-zA-Zá-úñÑáéíóúÁÉÍÓÚ# ]{15,45})*$/.test(elemento.value)){
      alert("este espacio debe contener al menos 15 caracteres");
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
 				angular.element(document.getElementById('desactivar'))[0].disabled = true;
              $http.post('/saveTrabajador',$scope.trabajador).then(
                function(response){
                    

				  if (response.data==3) {

                    alert('Los datos fueron agregados con exito');
                    $scope.trabajador={};
                    $scope.frmTrabajador.$setPristine();
                    window.location.href=`{{url("/consultaUsuarios")}}`;
                  }
                   else if(response.data==2)
                  {
                  	angular.element(document.getElementById('desactivar'))[0].disabled = false;
                    alert("correo no valido");
                  }
                  
                   else if(response.data==1)
                  {
                  	angular.element(document.getElementById('desactivar'))[0].disabled = false;
                    alert("RFC no valido");
                  }
                   else if(response.data==0)
                  {
                  	angular.element(document.getElementById('desactivar'))[0].disabled = false;
                    alert("CURP no valido");
                  }
                  
                  else{
                    alert("Favor de completar campos vacios");
                  }
                  

              },function(errorResponse){

            }

          );
          
            }
        });
    			
        		     			
		</script>
		
	@endsection
@endsection

