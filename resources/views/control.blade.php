

 
@extends('footer')
@extends('header')

@section('header')
	@parent

	<div ng-controller="ctrl">
 <script type="text/javascript">
        window.id = "<?php print_r(encrypt($datos[0]->idusuarios));?>";
        
       
      </script>

	</div>


@section('footer')
		@parent
		<script>
	    var app = angular.module('app',[]);
    	app.controller('ctrl',function($scope,$http)
   	     {
   	     	$scope.datos={!! json_encode($datos->toArray()) !!};
          $scope.id=window.id;
       

   	     if($scope.datos.length>0){
   	     		//existe
            if($scope.datos[0].tipo == 1){
              //ADMINISTRADOR
              window.location.href = `{{URL::to("/menuadmin")}}`+`/`+$scope.id;
              
         
            }
            else if($scope.datos[0].tipo == 2){
              //TRABAJADOR
              window.location.href = `{{URL::to("/menusoporte")}}`+`/`+$scope.id;
            }
            else if($scope.datos[0].tipo == 3){
                //CLIENTE
                window.location.href = `{{URL::to("/menuUser")}}`+`/`+$scope.id;


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