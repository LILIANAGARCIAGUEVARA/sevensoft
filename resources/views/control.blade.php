
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
  
          $scope.vaso = $scope.datos[0].tipo ;
   	     if($scope.datos.length>0){
   	     		//existe
            if($scope.vaso == 1){
              //ADMINISTRADOR
              window.location.href = `{{URL::to("/menuadmin")}}`;
            }
            else if($scope.vaso == 2){
              //TRABAJADOR
              window.location.href = `{{URL::to("/menuSoporte")}}`;
            }
            else if($scope.vaso == 3){
                //CLIENTE
                window.location.href = `{{URL::to("/menuUser")}}`;
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