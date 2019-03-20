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
			<h1 style="padding: 40px 0px 0px 150px;">PREGUNTAS FRECUENTES</h1>
			<br>
			
			<br>
			<div class="col-10">
				<p style="padding: 0px 0px 0px 150px;">Buscar</p>
				<input class="form-control" style="margin: 0px 150px 0px 150px;" type="text" name="Buscar"/>
				<br>
			</div>

			<div style="padding: 0px 0px 0px 150px;">
			<table class="table">
				<thead class="thead-dark">
					<tr> 	
						<th scope="col">PREGUNTA</th>
						<th scope="col" >RESPUESTA</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($mostrarpreguntas as $pregunta)
					<tr>
						<td>{{$pregunta->descripcion}}</td>
						<td>{{$pregunta->respuesta}}</td>
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

