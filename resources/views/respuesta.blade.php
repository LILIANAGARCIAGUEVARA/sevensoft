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
    window.descripcion="<?php print_r($pregunadmin[0]->descripcion);?>";
    window.idpreguntas="<?php print_r($pregunadmin[0]->idpreguntas);?>";
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
            
                <h1 style="padding-top: 40px;">RESPUESTA A CLIENTES</h1>
            
                <div> 
                <label style="padding-top: 45px;">@{{descripcion}}</label>
                </div>
                
                <div class="col-12">
                    <textarea class="form-control" aria-label="With textarea" type="text" name="respuestaadmin" ng-model="respuesta.respuestaadmin" required></textarea>
                    

                    <input type="text" ng-show="false" class="form-control" name="idpreguntasadmin" ng-model="respuesta.idpreguntaadmin" required />

                    <input type="text" ng-show="false" class="form-control" name="idtrabajadoradmin" ng-model="respuesta.idtrabajadoradmin" required />
                    
                </div>

                <button  style="margin: 40px 30px 10px 20px;" type="button"   class="btn btn-success"ng-disabled="!frmRespuestas.$valid" ng-click="guardar()">GUARDAR</button> 
                <a href="/preguntastrabajador">
                <button type="button" style="margin: 40px 0px 10px 0px;" class="btn btn-primary">REGRESAR</button></a>
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
        $scope.idpreguntas=window.idpreguntas;
        $scope.respuesta={};
        $scope.idtrabajador="1";
        $scope.respuesta.idpreguntaadmin=$scope.idpreguntas;
        $scope.respuesta.idtrabajadoradmin=$scope.idtrabajador;

        $scope.guardar=function(){
             $http.post('/guardarrespuesta',$scope.respuesta).then(
        function(response){
            alert('Datos guardados correctamente');
             $scope.respuesta={};
            window.location.href='{{url("/preguntastrabajador")}}';

    }, function(errorResponse){
        alert('Error al guardar los datos');
}) 
              $scope.respuesta={};
        }
      
        
    });
</script>

