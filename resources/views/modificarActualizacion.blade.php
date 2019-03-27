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

<script type="text/javascript">
    window.versiones="<?php print_r($editaract[0]->versiones);?>";
    window.informacion="<?php print_r($editaract[0]->informacion);?>";
    window.ruta="<?php print_r($editaract[0]->ruta);?>";
    window.fecha="<?php print_r($editaract[0]->fecha);?>";
    window.idDescargas="<?php print_r($editaract[0]->idDescargas);?>";
    
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
      <li>Liliana García Guevara <span>Administrador</span></li>
      <li><a href="https://vanila.io" target="_blank">Preguntas de Clientes</a></li>
      <li><a href="https://instagram.com/plavookac" target="_blank">Configurar usuario</a></li>
      <li><a href="https://twitter.com/plavookac" target="_blank">Subir actualización</a></li>
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
						<input type="text" class="form-control" name="versiones" required ng-model="actualizacion.versiones"/>
						<span ng-show="frmActualizacion.$dirty && frmActualizacion.versiones.$error.versiones"> Campo version es requerido</span>
					</div>

					<div class="col-9">
						<label>Información</label>
						<input type="text" class="form-control" name="informacion" required ng-model="actualizacion.informacion" onchange="return validatexto(this)"/>
						<span ng-show="frmActualizacion.$dirty && frmActualizacion.informacion.$error.informacion"> Campo informacion es requerido</span>
					</div>

					<div class="col-7">
						<label>Ruta</label>
						<input type="text" class="form-control" name="ruta" required ng-model="actualizacion.ruta" onchange="return validatexto(this)"/>
						<span ng-show="frmActualizacion.$dirty && frmActualizacion.ruta.$error.ruta"> Campo ruta es requerido</span>
					</div>

		
					<div class="col-2">
						<br>
						<button type="button" style="margin-top: 3%" class="btn btn-success" ng-disabled="!frmActualizacion.$valid" ng-click="guardar()">MODIFICAR</button>
					</div>

					<div class="col-2">
						<br>
						<a href="/actualizaciones"><button style="margin-top: 3%" type="button" class="btn btn-primary" >REGRESAR</button></a>
					</div>
					</div>
				</div>
			</div>	
		</form>
	
	
	</div>
</div>
<script type="text/javascript" src="{{asset('js/angular.js')}}"></script>
</body>
</html>

<script>
	var app=angular.module('app',[]);
		app.controller('ctrl', function($scope,$http,$filter){
		$scope.actualizacion={};
		$scope.actualizacion.versiones=window.versiones;
        $scope.actualizacion.informacion=window.informacion;
        $scope.actualizacion.ruta=window.ruta;
		$scope.actualizacion.fecha=window.fecha;
		$scope.actualizacion.idDescargas=window.idDescargas;
	

		$scope.guardar=function(){
            $http.post('/modificaract/'+$scope.actualizacion.idDescargas,$scope.actualizacion).then(


        function(response){
            alert("Se han modificado correctamente los datos");
            window.location.href='{{url("/actualizaciones")}}';
            

    }, function(errorResponse){
        alert('Error al modificar los datos');
	})
            $scope.actualizacion={};
        }

    });

		
</script>
