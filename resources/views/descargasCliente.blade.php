<!DOCTYPE html>
<html ng-app="app">
<head>
	<meta charset="utf-8">
	<title>SEVENSOFT</title>

</head>
<link rel="shortcut icon" href="/fondo0s/logo.png" type="image/x-icon">
<link href="/css/style.css" rel="stylesheet" />
<link href="/css/styleDescargaCliente.css" rel="stylesheet" />
<link rel="shortcut icon" href="/fondos/logo.png" type="image/x-icon">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

 <script type="text/javascript">
    window.iddescargas="<?php print_r($descarga[0]->iddescargas);?>";
    window.versiones="<?php print_r($descarga[0]->versiones);?>";
    window.informacion="<?php print_r($descarga[0]->informacion);?>";
    window.ruta="<?php print_r($descarga[0]->ruta);?>";
    window.fecha="<?php print_r($descarga[0]->fecha);?>";
    
</script>

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
    </ul>
  </div>

	<div id="contenedor" ng-controller="ctrl">
		<div class="hero">
			<div class="descarga-info">
					<h1 class="descarga-header">Descarga nuestra aplicacion para Android</h1>
					<br>
					<label>@{{informacion}}</label>
					<label>Fecha de actualización: @{{fecha}}</label>
					<br>
					<a ng-href="@{{ruta}}" class="descarga-btn pulse">Descargar ahora</a>
					<br>
					<label class="version-info" >Versión @{{versiones}}</label>
			</div>
			<div class="descarga-img floating">
				<img src="{{asset('img/logofinalfinal.png')}}">
			</div>
		</div>
	</div>
<script type="text/javascript" src="{{asset('js/angular.js')}}"></script>
</body>
</html>
<script>
	var app=angular.module('app',[]);
		app.controller('ctrl', function($scope,$http,$filter){
		$scope.iddescargas=window.iddescargas;
        $scope.informacion=window.informacion;
        $scope.versiones=window.versiones;
        $scope.ruta=window.ruta; 
        $scope.fecha=window.fecha; 
			
	});
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>


