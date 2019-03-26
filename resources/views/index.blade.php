@extends('footerCliente')
@extends('header')

@section('header')
   @parent





</header>

    
    <!-- Menu Section -->
        <div id="navbar">
          <img id="Logo" src="fondos/logo.png" >  
          <a class="active" href="#Soporte">Soporte</a>
          <a href="#PreguntasFrecuentes">Preguntas Frecuentes</a>
          <a href="/login">Iniciar Sesión</a>
        </div>
    </header>  


	<!-- First Parallax Section -->
          
	<div class="jumbotron paral paralImgsec">
        <h1 class="display-3">Bienvenido</h1>
		<p id="tituloSevenSoft"> a  SevenSoft</p>
        <p class="lead">Agencia de desarrollo de Software en México</p>
        <p class="lead">ahora puedes dejar tu proyecto</p>
        <strong><p class="lead">en manos de profesionales</p></strong>
   </div>
 
	<!-- Second Parallax Section -->
	<div class="jumbotron paral paralImgsec0">
		<h1 id="paral">SEVENSOFT</h1>
        <img class="herramientas" src="fondos/laptop.png" > 
        <img class="herramientas" src="fondos/inovacion.png" > 
        <img class="herramientas" src="fondos/tierra.png" > 
		<p class="text-left" id="textoImgSec2">
            SevenSoft crea soluciones y tecnologías de software innovadoras que ayudan a sus clientes de todo el mundo proteger y gestionar información con facilidad, eficiencia y valor sin igual. </p>
       
        <p class="text-left" id="textoImgSec2">
             Combina tecnologías innovadoras y una amplia experiencia en los sectores de comercio, servicios financieros, la industria, la educación, las administraciones públicas, etc.
             Hemos desarrollado una gran cartera en permanente crecimiento de productos de vanguardia, respaldados por un servicio incomparable.</p>
         <p class="text-left" id="textoImgSec2">
             El compromiso de innovar y enfocarnos en nuestros clientes, es impulsado por el deseo de permitir que programadores, analistas y trabajadores en general no solo puedan construir mejores aplicaciones informáticas, sino también, un mundo mejor.</p>
    </div>
        
    <!-- Third Parallax Section -->
	<div class="jumbotron paral2 paralImgsec1">
		<h1 id="paral">MISION</h1>
		<p id="textoMision">Conectar a través de nuestro software a personas,  ayudándolas a crear aplicaciones que cubran sus necesidades de una manera creativa e innovadora, siempre pensando en mejorar sus vidas. </p>
		<p class="lead">
		</p>
	</div>
 
	<!-- fourth Parallax Section -->
	<div class="jumbotron paral paralImgsec2">
       <h1 id="tituloSeccion3">Sevensoft ha obtenido reconocimiento</h1>
       <p id="textoSeccion3">como una de las mejores empresas de la región en creaciones de aplicación y sistemas informáticos</p>
       <img id="premio" src="fondos/diploma.png" >  
    </div>
    
    <!-- five Parallax Section -->
    <div class="jumbotron paralSeccion3 paralImgsec3" >
       <h1 id="aportacionSocial">Aportación social y ecológica</h1>
        <img id="silladeRuedas" src="fondos/sillaRuedas.png" >  
       <p id="textoAportacionSocial">Contribuir a la comunidad con proyectos que aporten a un bien común, poniendo especial énfasis en las personas discapacitadas, en problemas reconocidos y apoyando a los que menos pueden.</p>
    </div>
    
    <!-- Seven Parallax Section -->
  
	<div class="jumbotron paralSeccion4 paralImgsec4" >
       <h1 id="tituloSeccion4">Visión</h1>
       <p id="textoSeccion4">Ser una empresa líder en la innovación de proyectos de software, expandiendo nuestros servicios en cada rincón del mundo atreves del reconocimiento internacional, manejando los mejores estándares de calidad y adaptándonos a las necesidades de las personas. Trabajamos para crecer nuestro negocio con la misma honestidad e integridad que usamos para crear nuestros productos, pensando la excelencia total de los mismos.</p>  
    </div>
    
    <!-- Eight Parallax Section -->
    <div class="jumbotron paralSeccion5 paralImgsec5" >  
       <h1 id="tituloSeccion5">Productos</h1>
       <img id="celular" src="fondos/movil.png">
       <p id="textoSeccion5">Actualmente nos encontramos desarrollando la aplicacion "EnSeñas",una aplicación móvil la cual ayudará a personas discapacitadas a aprender un lenguaje signado, de manera fácil, rápida, divertida y sencilla.Todo esto con el fin de su inclusión en la sociedad.</p>  
    </div>

  <h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="../fondos/principal.jpg" alt="Los Angeles" style="width:100%;background: white;">
        <div class="carousel-caption">
          <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p>
        </div>
      </div>

      <div class="item">
        <img src="../fondos/principal5.jpg" alt="Chicago" style="width:100%;background: white;">
        <div class="carousel-caption">
          <h3>Chicago</h3>
          <p>Thank you, Chicago!</p>
        </div>
      </div>
    
      <div class="item">
        <img src="" alt="New York" style="width:100%;background: white;" >
        <div class="carousel-caption">
          <h3>New York</h3>
          <p>We love the Big Apple!</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>







    	@section('footerCliente')
   	  	@parent

   	  
       @endsection




@endsection

