
@extends('footer')
@extends('header')

@section('header')
	@parent
	
	<div ng-controller="ctrl">
	</div>
@section('footer')
		@parent
		<script>
	    var app = angular.module('app',[]);
    	app.controller('ctrl',function($scope,$http)
   	     {
   	     	$scope.datos={!! json_encode($datos->toArray()) !!};
       
          
   	     if($scope.datos.length>0){
   	     		//existe
            if($scope.datos[0].tipo == 1){
              //ADMINISTRADOR
              window.location.href = `{{URL::to("/menuadmin")}}`+`/`+$scope.datos[0].idusuarios;
         
            }
            else if($scope.datos[0].tipo == 2){
              //TRABAJADOR
              window.location.href = `{{URL::to("/menusoporte")}}`+`/`+$scope.datos[0].idusuarios;
            }
            else if($scope.datos[0].tipo == 3){
                //CLIENTE
                window.location.href = `{{URL::to("/menuUser")}}`+`/`+$scope.datos[0].idusuarios;
            }
   	     	}

          // No existe
   	     	else{
   	     		window.location.href = `{{URL::to("/login")}}`;
   	     	}
          
        });		     			
		</script>
		
	@endsection
@endsection