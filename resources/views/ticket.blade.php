<!DOCTYPE html>
<html ng-app="app">
<head>
    <meta charset="utf-8">
    <title>SEVENSOFT</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/fondos/logo.png" type="image/x-icon">
</head>

<script type="text/javascript">
    window.idtickets="<?php print_r($ticketsop[0]->idtickets);?>";
    window.descripcion="<?php print_r($ticketsop[0]->descripcion);?>";
    window.fecha="<?php print_r($ticketsop[0]->fecha);?>";
    window.nombre="<?php print_r($ticketsop[0]->nombre);?>";
    window.apellido="<?php print_r($ticketsop[0]->apellido);?>";
    window.status="<?php print_r($ticketsop[0]->status);?>";
    window.correo="<?php print_r($ticketsop[0]->correo);?>";
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
      <li><a  target="_blank">Preguntas de Clientes</a></li>
      <li><a target="_blank">Configurar usuario</a></li>
      <li><a  target="_blank">Subir actualización</a></li>
    </ul>
  </div>

<div  id='center' class="main center" ng-controller="ctrl" >
    <div class="container">
        <div style="padding: 0px 0px 0px 150px;">
            <form name="frmRespuestas">
                 <h1 class="bordes">TICKETS</h1>
                
                <div class="border border-light">

                    <div class="col-12">
                        <label class="chico">No. de ticket: </label>
                        <label class="chico">@{{idtickets}}</label>
                    </div>


                    <div class="col-12">
                        <label>Fecha: </label>
                        <label>@{{fechanew[0]}}</label>
                    </div>

                    <div class="col-12">
                        <label>Cliente: </label>
                        <label class="chico">@{{nombre}}</label>
                        <label class="chico">@{{apellido}}</label>
                    </div>
                    
                     <div class="col-12">
                        <label>Correo: </label>
                        <label class="chico">@{{correo}}</label>
                    </div>


                    <div class="col-12">
                        <label>Descripción: </label>
                        <label class="chico">@{{descripcion}}</label>
                    </div>

                </div>

                <br>

                <div class="border border-light">
                        <div class="col-12">
                            <label class="espacio">Observaciones: </label>
                            <textarea class="form-control" aria-label="With textarea" type="text" name="observaciones" ng-model="ticket.observaciones" required></textarea>
                            
                        </div>

                        <div class="col-3" >
                            <label class="espacio">Fecha compromiso: </label>
                            <input type="date" class="form-control" min="2019-03" name="fecha" ng-model="date" required />
                        </div>
                </div>

                <button  style="margin: 40px 30px 10px 20px;" type="button"   class="btn btn-outline-info" ng-disabled="!frmRespuestas.$valid || date<fechahoy" ng-click="guardar()">GUARDAR
                </button> 

                <a href="/ticketsoporte">
                    <button type="button" style="margin: 40px 0px 10px 0px;"  class="btn btn-outline-info">REGRESAR</button>
                </a>
            </form>
         
        </div>
    </div>
</div>
                     
<script type="text/javascript" src="{{asset('js/angular.js')}}"></script>
</body>
</html>
<script>
    var app=angular.module('app',[]);
        app.controller('ctrl', function($scope,$http,$filter){
        $scope.descripcion=window.descripcion;
        $scope.fechahoy=new Date();
        $scope.idtickets=window.idtickets;
        $scope.nombre=window.nombre;
        $scope.apellido=window.apellido;
        $scope.fecha=window.fecha;
        $scope.fechanew=$scope.fecha.split(" ");
        $scope.correo=window.correo;

         $scope.guardar=function(){
            $scope.ticket.fechacompromiso=$filter('date')($scope.date,'yyyy-MM-d');
            $http.post('/actualizarticket/'+$scope.idtickets,$scope.ticket).then(
            
            function(response){
              
                alert('Ticket actualizado correctamente.');
                window.location.href='{{url("/ticketsoporte")}}';
        }, function(errorResponse){
            alert('Error al guardar los datos');
    });
            }


        
      
        
    });
</script>
