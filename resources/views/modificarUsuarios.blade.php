
@extends('footer')
@extends('header')

@section('header')
   @parent
<head> <link href="/css/bootstrap.min.css" rel="stylesheet"></head>
   <div ng-controller="ctrl">
    <div id="formulario">
      <h1>USUARIOS</h1>
    <script type="text/javascript">
        window.idUser = "<?php print_r($modificarUsuarios[0]->idusuarios);?>";
        window.correo = "<?php print_r($modificarUsuarios[0]->correo);?>";
        window.contrasena= "<?php print_r($modificarUsuarios[0]->contraseña);?>";
      </script>
     

   		<form name="frm" style="width: 500px;height: 500px;">
        <img id="Usuario" src="/fondos/usuarios.png">
            <div> 
   			        <label>Correo:</label>
                <input class="form-control" id="inputSeleccionado" placeholder="example@gmail.com " type="email" name="correo"  ng-model="usuarioEditado.correo" onkeyup ="return validarEmail(this)" required>
                <span ng-show="frm.correo.$dirty && frm.correo.$error.required"> Campo requerido </span> <br>
                <span ng-show="frm.correo.$error.email"> Formato e-mail incorrecto</span> 
                  <a id='resultado'></a>
            </div>
            <div>
                <label>Contraseña:</label>
                <input class="form-control" id="inputSeleccionado" type="text" name="contrasena" ng-model="usuarioEditado.contrasena" required>
                <span ng-show="frm.contrasena.$dirty && frm.contrasena.$error.required"> Campo requerido </span> <br>
              
            </div>
            <button type=" text" class="btn btn-primary" ng-disabled="frm.$invalid" ng-click="editar()"> Modificar</button>
         
      </form>
   </div>
</div>
<script type="text/javascript">
 function validarEmail(elemento){

  var texto = document.getElementById(elemento.id).value;
  var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
  
  if (!regex.test(texto)) {
      document.getElementById("resultado").innerHTML = "Correo invalido";
  } else {
      document.getElementById("resultado").innerHTML = "";
  }

}

</script>
      
   	@section('footer')
   	  @parent

      <script>

   	     var app = angular.module('app',[])
        .controller('ctrl',function($scope,$http)
   	     {

            $scope.usuarioEditado={};

            

            $scope.usuarioEditado={
            id:window.idUser,
            correo:window.correo,
            contrasena:window.contrasena
           }

          
          $scope.editar=function(){
              $http.post('/modificarUsuarios/'+$scope.usuarioEditado.id,$scope.usuarioEditado).then(
                function(response){
                    alert('Los datos fueron modificados con exito');
                    $scope.usuarioEditado={};
                    $scope.frm.$setPristine();
                    window.location.href=`{{url("/consultaUsuarios")}}`;
                  
              },function(errorResponse){

            }
          );}
});
  </script>
      
   @endsection
@endsection
