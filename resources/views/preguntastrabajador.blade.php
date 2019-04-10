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
      <li><a href="/consultaUsuarios">Configurar usuario</a></li>
      <li><a href="/actualizaciones">Subir actualización</a></li>
      <li><a href="/index">Cerrar Sesión</a></li>
    </ul>
  </div>
  



<div  id='center' class="main center" ng-controller="ctrl" style="margin: 8% 7% 0px 20%;">
	<div class="container">
			 <h1 style="padding-right: 15px;display: inline;padding-bottom: 15px;">ACTUALIZACIONES</h1><input style="padding-right: 15px;display: inline;" type=image src="{{asset('fondos/refrescar.png')}}" width="80" height="80">
			<br><br>
			
			<div >
			<table class="table">
				<thead class="thead-dark">
					<tr> 	
						
						<th scope="col">PREGUNTA</th>
						<th scope="col" >RESPUESTA</th>
						<th scope="col" colspan="2">ACCIONES</th>
					</tr>
				</thead>
				<tbody>
					@foreach($mostrarpreguntas as $pregunta)
					<tr>
						
						<td>{{$pregunta->descripcion}}</td>
						<td>{{$pregunta->respuesta}}</td>
						
						
						<td colspan="2">


							<a ng-show="!{{$pregunta->idrespuestas}}" href="{{url('/editarrespuesta/'.encrypt($pregunta->idpreguntas))}}"><input style="padding-right: 5px;" type=image src="{{asset('fondos/agregar.png')}}" width="40" height="40" ></a>

							<a ng-show="{{$pregunta->idrespuestas}}" href="{{url('/modificar/'.encrypt($pregunta->idpreguntas))}}"><input style="padding-right: 5px;" type=image src="{{asset('fondos/editar.png')}}" width="30" height="30"></a>

							<input style="padding-right: 5px;" type=image src="{{asset('fondos/borrar.png')}}" ng-click="eliminar({{$pregunta->idpreguntas}})" ng-show="bandera==0" width="30" height="30">
						</td>

						
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

<script>
	var app=angular.module('app',[]);
		app.controller('ctrl', function($scope,$http){
		$scope.pregunta={};
		$scope.var={};
		$scope.bandera=0;
		
		$scope.eliminar=function(id){
			
		if(confirm("¿Quieres eliminar el registro?")){
			$scope.bandera=1;
			$http.delete('/deletepregunta/'+id).then(

		function(response){
			
			alert('Se han eliminado correctamente los datos');
			window.location.href='{{url("/preguntastrabajador")}}';
		

	}, function(errorResponse){
		alert('Error al eliminar los datos');
})
	}
}		
	});
</script>
