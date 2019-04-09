@extends('footer')
@extends('header')
@section('header')
  @parent

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

<div ng-controller="ctrl">
  <div class="main container">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-10">
          <form name="frmTicket">
        <h1>TICKET</h1>
        
        <img src="/fondos/factura.png" width="50px" height="50px" style="margin-top: -60px; margin-left: 150px;">
        <br>
        <div class="row">
         
          <div class="col-sm-5">
            <div class="row" >
              <label for="ticket" class="form-label col-sm-4"><h3 style="margin-left: 390px;">Fecha</h3></label>
              <input type="text" name="fecha" ng-model="fechaHoy" class="form-control col-sm-4" disabled style="margin-left: 500px;margin-top: -50px;">
             
            </div>
          </div>

          <br>
          <br>

          <div class="col-sm-8">
            <div class="row">

              <textarea name="descripcionTickets" rows="4" cols="50" ng-model="tickets.descripcionTickets" placeholder="Describenos tus problemas" class="form-label col-sm-12" required></textarea>
              <span ng-show="frmTicket.$dirty && frmTicket.descripcionTickets.$error.required"> Campo version es requerido</span>
            </div>
          </div>
          <br>
          <div class="col-sm-12">
            <div class="row">
           </form>
              <br>
              <button style="margin-top: 50px;" id="btnGuardar" ng-click="agregarTickets()" class="btn btn-success col-sm-2" ng-disabled="!frmTicket.$valid">Guardar</button>
           

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

@section('footer')
    @parent
  <script> 
    var app = angular.module('app',[])
    .controller('ctrl',function($scope,$http)
      {

        $scope.fechaHoy = new Date().toISOString().split("T")[0];
        $scope.tickets={

          fechaTickets:$scope.fechaHoy
        };



         $scope.agregarTickets=function(){
         angular.element(document.getElementById('btnGuardar'))[0].disabled = true;
          $http.post('/saveTickets',$scope.tickets).then(
            function(response){
              alert('Su peticion se ha realizado correctamente, espere respuesta');
                 
                    $scope.tickets={};
                    window.location.href=`{{url("/tickets")}}`;
          },function(errorResponse)
          {
            alert('error');
          });

          $scope.tickets={};
           $scope.frmTicket.$setPristine();
        }

     });

        </script>

  @endsection
@endsection