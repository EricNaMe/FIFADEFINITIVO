<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/MenuPrincipalCSS3.css" type="text/css" media="screen">
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
       
        
        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>CLUBES PRO</a>
              <li><a href="Inicio">HOME</a></li>
              <li><a>ADMINISTRADOR</a>
                  <ul>
                      <li><a href="/ProCrearLiga">Hola funciona cosa CREAR LIGA</a></li>
                      <li><a href="/ProCrearCopa">CREAR COPA</a></li>
                      <li><a href="/ModificarLigaPro">MODIFICAR LIGA</a></li>
                      <li><a href="/AgregarClubProCopa">MODIFICAR COPA</a></li>
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
                      @foreach($copas as $copa)
                          <li><a href="EncontrarCopa/{{$copa->id}}">{{$copa->name}}</a></li>

                      @endforeach
                  </ul>
              </li>
                
                
                <li><a>CLUBES</a>
            <ul>

                <li><a href="/CrearClub">CREAR CLUB</a></li>
            
              
                </ul>
                </li>
                

                
                 <li><a href="Transferencias">TRANSFERENCIAS</a>
             
                </li>
              
                
                 <li><a href="RankingCP">RANKING POR CLUBES</a>


             
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

                            <li style="font-size: 12px; "><a href="/Perfil" >Ver Perfil</a></li>
                            <li style="font-size: 12px; "><a href="/EditarPerfil" >Editar Perfil</a></li>
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

        
        <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >


            <div>
                <ul id="MenuPerfil" style="position:relative; left:170px;width: 230px;">
                    <li id="ListaPerfil"><a href="#">EQUIPOS SUSCRITOS</a></li>


                </ul>

            </div>
                 
                  <div id="TablaPrimeraClubesPro" style="position: absolute; top:20%; left:22%;">
            <table>
                <thead>
                <tr>
                    <th>Número</th>
                    <th>Equipo</th>
                    <th>DT</th>


                </tr>
                </thead>
                <?php $i=1; ?>


            @foreach($clubes as $club)
               
                

                <tr>
                    <td><div id="PosicionTabla">   {{$i}}</div></td>
                    <td style=""><div id="LogoEquipo" style=" background:url(images/Clausura/{{$club->id}}.png); background-size:cover;"></div><a href="/ClubDetalles/{{$club->id}}">{{$club->name}}</a></td>
                    @foreach($club->users as $user)
                        @if($user->pivot->position==="DT")
                    <td><a href="/PerfilDetalles/{{$user->id}}">{{$user->user_name}}</a></td>
                        @endif
                    @endforeach
               



                    <?php $i++; ?>
                </tr>

                @endforeach
            </table>
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


