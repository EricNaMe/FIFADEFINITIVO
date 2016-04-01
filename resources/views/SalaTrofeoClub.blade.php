@extends('template')

@section('content')
    <link rel="stylesheet" href="/css/MenuPrincipalCSS3.css" type="text/css" media="screen">
    <link rel="stylesheet" href="/css/SalaPerfil.css" type="text/css" media="screen">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
    
  <body style="background-color:darkslategray; background-size: cover;">

<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
       <li><a href="Inicio">HOME</a></li>
     <li><a>ADMINISTRADOR</a>
          <ul>
              <li><a href="/ProCrearLiga">CREAR LIGA</a></li>
              <li><a href="/ProCrearCopa">CREAR COPA</a></li>
              <li><a href="/ModificarLigaPro">MODIFICAR LIGA</a></li>
              <li><a href="/ModificarCopaPro">MODIFICAR COPA</a></li>
          </ul>
      </li>
        <li><a>LIGAS VIGENTES</a>
       <ul>
           @foreach($ligas as $liga)
        <li><a href="EncontrarLiga/{{$liga->id}}">{{$liga->name}}</a></li>

           @endforeach
        </ul>
        </li>
      <li><a>COPAS VIGENTES</a>
          <ul>
              @foreach($copas as $copa1)
                  <li><a href="EncontrarCopa/{{$copa1->id}}">{{$copa1->name}}</a></li>

              @endforeach
          </ul>
      </li>
        <li><a>CLUBES</a>
    <ul>
        <li><a href="/clubes-pro/crear">CREAR CLUB</a></li>
         <li><a href="/clubes-pro/buscar">BUSCAR CLUB</a></li>
        </ul>
        </li>
         <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a> 
    </ul>


</div>




<!-- inicio menu club -->



<div id="menuCentral" style="background:url(/images/middlMenu.jpeg); background-size: cover;">

   <div>
        <ul id="MenuPerfil" style="width: 160px;">            
            <li id="ListaPerfil"><a href="#">Sala de trofeos</a></li>
        </ul>

    </div>
    <div style="background-color: white; width: 500px; height: 100px; position: relative; left: 300px;">

        <div style="background:url(/Imagenes/ALKA_SUPERLIGA_DINAMARCA/AALBORG_BK-LOGO.png); background-size:80px ; background-repeat: no-repeat; display: inline-block; position:relative; left:10px;top:10px;width:90px; height: 80px;"></div>
        <span style="display: inline-block;position: relative;top:-40px;left:20px;font-size: 20px;font-family: sans-serif;"><a>Aldebaran FC</a></span>
        <span style="color:gray;display:inline-block;  width: 400px; position: relative;top:-40px;left:110px;font-size: 20px;font-family: sans-serif;"><a>"{{Auth::User()->quote}}"</a></span>
        
    </div>
    
    
    <div style="background-color: black; border: 3px solid white;  width: 200px; height: 200px; margin-left: 40px; margin-top: 80px;"><img src="/Imagenes/ALKA_SUPERLIGA_DINAMARCA/AALBORG_BK-LOGO.png" style="margin-left: 12px; margin-top: 10px; width: 180px;"></div>    
                  

    <!---Aqui comienza lso trofeos-->
    <div style="background: url(/images/banner1.jpg); height: 160px; background-repeat: no-repeat; background-size: contain; inline-block; position:relative; left:260px; top:-200px;">
        <div id="logoE" style="background: url(/Imagenes/ALKA_SUPERLIGA_DINAMARCA/AALBORG_BK-LOGO.png); height: 160px; background-repeat: no-repeat; background-size: contain; inline-block; position:relative; width: 70px; top: 80px; left: 250px;"></div> 
        <div id="tipoCam"style=" color: #511414;  -webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 29pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-150px; left: 250px;">Campeón Copa CP <div style="margin-top: -45px; margin-right: -650px;"><img src="/images/starCP.png" width="50" height="50"></div></div> 
        <div id="nomEqui"style=" color: #511414; -webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 26pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-150px; left: 350px;">Aldebaran FC</div> 
        <div id="Temporada" style=" color: #511414;-webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 22pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-195px; left: 535px;">Temporada 2</div>                       
    </div>  
    </br></br></br></br></br>    
  
   
</div>


</div>


</body>

<script>

    $(document).ready(function () {
        $('#ListaMenuLateral > li > a').click(function () {
            if ($(this).attr('class') != 'active') {
                $('#ListaMenuLateral li ul').slideUp();
                $(this).next().slideToggle();
                $('#ListaMenuLateral li a').removeClass('active');
                $(this).addClass('active');
            }
        });
    });
</script>
</html>


