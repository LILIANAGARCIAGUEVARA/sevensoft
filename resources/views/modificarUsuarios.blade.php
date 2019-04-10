
@extends('footer')
@extends('header')

@section('header')
   @parent
<head> <link href="/css/bootstrap.min.css" rel="stylesheet"></head>

<div class="header"></div>
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
  </label>
  <div id="sidebarMenu">
    <ul class="sidebarMenuInner">
      <li>Liliana García Guevara <span>Administrador</span></li>
      <li><a href="/preguntastrabajador">Preguntas de Clientes</a></li>
      <li><a href="/consultaUsuarios">Configurar usuario</a></li>
      <li><a href="/actualizaciones">Subir actualización</a></li>
    </ul>
  </div>
   <div ng-controller="ctrl">
    <div id="formulario">
      <h1>USUARIOS</h1>
     
     
    <script type="text/javascript">
        window.idClien = "<?php print_r($modificarUsuarios[0]->idusuarios);?>";
        window.nombre = "<?php print_r($modificarUsuarios[0]->nombre);?>";
        window.apellido= "<?php print_r($modificarUsuarios[0]->apellido);?>";
        window.domicilio= "<?php print_r($modificarUsuarios[0]->direccion);?>";
        window.curp= "<?php print_r($modificarUsuarios[0]->curp);?>";
        window.telefono= "<?php print_r($modificarUsuarios[0]->telefono);?>";
        window.rfc= "<?php print_r($modificarUsuarios[0]->rfc);?>";
        window.fecha_nac= "<?php print_r($modificarUsuarios[0]->fecha_nac);?>";
        window.correo = "<?php print_r($modificarUsuarios[0]->correo);?>";
        window.contrasenaUser = "<?php print_r(decrypt($modificarUsuarios[0]->contraseña));?>";
       
      </script>
 

   		<form name="frm" style="width: 500px;height: 500px;">
        <img id="Usuario" src="/fondos/usuarios.png">

            <div>
                <label>Nombre:</label>
                <input class="form-control"  type="text" name="nombre" maxlength="25" ng-model="usuarioEditado.nombre" onchange="return validatexto(this)" required>
                <span ng-show="frm.nombre.$dirty && frm.nombre.$error.required"> Campo requerido<br>Longitud de 3 a 25 caracteres </span> 
                 <br>
              
            </div>

             <div>
                <label>Apellidos:</label>
                <input class="form-control"  type="text" name="apellido" maxlength="25" ng-model="usuarioEditado.apellido" onchange="return validatexto(this)" required>
                <span ng-show="frm.apellido.$dirty && frm.apellido.$error.required"> Campo requerido <br>Longitud 25 caracteres </span> <br>
              
            </div>

            <div>
                <label>Domicilio:</label>
                <input class="form-control"  type="text" name="domicilioModificar" maxlength="25" ng-model="usuarioEditado.domicilioModificar" onchange="return validatext(this)" required>
                <span ng-show="frm.domicilioModificar.$dirty && frm.domicilioModificar.$error.required"> Campo requerido <br>Longitud de 15 a 25 caracteres</span> <br>
            </div>

             <div>
                <label>CURP:</label>
                <input class="form-control"  type="text" name="curpModificar" maxlength="18"  ng-model="usuarioEditado.curpModificar" onchange="return validaCurpRFC(this)" required>
                <span ng-show="frm.curpModificar.$dirty && frm.curpModificar.$error.required"> Campo requerido </span>
                 <span ng-show="frm.curpModificar.$dirty && frm.curpModificar.$error.required"> Longitud 18 caracteres </span>
                 <br>
            </div>

            <div>
                <label>Telefono:</label>
                <input class="form-control"  type="text" name="telefonoModificar" ng-model="usuarioEditado.telefonoModificar" onchange="return validaNum(this)" maxlength="10"  required>
                <span ng-show="frm.telefonoModificar.$dirty && frm.telefonoModificar.$error.required"> Campo requerido<br>Longitud 10 caracteres </span>
                 <br>
            </div>

            <div>
               <label>Fecha Nacimiento:</label>            
               <input class="form-control"  type="date" name="fechaNacimiento" ng-model="usuarioEditado.edad"  min="1919-01-01" max="2002-01-01" required>
               <span ng-show="frm.fechaNacimiento.$dirty && frm.fechaNacimiento.$error.required"> Campo requerido </span> <br>
               <span ng-show="frm.fechaNacimiento.$dirty && frm.fechaNacimiento.$invalid"> Fecha de Nacimiento Invalida </span> <br>
            
           </div>

            <div>
                <label>RFC:</label>
                <input class="form-control"  type="text" name="rfcModificar" ng-model="usuarioEditado.rfcModificar" onchange="return validaRFC(this)" maxlength="14"  required>
                <span ng-show="frm.rfcModificar.$dirty && frm.rfcModificar.$error.required"> Campo requerido <br>Longitud 14 caracteres </span> <br>
            </div>


            <div> 
   			        <label>Correo:</label>
                <input class="form-control"  placeholder="example@gmail.com " type="email" name="correo"  ng-model="usuarioEditado.correoModificado"  required>
                <span ng-show="frm.correo.$dirty && frm.correo.$error.required"> Campo requerido </span> <br>
                <span ng-show="frm.correo.$error.email"> Formato e-mail incorrecto</span> 
                  <a id='resultado'></a>
            </div>
            <div>
                <label>Contraseña:</label>
                <input class="form-control"  type="password" name="contrasenaUser"  maxlength="25" ng-model="usuarioEditado.contrasenaUser" id="deshabilitar" onchange="return validacontra(this)" required>
                <span ng-show="frm.contrasenaUser.$dirty && frm.contrasenaUser.$error.required"> Campo requerido </span> <br>
            </div>


            <button type=" text" class="btn btn-primary" ng-disabled="frm.$invalid" ng-click="editar()"> Modificar</button>
         
      </form>
   </div>
