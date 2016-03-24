@extends('template')

@section('content')

    <link rel="stylesheet" href="/css/Transferencias.css" type="text/css" media="screen">



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
                            <li id="ListaPerfil"><a class="active" href="#">DATOS</a></li>
                            <li id="ListaPerfil"><a href="TransferenciasBuscarE">EQUIPOS</a></li>
                            <li id="ListaPerfil"><a href="TransferenciasBuscarJ">JUGADOR</a></li>
                        </ul>

                    </div>

            <div class="myBox"style=" background-size: cover; position: absolute; width: 900px; height: 700px; margin-left: 200px; top: 100px;-webkit-border-radius: 20px 20px;-webkit-border-radius: 20px 20px;">            
                
                <div style="background-image: url(Imagenes/Trans.png);margin-top: 20px; margin-left: 125px;width: 650px; height: 70px;background-size: contain; background-repeat: no-repeat; background-position: center;"></div>         
                </BR>
                </BR>
                
                
                
                <!--Tabla de datos de la base de datos-->
                               
                <div id="contenedor">
                         <div id="contenidos1">                            
                            
                            <div id="columna11" style="width: 200px; font-size: 15px;">GAMERTAG</div>
                            <div id="columna11" style="width: 200px; font-size: 15px;" >ACCION</div>                                                    
                            <div id="columna11" style="width: 160px; font-size: 15px;" >CLUB ANTERIOR</div>   
                            <div id="columna11" style="width: 10px; font-size: 15px;" >-</div> 
                            <div id="columna11" style="width: 16s0px; font-size: 15px;">NUEVO CLUB</div>
                        </div>
                        <!--Aqui se repiten los contenidos para llenarlos desde la bd-->
                        <div id="contenidos">                            
                            <div id="columna1" > <div style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png" style="width: 40px;"/></div> <div class="title" style="color: navy;  line-height: normal; width: 160px; margin-left: 50px;font-size: 20px; ">Rotciv26</div> </div>                            
                            <div id="columna1" class="title" style="color: black; font-size: 18px; font-style: normal; font-family: Arial;">Se ha Transferido de</div>
                            <div id="columna1" > <div style="width: 40px;  height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/NEW_ENGLAND_REVOLUTION-LOGO.png" style="width: 40px;"/></div> <div class="title" style="font-size: 20px; line-height: normal; width: 170px; margin-left: 50px; ">ALDEBARAN FC</div> </div>                                                        
                            <div id="columna1" class="title" style="color: black; font-size: 18px; font-style: normal; font-family: Arial;">a</div>
                            <div id="columna1" > <div style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/LA_GALAXY-LOGO.png" style="width: 40px;"/></div> <div class="title" style=" font-size: 20px;line-height: normal; width: 170px; margin-left: 50px; ">INFERNALES FC</div> </div>                                                        
                            
                        </div>
                        
                        <div id="contenidos">                            
                            <div id="columna1" > <div style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="https://avatar-ssl.xboxlive.com/avatar/Cochexbox123/avatarpic-l.png" style="width: 40px;"/></div> <div class="title" style="color: navy;  line-height: normal; width: 160px; margin-left: 50px;font-size: 20px; ">Cochexbox123</div> </div>                            
                            <div id="columna1" class="title" style="color: black; font-size: 18px; font-style: normal; font-family: Arial;">Se ha Transferido de</div>
                            <div id="columna1" > <div style="width: 40px;  height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/SAN_JOSE_EARTHQUAKES-LOGO.png" style="width: 40px;"/></div> <div class="title" style="font-size: 20px; line-height: normal; width: 170px; margin-left: 50px; ">MALOS FC</div> </div>                                                        
                            <div id="columna1" class="title" style="color: black; font-size: 18px; font-style: normal; font-family: Arial;">a</div>
                            <div id="columna1" > <div style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/SPORTING_KANSAS_CITY-LOGO.png" style="width: 40px;"/></div> <div class="title" style=" font-size: 20px;line-height: normal; width: 170px; margin-left: 50px; ">UFCREAL FC</div> </div>                                                        
                            
                        </div>
                                              
                        <div id="contenidos">                            
                            <div id="columna1" > <div style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png" style="width: 40px;"/></div> <div class="title" style="color: navy;  line-height: normal; width: 160px; margin-left: 50px;font-size: 20px; ">Werux</div> </div>                            
                            <div id="columna1" class="title" style="color: black; font-size: 18px; font-style: normal; font-family: Arial;">Se ha Transferido de</div>
                            <div id="columna1" > <div style="width: 40px;  height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/REAL_SALT_LAKE-LOGO.png" style="width: 40px;"/></div> <div class="title" style="font-size: 20px; line-height: normal; width: 170px; margin-left: 50px; ">MALOS FC</div> </div>                                                        
                            <div id="columna1" class="title" style="color: black; font-size: 18px; font-style: normal; font-family: Arial;">a</div>
                            <div id="columna1" > <div style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/HOUSTON_DYNAMO-LOGO.png" style="width: 40px;"/></div> <div class="title" style=" font-size: 20px;line-height: normal; width: 170px; margin-left: 50px; ">UFCREAL FC</div> </div>                                                        
                            
                        </div>
                
                        
                        <div id="contenidos">                            
                            <div id="columna1" > <div style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="https://avatar-ssl.xboxlive.com/avatar/ferace/avatarpic-l.png" style="width: 40px;"/></div> <div class="title" style="color: navy;  line-height: normal; width: 160px; margin-left: 50px;font-size: 20px; ">FERACE</div> </div>                            
                            <div id="columna1" class="title" style="color: black; font-size: 18px; font-style: normal; font-family: Arial;">Se ha Transferido de</div>
                            <div id="columna1" > <div style="width: 40px;  height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/DC_UNITED-LOGO.png" style="width: 40px;"/></div> <div class="title" style="font-size: 20px; line-height: normal; width: 170px; margin-left: 50px; ">MALOS FC</div> </div>                                                        
                            <div id="columna1" class="title" style="color: black; font-size: 18px; font-style: normal; font-family: Arial;">a</div>
                            <div id="columna1" > <div style="width: 40px; height: 40px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/NEW_YORK_CITY_FC-LOGO.png" style="width: 40px;"/></div> <div class="title" style=" font-size: 20px;line-height: normal; width: 170px; margin-left: 50px; ">UFCREAL FC</div> </div>                                                        
                            
                        </div>
                 
                      
                    </div>
                
            </div> 

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
@endsection