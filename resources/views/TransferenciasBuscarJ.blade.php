<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/Transferencias.css" type="text/css" media="screen">
        <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>



    <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
            <li><a>CLUBES PRO</a>

            <li><a href="Inicio">HOME</a>
                <!--  <ul>
                  <li><a>PRIMERA DIVISIÓN</a></li>
                  <li><a>SEGUNDA DIVISIÓN A</a></li>
                  <li><a>SEGUNDA DIVISIÓN B</a></li>
                  <li><a>TERCERA DIVISIÓN A</a></li>
                  <li><a>TERCERA DIVISIÓN B</a></li>

                  </ul>-->
            </li>


            <li><a href="CLUBESPRO">CLUBES</a>

            </li>





            <li><a href="Transferencias">TRANSFERENCIAS</a>

            </li>

            <li><a href="RankingCP">RANKING POR CLUBES</a>

            <li><a href="SalaTrofeosCP">SALA DE TROFEOS</a></li>
            <li><a href="Equipo_CP">EQUIPO DE LA SEMANA</a></li>

            </li>



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

    <div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover; margin-left: -80px;" >
            
             <div>
                        <ul id="MenuPerfil">
                            <li id="ListaPerfil"><a class="active" href="Transferencias">DATOS</a></li>
                            <li id="ListaPerfil"><a href="TransferenciasBuscarE">EQUIPOS</a></li>
                             <li id="ListaPerfil"><a href="#">JUGADOR</a></li>   
                        </ul>

                    </div>

            <div class="myBox"style=" background-size: cover; position: absolute; width: 900px; height: 700px; margin-left: 200px; top: 100px;-webkit-border-radius: 20px 20px;-webkit-border-radius: 20px 20px;">            
                <form id="formJugador" class="container subcontainer light-grey">
                    <h2>Buscar Jugador</h2>
                    <p>      
                    <label>Ingresa GT de Jugador</label>
                    <input class="input1 border1" type="text"></p>
                    <p>  
                        <button class="boton grey" type="button">Genera Resultados</button>
                </form>
                </br>
                </br>
                </br>
                </br>

                <!--Tabla de datos de la base de datos-->
                
                
                    <div id="contenedor" style="position:relative;top:0px">
                         <div id="contenidos1">                            
                            
                            <div id="columna21" >GAMER TAG</div>
                            <div id="columna21" >CLUB DE ORIGEN</div>                                                      
                            <div id="columna21" style="width: 150px;">ACCION</div>
                        </div>
                        <div id="contenidos">                            
                           <div id="columna1" > <div style="width: 50px; height: 50px; position: absolute; margin-top: -10px;"><img src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png" style="width: 50px;"/></div> <div class="title" style="color: navy;  line-height: normal; width: 200px; margin-left: 50px; ">Rotciv26</div> </div>                                                      
                           <div id="columna1" > <div style="width: 50px; height: 50px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/TORONTO_FC-LOGO.png" style="width: 50px;"/></div> <div class="title" style=" line-height: normal; width: 210px; margin-left: 50px; ">ALDEBARAN FC</div> </div>                                                        
                            <div id="columna2" style="width: 150px;"><button type="button" class="boton2 grey">Solicitar Ingreso</button></div>
                        </div>
                        <div id="contenidos">
                          <div id="columna1" > <div style="width: 50px; height: 50px; position: absolute; margin-top: -10px;"><img src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png" style="width: 50px;"/></div> <div class="title" style=" color: navy; line-height: normal; width: 200px; margin-left: 50px; ">ealtamirano91</div> </div>                            
                           <div id="columna1" > <div style="width: 50px; height: 50px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/VANCOUVER_WHITECAPS_FC-LOGO.png" style="width: 50px;"/></div> <div class="title" style="  line-height: normal; width: 210px; margin-left: 50px; ">LEÑAS FC</div> </div>                                                        
                            <div id="columna2" style="width: 150px;"><button type="button" class="boton2 grey">Solicitar Ingreso</button></div>
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


