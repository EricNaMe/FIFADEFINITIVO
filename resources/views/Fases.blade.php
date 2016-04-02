<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/PVSP.css" type="text/css" media="screen">
        <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body >




        <script>
  function valReportar(id, btn)
  {
      
      if(document.getElementById(id).textContent=="")
      {
          // se reporta partido con el siguiente formato
          // EquipoA&nbsp;&nbsp;-&nbsp;&nbsp;EquipoB
          document.location.href="Rfases"; 
          
      }
      else{
          //Aqui se debe validar si toda la información esta completa si no si debe de permitir llenar lo que falta
          alert('El partido Ya Se Reporto con Exito');
          document.getElementById(btn).disabled= true;
      }
      
  }    

        </script>


        @extends('template')

        @section('content')
        
        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
                           <li><a href="Inicio">HOME</a></li>
              @if (Auth::check())
                  <?php $user=Auth::user();
                  ?>

                  @if($user->user_name==="Administrador22")
                      <li><a>ADMINISTRADOR</a>
                          <ul>
                              <li><a href="CrearLiga">CREAR LIGA</a></li>
                              <li><a href="#">CREAR COPA</a></li>
                              <li><a href="Divisiones">ASIGNAR EQUIPOS</a></li>
                              <li><a href="EliminarEquiposPvsP">ELIMINAR EQUIPOS</a></li>
                              <li><a href="ModificarLiga">MODIFICAR LIGA</a></li>
                              <li><a href="ModificarCopa">MODIFICAR COPA</a></li>


                          </ul>
                      </li>

                  @endif
              @endif

              <li><a>DIVISIONES LIGA</a>
                <ul>
                <li><a href="#">PRIMERA DIVISIÓN</a></li>
                    @foreach($ligas as $liga)
                        <li><a href="EncontrarLigaPlay/{{$liga->id}}">{{$liga->name}}</a></li>

                    @endforeach

                </ul>
                </li>


                <li><a>COPA</a>
                <ul>
                <li><a href="Fase1PvsP">ELIMINATORIAS</a></li>
                    @foreach($copas as $copa)
                <li><a href="EncontrarCopaPlay/{{$copa->id}}">{{$copa->name}}</a></li>

                    @endforeach
                <li><a href="#">PRELIMINARES 1</a></li>
                </ul>
                </li>
              <li><a href="SalaTrofeo1vs1">SALA DE TROFEOS 1VS1</a></li>
              <li><a href="Ranking1VS1">RANKING</a></li>

   
            </ul>
            
            
        </div>
        
        <div id="menuCentral" style="background:url(/images/balon.png); background: no-repeat;" >
                 
           
            <div>
               <IMG src="images/balon.png" ALIGN=right WIDTH=250 style="margin-right:220px; margin-top: 140px">
               <h1 class="title" align="left">PRELIMINARES</h1>
               </br>
                <div style="background-color: crimson; height:5px; position: relative;" class="banner"></div>
                <div style="background-color: transparent; height:50px; position: relative;"></div>
                
            </div>
            
            <div id="contenedor" style="margin-left: 35px;">
                         <div id="contenidos1">                            
                            
                            <div id="columna11" style="width: 200px; font-size: 15px;">EQUIPO</div>
                            <div id="columna11" style="font-size: 15px;" >VS</div>                                                    
                            <div id="columna11" style="width: 160px; font-size: 15px;" >EQUIPO</div>   
                            <div id="columna11" style="width: 10px; font-size: 15px;" >RESULTADO</div> 
                            <div id="columna11" style="font-size: 15px;" >ACCION</div>                                                    
                            
                        </div>
            
                    <!--Inserción de BD--->

                     <div id="contenidos">                            
                            <div id="columna1" > <div id="equipoA"style="width: 40px;  height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/NEW_ENGLAND_REVOLUTION-LOGO.png" style="width: 40px;"/></div> <div class="titleA" style="font-size: 20px; line-height: normal; width: 170px; margin-left: 50px; ">ALDEBARAN FC</div> </div>                                                        
                            <div id="columna1" >-</div> 
                            <div id="columna1" > <div id="equipoB" style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/LA_GALAXY-LOGO.png" style="width: 40px;"/></div> <div class="titleA" style=" font-size: 20px;line-height: normal; width: 170px; margin-left: 50px; ">INFERNALES FC</div> </div>                               
                            <div id="columna1" > <div id="resultado" class="marcador"></div></div>                            
                            <div id="columna1" ><button id="boton" type="button" onclick="valReportar('resultado', 'boton')" >Reportar</button></div>                                                    
                     </div>
                    
                         

                     <div id="contenidos">                            
                            <div id="columna1" > <div id="equipoA2"style="width: 40px;  height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/SAN_JOSE_EARTHQUAKES-LOGO.png" style="width: 40px;"/></div> <div class="titleA" style="font-size: 20px; line-height: normal; width: 170px; margin-left: 50px; ">LEÑAS</div> </div>                                                        
                            <div id="columna1" >-</div> 
                            <div id="columna1" > <div id="equipoB2" style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/SEATTLE_SOUNDERS_FC-LOGO.png" style="width: 40px;"/></div> <div class="titleA" style=" font-size: 20px;line-height: normal; width: 170px; margin-left: 50px; ">CULEBRAS</div> </div>                               
                            <div id="columna1" > <div id="resultado2"s class="marcador">2&nbsp;-&nbsp;5</div></div>                            
                            <div id="columna1" ><button id="boton2" type="button" onclick="valReportar('resultado2', 'boton2')" >Reportar</button></div>                                                    
                     </div>
                      <div id="contenidos">                            
                            <div id="columna1" > <div id="equipoA3"style="width: 40px;  height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/COLUMBUS_CREW-LOGO.png" style="width: 40px;"/></div> <div class="titleA" style="font-size: 20px; line-height: normal; width: 170px; margin-left: 50px; ">MALOs</div> </div>                                                        
                            <div id="columna1" >-</div> 
                            <div id="columna1" > <div id="equipoB3" style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/COLUMBUS_CREW-LOGO.png" style="width: 40px;"/></div> <div class="titleA" style=" font-size: 20px;line-height: normal; width: 170px; margin-left: 50px; ">CANALLAS</div> </div>                               
                            <div id="columna1" > <div id="resultado3"s class="marcador">2&nbsp;-&nbsp;4</div></div>                            
                            <div id="columna1" ><button id="boton3" type="button" onclick="valReportar('resultado3', 'boton3')" >Reportar</button></div>                                                    
                     </div>
                      <div id="contenidos">                            
                            <div id="columna1" > <div id="equipoA4"style="width: 40px;  height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/HOUSTON_DYNAMO-LOGO.png" style="width: 40px;"/></div> <div class="titleA" style="font-size: 20px; line-height: normal; width: 170px; margin-left: 50px; ">PANADEROS</div> </div>                                                        
                            <div id="columna1" >-</div> 
                            <div id="columna1" > <div id="equipoB4" style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/LA_GALAXY-LOGO.png" style="width: 40px;"/></div> <div class="titleA" style=" font-size: 20px;line-height: normal; width: 170px; margin-left: 50px; ">CREMOSOS</div> </div>                               
                            <div id="columna1" > <div id="resultado4"s class="marcador"></div></div>                            
                            <div id="columna1" ><button id="boton4" type="button"  onclick="valReportar('resultado4','boton4')">Reportar</button></div>                                                    
                     </div>        
                
          
            </div>
            
        </div>
        
        
    </body>
    
    <script>
    
    $(document).ready(function () {
  $('#ListaMenuLateral > li > a').click(function(){
    if ($(this).attr('class') != 'active'){
      $('#ListaMenuLateral li ul').slideUp();
      $(this).next().slideToggle();
      $('#ListaMenuLateral li a').removeClass('active');
      $(this).addClass('active');
    }
  });
});
    </script>
</html>

@endsection
