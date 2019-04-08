<!DOCTYPE html>
<html ng-app="app">
<head>
	<title>SEVENSOFT</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/fondo0s/logo.png" type="image/x-icon">
	
	
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
      <li>Liliana García Guevara <span>Soporte</span></li>
      <li><a href="/ticketsoporte">Tickets</a></li>
    </ul>
  </div>
 

<div  id='center' class="main center" ng-controller="ctrl" style="margin: 8% 7% 0px 20%;">
	<div class="container">
			<h1>TICKETS</h1>
			<br>

		<div style="padding: 30px 0px 0px 0px;">
			<table class="table">
				<thead class="thead-dark">
					<tr> 	
						<th scope="col">FECHA</th>
						<th scope="col">DESCRIPCIÓN</th>
						<th scope="col">STATUS</th>
						<th scope="col" colspan="2">ACCIONES</th>
					</tr>
				</thead>
				<tbody>
					@foreach($ticketsop as $tick)
					<tr>
						<td>{{$tick->fecha}}</td>
						<td>{{$tick->descripcion}}</td>
						<td>{{$tick->status}}</td>
						<td><a href="/modificarTicket/{{$tick->idtickets}}">
							<input style="padding-right: 5px;" type=image src="{{asset('img/modificar.png')}}" width="40" height="40">
						</a></td>
						
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
		app.controller('ctrl', function($scope,$http,$filter){
		$scope.actualizacion={};
		$scope.date=new Date();
	
		 $scope.guardar=function(){
		 	$scope.actualizacion.fecha=$filter('date')($scope.date,'yyyy-MM-d hh:mm:ss');
	        $http.post('/modificarTicket/+',$scope.idtickets,$scope.actualizacion).then(
			
			function(response){
				window.location.href='{{url("/actualizaciones")}}';
		}, function(errorResponse){
			alert('Error al guardar los datos');
	});
			}		
	});
</script>
