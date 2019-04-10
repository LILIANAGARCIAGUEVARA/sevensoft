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
      <li>Liliana García Guevara <span>Cliente</span></li>
      <li><a href="/verrespuesta">Preguntas</a></li>
      <li><a href="/descargacliente">Descargas</a></li>
      <li><a href="/tickets">Tickets</a></li>
      <li><a href="/index">Cerrar Sesión</a></li>
    </ul>
  </div>



<div  id='center' class="main center" ng-controller="ctrl" style="margin: 8% 7% 0px 20%;">
	<div class="container">
			 <h1 style="padding-right: 15px;display: inline;padding-bottom: 15px;">PREGUNTAS FRECUENTES</h1><input style="padding-right: 15px;display: inline;" type=image src="{{asset('fondos/refrescar.png')}}" width="80" height="80">
			<br><br>
			<br>
		
			<div class="form-group">
			<div class="form-row">

			<div class="col-11">
			<input type="text" ng-model="buscar" class="form-control" >
			</div>

			<div class="col-1">
			<img  style="padding-right: 5px;"  ng-model="nombre" type=image src="{{asset('fondos/buscar.png')}}"  width="50" height="50">
			</div>
			</div>
			</div>
			<a type="button" style="margin-top: 2%" class="btn btn-success"  href='{{url("/preguntas")}}'>AGREGAR PREGUNTA</a>
			<br><br>

			<table class="table">
				<thead class="thead-dark">
					<tr> 	
						<th scope="col">PREGUNTA</th>
						<th scope="col" >RESPUESTA</th>
						
					</tr>
				</thead>
				<tbody ng-repeat="resp in pre | filter:buscar as result">
					<tr>
						<td scope="row" >@{{ resp.descripcion }}</td>
						<td>@{{ resp.respuesta }}</td>
						
									
					</tr>
				</tbody>

			</table>
				
	</div>
</div>
<script type="text/javascript" src="{{asset('js/angular.js')}}"></script>
</body>
</html>

<script>
	var app=angular.module('app',[]);
		app.controller('ctrl', function($scope,$http,$filter){
		$scope.respuesta={};

		$scope.pre = {!! json_encode($mostrarpreguntas->toArray()) !!}
			
	});
</script>

