
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
    window.idtickets="<?php print_r($ticketsop[0]->idtickets);?>";
    window.descripcion="<?php print_r($ticketsop[0]->descripcion);?>";
    window.ticketsoporte="<?php print_r($ticketsoporte);?>";
    window.fecha="<?php print_r($ticketsop[0]->fecha);?>";
    window.nombre="<?php print_r($ticketsop[0]->nombre);?>";
    window.apellido="<?php print_r($ticketsop[0]->apellido);?>";
    window.status="<?php print_r($ticketsop[0]->status);?>";
    window.correo="<?php print_r($ticketsop[0]->correo);?>";
    window.observaciones="<?php print_r($ticketsop[0]->observaciones);?>";
    window.fechacompromiso="<?php print_r($ticketsop[0]->fechacompromiso);?>";
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

<div  id='center' class="main center" ng-controller="ctrl" style="margin: 8% 7% 0px 20%;">
    <div class="container">
             <h1 style="padding-right: 15px;display: inline;padding-bottom: 15px;">TICKETS</h1><input style="padding-right: 15px;display: inline;" type=image src="{{asset('fondos/refrescar.png')}}" width="80" height="80">
             <br><br>
        <div >
                 <form name="frmRespuestas">

                
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

                <button  style="margin: 40px 30px 10px 20px;" type="button"   class="btn btn-success" ng-disabled="!frmRespuestas.$valid || date<fechacomprofinal || date>fechaseismeses " ng-click="guardar()">GUARDAR
                </button> 

                <a href="/ticketsoporte">
                    <button type="button" style="margin: 40px 0px 10px 0px;"  class="btn btn-primary">REGRESAR</button>
                </a>

                <button  style="margin: 40px 30px 10px 20px;" type="button"   class="btn btn-success" ng-disabled="!frmRespuestas.$valid || date<fechahoy" ng-click="liberar(idtickets)">LIBERAR</button>
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
        $scope.ticket={};
        $scope.descripcion=window.descripcion;
        $scope.fechahoy=new Date();
        $scope.idtickets=window.idtickets;
        $scope.nombre=window.nombre;
        $scope.ticketsoporte=window.ticketsoporte;
        $scope.apellido=window.apellido;
        $scope.fechacompromiso=window.fechacompromiso;
        $scope.fecha=window.fecha;
        $scope.date= new Date($filter('date')($scope.fechacompromiso,'yyyy-MM-d'));

        fechacom=new Date($scope.fechahoy);
        var day=fechacom.getDate();
        var month=fechacom.getMonth()+1;
        var year=fechacom.getFullYear();


       // $scope.jiji='04/09/2019';
        //$scope.jaja = new Date($scope.jiji);

        //alert($scope.jaja);

        $scope.fechacompro= month + '/' + day + '/' + year;
        $scope.fechacomprofinal = new Date($scope.fechacompro);
        //alert($scope.fechacomprofinal);

        $scope.fechaseismeses = new Date ($scope.ticketsoporte);
        //alert($scope.fechaseismeses);
        //alert($scope.fechacompro);
        //alert($scope.ticketsoporte);
        $scope.ticket.observaciones=window.observaciones;
        $scope.fechacompromiso=window.fechacompromiso;
        $scope.correo=window.correo;
        



        //alert($scope.ticketsoporte);
       
         $scope.guardar=function(){
            $scope.ticket.fechacompromiso=$filter('date')($scope.date,'yyyy-MM-d');
            $http.post('/actualizarticket/'+$scope.idtickets,$scope.ticket).then(
            
            function(response){
               
                alert('Ticket actualizado correctamente.');
                window.location.href='{{url("/ticketsoporte")}}';
                
        }, function(errorResponse){
            alert('Error al guardar los datos');
    });
             $scope.ticket={};
            }


            $scope.liberar=function(id){
            if(confirm("¿Quieres liberar el ticket?")){
            $http.post('/liberarticket/'+id).then(

        function(response){
            
            alert('Se han liberado correctamente el ticket');
            window.location.href='{{url("/ticketsoporte")}}';
        

    }, function(errorResponse){
        alert('Error al eliminar los datos');
})
    }
     $scope.ticket={};
}       

        
      
        
    });
</script>



