<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/MenuPrincipalCSS3.css" type="text/css" media="screen">
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
       
        
        <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>1 VS 1</a>
              <li><a href="Inicio">HOME</a></li>
              <li><a>ADMINISTRADOR</a>
                  <ul>
                      <li><a href="CrearLiga">CREAR LIGA</a></li>
                      <li><a href="CrearCopa">CREAR COPA</a></li>
                      <li><a href="Divisiones">ASIGNAR EQUIPOS</a></li>
                      <li><a href="EliminarEquiposPvsP">ELIMINAR EQUIPOS</a></li>
                      <li><a href="ModificarLiga">MODIFICAR LIGA</a></li>
                      <li><a href="ModificarCopa">MODIFICAR COPA</a></li>


                  </ul>
              </li>
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
                <li><a href="Fase1PvsP">FASE 1</a></li>
                    @foreach($copas as $copa)
                <li><a href="EncontrarCopaPlay/{{$copa->id}}">{{$copa->name}}</a></li>

                    @endforeach
                
                </ul>
                </li>
              <li><a href="#">SALA DE TROFEOS 1VS1</a></li>
              <li><a href="Ranking1VS1">RANKING</a></li>


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
        
        <div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover;" >

            <div>
                <ul id="MenuPerfil" style="width: 410px;">
                    <li id="ListaPerfil"><a href="#">Tabla general</a></li>
                    <li id="ListaPerfil"><a class="active" href="PvsPCalendario">Calendario</a></li>
                    <li id="ListaPerfil"><a class="active" href="#">Campeón</a></li>


                </ul>

            </div>

            <div id="TablaPrimera" style="position: absolute; top:20%; left:10%;">


                <table>
                    <thead>
                    <tr>
                        <th>Número</th>
                        <th>Equipo</th>
                        <th>Jugador</th>

                    </tr>
                    </thead>
                    <?php
                        $i=1;

                    ?>
                    @foreach($teams as $team)
                    <tr>
                        @if($team->status==="Activo")
                        <td><div id="PosicionTabla">{{$i}}</div></td>
                        <td style="text-align:left;">{{$team->name}}</td>
                        @foreach($team->users as $user)
                        <td>{{$user->user_name}}</td>
                        @endforeach

                       <?php $i++;?>
                       @endif
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

<!--
<div id="TablaPrimera" style="position: absolute; top:20%; left:10%;">


    <table>
        <thead>
        <tr>
            <th>Posición</th>
            <th>Equipo</th>
            <th>Jugador</th>
            <th>Pts</th>
            <th>JJ</th>
            <th>JG</th>
            <th>JE</th>
            <th>JP</th>
            <th>GF</th>
            <th>GC</th>
            <th>DG</th>
        </tr>
        </thead>

        <tr>
            <td><div id="PosicionTabla">1</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/9.png); background-size:cover;"></div>Pumas</td>
            <td>Mex Sturmtiger</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>


        </tr>


        <tr>

            <td><div id="PosicionTabla">2</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/10.png); background-size:cover;"></div>Tigres</td>
            <td>Sturm</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>




        </tr>

        <tr>
            <td><div id="PosicionTabla">3</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/1.png); background-size:cover;"></div>América</td>
            <td>CocheXbox</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>

        </tr>

        <tr>
            <td><div id="PosicionTabla">4</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/3.png); background-size:cover;"></div>Toluca</td>
            <td>PedritoXbx</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>


        </tr>

        <tr>
            <td><div id="PosicionTabla">5</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/4.png); background-size:cover;"></div>Querétaro</td>
            <td>Fulano39</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>


        </tr>

        <tr>
            <td><div id="PosicionTabla">6</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/5.png); background-size:cover;"></div>Santos</td>
            <td>Castor98</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>


        </tr>

        <tr>
            <td><div id="PosicionTabla">7</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/13.png); background-size:cover;"></div>Guadalajara</td>
            <td>Ardilla989</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>


        </tr>


        <tr>
            <td><div id="PosicionTabla">8</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/2.png); background-size:cover;"></div>Cruz Azul</td>
            <td>Halcon88</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>



        </tr>

        <tr>
            <td><div id="PosicionTabla">9</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/11.png); background-size:cover;"></div>Chiapas</td>
            <td>Marmota87</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>


        </tr>

        <tr>
            <td><div id="PosicionTabla">10</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/16.png); background-size:cover;"></div>Monterrey</td>
            <td>Gato77</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>


        </tr>

        <tr>
            <td><div id="PosicionTabla">11</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/17.png); background-size:cover;"></div>Veracruz</td>
            <td>Reynoso55</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>



        </tr>

        <tr>
            <td><div id="PosicionTabla">12</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/7.png); background-size:cover;"></div>Pachuca</td>
            <td>Serb88</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>


        </tr>

        <tr>
            <td><div id="PosicionTabla">13</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/8.png); background-size:cover;"></div>Puebla</td>
            <td>Marini77</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>



        </tr>

        <tr>
            <td><div id="PosicionTabla">14</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/12.png); background-size:cover;"></div>Atlas</td>
            <td>Costas66</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>


        </tr>

        <tr>
            <td><div id="PosicionTabla">15</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/6.png); background-size:cover;"></div>Dorados</td>
            <td>Mari77</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>



        </tr>

        <tr>
            <td><div id="PosicionTabla">16</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/14.png); background-size:cover;"></div>Tijuana</td>
            <td>Marini77</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>



        </tr>

        <tr>
            <td><div id="PosicionTabla">17</div></td>
            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/15.png); background-size:cover;"></div>León</td>
            <td>Pizzi77</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>



        </tr>

        <tr>
            <td><div id="PosicionTabla">18</div></td>

            <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/13.png); background-size:cover;"></div>Morelia</td>
            <td>Meza77</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>



        </tr>



    </table>
</div> -->