</div>
<!--<script type="text/javascript">
 function validarEmail(elemento){
 var texto = document.getElementById(elemento.id).value;
  var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  if (!regex.test(texto)) {
      document.getElementById("resultado").innerHTML = "Correo invalido";
  } else {
      document.getElementById("resultado").innerHTML = "";
  }
}

</script>-->

<script type="text/javascript">
 function validatexto(elemento)
 {
  if (!/^([a-zA-Zá-úñÑáéíóúÁÉÍÓÚ ]{3,25})*$/.test(elemento.value)){
      alert("Solo se permiten letras, Longitud de 3 a 25 caracteres");
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
 function validaRFC(elemento)
 {
  if (!/^([0-9A-Z]{14})*$/.test(elemento.value)){
      alert("Solo se permiten letras Mayusculas y números sin espacios,este espacio debe contener 14 caracteres");
      elemento.value = '';
  }
}
</script>

<script type="text/javascript">
 function validatext(elemento)
 {
  if (!/^([0-9a-zA-Zá-úñÑáéíóúÁÉÍÓÚ#, ]{15,45})*$/.test(elemento.value)){
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

      <script>

   	     var app = angular.module('app',[])
        .controller('ctrl',function($scope,$http)
   	     {

 
             /*fn=new Date(window.fecha_nac);
             fn.setDate(fn.getDate()+1);*/


            $scope.usuarioEditado={};
     

      
           

            $scope.usuarioEditado={
            id:window.idClien,
            nombre:window.nombre,
            apellido:window.apellido,
            correoModificado:window.correo,
            contrasenaUser:window.contrasenaUser,
            domicilioModificar:window.domicilio,
            curpModificar:window.curp,
            telefonoModificar:window.telefono,
            rfcModificar:window.rfc,
            edad:new Date(window.fecha_nac)
            }




          console.log($scope.usuarioEditado.edad);
          
          $scope.editar=function(){
              $http.post('/modificarUsuarios/'+$scope.usuarioEditado.id,$scope.usuarioEditado).then(
                function(response){
                    if (response.data==3) {
                    alert('Los datos fueron modificados con exito');
                    $scope.usuarioEditado={};
                    $scope.frm.$setPristine();
                    window.location.href=`{{url("/consultaUsuarios")}}`;
                     angular.element(document.getElementById('deshabilitar'))[0].disabled = false;
                  }
                   if(response.data==2)
                  {
                    alert("correo no valido")
                  }
                  
                  if(response.data==1)
                  {
                    alert("RFC no valido")
                  }
                  if(response.data==0)
                  {
                    alert("CURP no valido")
                  }
                  

              },function(errorResponse){

            }

          );
          
            }
     });
  </script>
      
   @endsection
@endsection
