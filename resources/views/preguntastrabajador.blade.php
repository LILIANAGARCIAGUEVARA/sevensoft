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
      <li><a href="https://vanila.io" target="_blank">Preguntas de Clientes</a></li>
      <li><a href="https://instagram.com/plavookac" target="_blank">Configurar usuario</a></li>
      <li><a href="https://twitter.com/plavookac" target="_blank">Subir actualización</a></li>
    </ul>
  </div>


<div  id='center' class="main center" ng-controller="ctrl" >
	<div class="container">
			<h1 style="padding: 40px 0px 0px 150px;">PREGUNTAS DE CLIENTES</h1>
			<br>
			
			<br>
			<div style="padding: 0px 0px 0px 150px;">
			<table class="table">
				<thead class="thead-dark">
					<tr> 	
						<th scope="col">#</th>
						<th scope="col">PREGUNTA</th>
						<th scope="col" >RESPUESTA</th>
						<th scope="col" colspan="2">ACCIONES</th>
					</tr>
				</thead>
				<tbody>
					@foreach($mostrarpreguntas as $pregunta)
					<tr>
						<td>{{$pregunta->idpreguntas}}</td>
						<td>{{$pregunta->descripcion}}</td>
						<td>{{$pregunta->respuesta}}</td>
						<td colspan="2"><a href="/editarrespuesta/{{$pregunta->idpreguntas}}"><input style="padding-right: 5px;" type=image src="{{asset('img/agregar.png')}}" width="40" height="40" ></a>

						<input style="padding-right: 5px;" type=image src="{{asset('img/eliminar.png')}}" ng-click="eliminar({{$pregunta->idpreguntas}})" width="40" height="40">
						<a href="/modificar/{{$pregunta->idpreguntas}}"><input style="padding-right: 5px;" type=image src="{{asset('img/modificar.png')}}" width="40" height="40"></td></a>
						
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
		
		$scope.eliminar=function(id){
			
		if(confirm("¿Quieres eliminar el registro?")){
			$http.delete('/delete/'+id).then(

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
