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
       
        
        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>1 VS 1</a>
               
                <li><a>DIVISIONES LIGA</a>
                <ul>
                <li><a>PRIMERA DIVISIÓN</a></li>
                <li><a>SEGUNDA DIVISIÓN A</a></li>
                <li><a>SEGUNDA DIVISIÓN B</a></li>
                <li><a>TERCERA DIVISIÓN A</a></li>
                <li><a>TERCERA DIVISIÓN B</a></li>
              
                </ul>
                </li>
                
                
                <li><a>COPA</a>
                <ul>
                <li><a href="Fase1PvsP">FASE 1</a></li>
                <li><a href="Fases">FASE 2</a></li>
                <li><a>FASE 3</a></li>
                
                </ul>
                </li>
                <li><a href="#.php">SALA DE TROFEOS 1VS1</a></li>
                <li><a href="Ranking1VS1">RANKING</a></li>
                
                <li><a>ADMINISTRADOR</a>
                <ul>
                <li><a>CREAR TORNEO</a></li>
                <li><a>CREAR COPA</a></li>
                
                
                
                </ul>

                </li>
              <li><a href="/Inicio">HOME</a></li>
                
            </ul>
            
            
        </div>





        <div id="menuSuperior" style="background:url(/images/topMenu.jpeg); background-size: cover; ">

            <ul id="ListaMenuSuperior" style="margin-left: 400px;">
                <li><a href="CLUBESPRO">CLUBES PRO</a></li>
                <li><a href="PVSP">1 VS 1</a></li>
                <li><a href="Reglamento">REGLAMENTO</a></li>
                <li><a href="Clips">CLIPS</a></li>
                <li><a href="Noticias">NOTICIAS</a></li>
                @if (Auth::check())
                    <li id="LoginMenu"><a href="#" ><div id="LogoEquipo" style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatarpic-l.png); background-size:cover;"></div>{{Auth::User()->user_name}}</a>
                        <ul id="SubMenu">

                            <li style="font-size: 12px; "><a href="Perfil" >Ver Perfil</a></li>
                            <li style="font-size: 12px; "><a href="EditarPerfil" >Editar Perfil</a></li>
                            <li style="font-size: 12px; "><a href="/auth/logout" >Cerrar sesión</a></li>


                        </ul>
                    </li>
                @else
                    <li id="LoginMenu"><a href="/auth/login" >LOGIN</a>


                        <ul id="SubMenu">
                            <li style="font-size: 12px; "><a href="/auth/login" >Iniciar Sesión</a></li>
                            <li style="font-size: 12px; margin-left: 5px; "><a href="/auth/register" >Registrarse</a></li>

                        </ul>
                    </li>
                @endif

            </ul>


        </div>

        <div id="menuCentral" style="background:url(/images/balon.png); background: no-repeat;" >
                 
           
            <div>
               <IMG src="images/balon.png" ALIGN=right WIDTH=250 style="margin-right:220px; margin-top: 140px">
               <h1 class="title" align="left">PRELIMINARES</h1>
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


