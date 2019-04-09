<!DOCTYPE html>
<html ng-app="app">
<head>
	<title>SEVENSOFT</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/fondos/logo.png" type="image/x-icon">
	</script>
	
</head>

<body>


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
      <li><a href="/formularioTrabajador"  target="_blank">Configurar usuario</a></li>
      <li><a href="/actualizaciones"  target="_blank">Subir actualización</a></li>
    </ul>
  </div>


<div  id='center' class="main center" ng-controller="ctrl" style="margin: 8% 7% 0px 20%;">
	<div class="container">
			 <h1 style="padding-right: 15px;display: inline;padding-bottom: 15px;">ACTUALIZACIONES</h1><input style="padding-right: 15px;display: inline;" type=image src="{{asset('fondos/refrescar.png')}}" width="80" height="80">
			<br>

		<form name="frmActualizacion">
			<div class="form-group">
				<div class="form-row">
			
					<div class="col-3">
						<label>Versión</label>
						<input type="text" class="form-control" name="versiones" required ng-model="actualizacion.versiones" ng-pattern="/^[1-9.]*$/" onchange="return validaNum(this)"/>
						<span ng-show="frmActualizacion.$dirty && frmActualizacion.versiones.$error.versiones"> Campo version es requerido</span>
					</div>

					<div class="col-9">
						<label>Información</label>
						<input type="text" class="form-control" name="informacion" required ng-model="actualizacion.informacion"/>
						<span ng-show="frmActualizacion.$dirty && frmActualizacion.informacion.$error.informacion"> Campo informacion es requerido</span>
					</div>

					<div class="col-7">
						<label>Ruta</label>
						<input type="text" class="form-control" name="ruta" required ng-model="actualizacion.ruta" />
						<span ng-show="frmActualizacion.$dirty && frmActualizacion.ruta.$error.ruta"> Campo ruta es requerido</span>
					</div>

					<div class="col-3">
						<label>Fecha</label>
						<input type="date" class="form-control" name="fecha" disabled required ng-model="date"/>
						<span ng-show="frmActualizacion.$dirty && frmActualizacion.fecha.$error.fecha"> Campo fecha es requerido</span>
					</div>

					<div class="col-2">
						<br>
						<button type="button" style="margin-top: 3%" class="btn btn-success" ng-disabled="!frmActualizacion.$valid" ng-click="guardar()">GUARDAR</button>
					</div>
				</div>
			</div>	
		</form>
	


		<div style="padding: 30px 0px 0px 0px;">
			<table class="table">
				<thead class="thead-dark">
					<tr> 	
						<th scope="col">FECHA</th>
						<th scope="col">VERSIÓN</th>
						<th scope="col">INFORMACIÓN</th>
						<th scope="col">RUTA</th>
						<th scope="col" colspan="2">ACCIONES</th>
					</tr>
				</thead>
				<tbody>
					@foreach($mostraract as $act)
					<tr>
						<td>{{$act->fecha}}</td>
						<td>{{$act->versiones}}</td>
						<td>{{$act->informacion}}</td>
						<td>{{$act->ruta}}</td>
						
						<td><input style="padding-right: 5px;" type=image src="{{asset('fondos/borrar.png')}}" ng-click="eliminar({{$act->idDescargas}})" width="30" height="30">
						<a href="{{url('/editaractualizacion/'.encrypt($act->idDescargas))}}"><input style="padding-right: 5px;" type=image src="{{asset('fondos/editar.png')}}" width="30" height="30"></td></a>
						
						
					</tr>
					@endforeach
				</tbody>

			</table>
		</div>	
	</div>
</div>
<script type="text/javascript" src="{{asset('js/angular.js')}}"></script>
</body>
</html>

<script type="text/javascript">
 function validaNum(elemento)
 {
  if (!/^([0-9.])*$/.test(elemento.value)){
      alert("Solo se permiten números y puntos");
      elemento.value = '';
  }
}
</script>

<script>
	var app=angular.module('app',[]);
		app.controller('ctrl', function($scope,$http,$filter){
		$scope.actualizacion={};
		$scope.date=new Date();
	

		 $scope.guardar=function(){
		 	$scope.actualizacion.fecha=$filter('date')($scope.date,'yyyy-MM-d hh:mm:ss');
	        $http.post('/agregaractualizacion',$scope.actualizacion).then(
			function(response){
				alert('Se agregaron los datos correctamente');
				window.location.href='{{url("/actualizaciones")}}';

		}, function(errorResponse){
			alert('Error al guardar los datos');
	});
	        $scope.actualizacion={};
			}


		$scope.eliminar=function(id){
			
		if(confirm("¿Quieres eliminar el registro?")){
			$http.delete('/delete/'+id).then(

		function(response){
			alert('Se han eliminado correctamente los datos');
			window.location.href='{{url("/actualizaciones")}}';
		

	}, function(errorResponse){
		alert('Error al eliminar los datos');
})
	}
}		
	});
</script>

<script type="text/javascript">
 function validatexto(elemento)
 {
  if (!/^([a-zA-Zá-úñÑáéíóúÁÉÍÓÚ. ])*$/.test(elemento.value)){
      alert("Solo se permiten letras");
      elemento.value = '';
  }
}
</script>
