@extends('footer')
@extends('header')
@section('header')
  @parent
<style>
  .main{
    float: none;  
  }
  .Abierto{
    color: green;
    font-weight: bold;
  }
  .Cerrado{
    color: red;
    font-weight: bold;
  }
  .Pendiente{
    font-weight: bold;
  }
</style>
<div class="header"></div>
  <input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
  <label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
  </label>
  <div id="sidebarMenu"  ng-controller="ctrl">
    <ul class="sidebarMenuInner">
    <li>@{{nombre}}<span> Jefa</span></li>
    <li>
        <ul class="sidebarMenuInner">
          <li>Asistencia</li>
          <li><a href="#" target="_blank">Preguntas</a></li>
          <li><a href="#" target="_blank">Desargas</a></li>
        </ul>
    </li>
    </ul>
  </div>

<div ng-controller="ctrl">
  <div class="main container">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-10">
        <h1>TICKET</h1>
        <h2>Agregar Nuevo Ticket</h2>
        <br>
        <div class="row">
          <div class="col-sm-5">
            <div class="row">
              <label for="ticket" class="form-label col-sm-5"><h3>Ticket#</h3></label>
              <input type="text" name="ticket" class="form-control col-sm-3" disabled>
            </div>
          </div>
          <br>
          <br>
          <div class="col-sm-5">
            <div class="row">
              <label for="ticket" class="form-label col-sm-4"><h3>Fecha</h3></label>
              <input type="text" name="ticket" class="form-control col-sm-4" disabled>
            </div>
          </div>
          <br>
          <br>
          <div class="col-sm-8">
            <div class="row">
              <label for="descripcion" class="form-label col-sm-12"><h4>Descripción del Problema</h4></label>
              <textarea name="descripcion" rows="4" cols="50" class="form-label col-sm-12"></textarea>
            </div>
          </div>
          <br>
          <div class="col-sm-12">
            <div class="row">
              <button ng-click="" class="btn btn-success col-sm-2">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>  

@section('footer')
    @parent
  <script type="text/javascript">
    var app=angular.module('app',[])
      .controller('ctrl',function($scope,$http){
      $scope.nombre="Liliana García Guevara";
      $scope.tickets=[];
      $scope.ticket={
        id:'1',
        fechayHora:'2019-10-18',
        cliente:'Osmar',
        correo:'1451@hotmail.com',
        estado:'Cerrado'
      };
      $scope.tickets.push($scope.ticket);
      $scope.ticket={
        id:'2',
        fechayHora:'2019-09-09',
        cliente:'Alfonsina',
        correo:'1245@hotmail.com',
        estado:'Abierto'
      };
      $scope.tickets.push($scope.ticket);
      $scope.ticket={
        id:'3',
        fechayHora:'2019-12-12',
        cliente:'Partida',
        correo:'tqrtrt@hotmail.com',
        estado:'Pendiente'
      };
      $scope.tickets.push($scope.ticket);
      $scope.ticket={
        id:'4',
        fechayHora:'2019-03-03',
        cliente:'Corona',
        correo:'Rqwr14r@hotmail.com',
        estado:'Pendiente'
      };
      $scope.tickets.push($scope.ticket);
      /*$scope.elegirTicket=function(index){

      }*/
      });
  </script>

  @endsection
@endsection