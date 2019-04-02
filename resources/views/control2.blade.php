
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
              alert($scope.datos[0].idusuarios);
              window.location.href = `{{URL::to("/recuperar")}}`+`/`+$scope.datos[0].idusuarios;
            }

          // No existe
   	     	else{
   	     		window.location.href = `{{URL::to("/recuperarContrasena")}}`;
   	     	}
          
        });		     			
		</script>
		
	@endsection
@endsection