@extends('footerCliente')
@extends('header')

@section('header')
   @parent





</header>
   <!-- Menu Section -->
   <div class="menu barraNormal"><center>MENÚ SUPERIOR</center> 
        <div id="navbar">
          <img id="Logo" src="fondos/logo.png" >  
          <a href="/login">Iniciar Sesión</a>
        </div>
    </header>  
  </div>


	<!-- First Parallax Section --> <!-- Swiper -->
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <div class="jumbotron paral paralImgsec swiper-slide">  
        <h1 class="display-3"> Bienvenido </h1>
        <p id="tituloSevenSoft"> a  SevenSoft</p>
        <p class="lead">Agencia de desarrollo de Software en México</p>
        <p class="lead">ahora puedes dejar tu proyecto</p>
        <strong><p class="lead">en manos de profesionales</p></strong></div>
      <div class="jumbotron paralImg2 ImgSoporte swiper-slide">
        <h1 class="display-3">Identificamos </h1>
        <p class="lead"> tus necesidades y requerimientos  </p>
        <p id="tituloSevenSoft">Creamos</p>
        <p class="lead">Ideas y Soluciones</p>
      </div>
      <div class="jumbotron paralImg2 ImgComputadora swiper-slide">
        <h1 class="display-3">Ser </h1>
        <p class="lead"> Eficientes es ser  </p>
        <p id="tituloSevenSoft">Diferente</p>
        <p class="lead">SEVENSOFT</p>
      </div>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
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
        <h5 id="textoSeccion3Plus">Tenemos productos que se adecuan a tus necesidades...</h5>
        <img src="fondos/web.png" id="premio">
       <h5 id="tituloSeccion3">SOFTWARE</h5>
       <p id="textoSeccion3">Software de escritorio o aplicaciones web, según tus requerimientos, usamos las últimas tecnologías.</p>
        <img src="fondos/cms.png" id="premio">
       <h5 id="tituloSeccion3">DISEÑO WEB</h5>
       <p id="textoSeccion3">Portales web y comercio electrónico, todo con calidad y compromiso.</p>
       
    </div>
    
    <!-- five Parallax Section -->
    <div class="jumbotron paralSeccion3 paralImgsec3" >
      </div>
        <figure class="snip0015">
          <div id="id"></div>
          <figcaption>
            <h2>Aportación social y ecológica</h2>
            <p>Contribuir a la comunidad con proyectos que aporten a un bien común, poniendo especial énfasis en las personas discapacitadas, en problemas reconocidos y apoyando a los que menos pueden.</p>
            <a href="#"></a>
          </figcaption>     
        </figure>
    </div>
    
    <!-- Seven Parallax Section -->


    


    <div class="jumbotron paralSeccion4 paralImgsec4" >
     <figure class="snip1361">
     <img src="fondos/technology.jpg" alt="sample45" />
      <figcaption>
        <h3>Visión</h3>
         <p>Ser una empresa líder en la innovación de proyectos de software, expandiendo nuestros servicios en cada rincón del mundo atreves del reconocimiento internacional, manejando los mejores estándares de calidad y adaptándonos a las necesidades de las personas. Trabajamos para crecer nuestro negocio con la misma honestidad e integridad que usamos para crear nuestros productos, pensando la excelencia total de los mismos.</p>
      </figcaption>

    </figure> 
    </div>
    

    
    <!-- Eight Parallax Section -->
    <div class="jumbotron paralSeccion5 paralImgsec5" >  
       <h1 id="tituloSeccion5">Productos</h1>
       <img id="celular" src="fondos/telefono.png">
       <p id="textoSeccion5">Actualmente nos hemos desarrollando la aplicacion "EnSeñas",una aplicación móvil la cual ayudará a personas en general a aprender un lenguaje signado, de manera fácil, rápida, divertida y sencilla.Todo esto con el fin de mejorar las comunicación con personsas discapacitas.</p>  
    </div>


</div>



<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  <!-- Swiper JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>


  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper('.swiper-container', {
      spaceBetween: 30,
      centeredSlides: true,
      autoplay: {
        delay: 3500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>

  <script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
    var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbar").style.top = "0";
      } else {
        document.getElementById("navbar").style.top = "-50px";
      }
      prevScrollpos = currentScrollPos;
    }
</script>


<script type="text/javascript">
  $(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);

</script>





    	@section('footerCliente')
   	  	@parent

   	  
       @endsection




@endsection

