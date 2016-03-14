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
        <li><a>CLUBES PRO</a>

        <li><a>TORNEOS VIGENTES</a>
            <!--  <ul>
              <li><a>PRIMERA DIVISIÓN</a></li>
              <li><a>SEGUNDA DIVISIÓN A</a></li>
              <li><a>SEGUNDA DIVISIÓN B</a></li>
              <li><a>TERCERA DIVISIÓN A</a></li>
              <li><a>TERCERA DIVISIÓN B</a></li>

              </ul>-->
        </li>


        <li><a>CLUBES</a>
            <ul>
                <li><a>BUSCAR CLUB</a></li>
                <li><a href="CrearClub">CREAR CLUB</a></li>


            </ul>
        </li>

        <li><a>JUGADORES</a>

        </li>

        <li><a>TRANSFERENCIAS</a>

        </li>

        <li><a>RANKING POR CLUBES</a>

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

<div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover;" >


   <!-- <div id="Menu1vs1" style="background-color:gray; position:relative; height: 100px; width:900px; left:100px; top:100px;">


        <a href="#" class="myButton"><div style="width:30px; height: 30px; display:inline-block; background:url(images/calendar.png); background-size: cover;"></div>Calendario</a>


    </div>-->

    <div>
        <ul id="MenuPerfil" style="width: 580px;">
            <li id="ListaPerfil"><a href="CLUBESPRO">Tabla general</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Calendario</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Estadísticas</a></li>
            <li id="ListaPerfil"><a href="#">Campeones</a></li>

        </ul>

    </div>

<select style="position:relative; left:950px;top:30px; ">
    <option>Jornada 1</option>
</select>


    <div id="TablaPrimera" style=" width:700px;position: absolute; top:18%; left:15%;">


        <table>
            <thead>
            <tr>

                <th>Local</th>
                <th>Marcador</th>
                <th>Visitante</th>
                <th>Detalles</th>
                <th>Reportar</th>

            </tr>
            </thead>

            <thead>
            <tr>


                <th colspan="5" style="background-color: darkslategrey;">JORNADA 1, 18 DE FEBRERO DE 2016, 18:00</th>

            </tr>
            </thead>


            <tr>
                <td style=""><a>{{$Equipo1->name}}</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/1.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">3</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">2</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/2.png); background-size:cover;"></div>{{$Equipo2->name}}</td>
                <td><a href="DetallesPartido">Detalles</a></td>
                <td><a href="ReportarPartidoProMetodo/{{$Equipo1->id}}/{{$Equipo2->id}}">Reportar</a></td>




            </tr>

            <tr>
                <td style=""><a>Toluca</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/3.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">2</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">1</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/4.png); background-size:cover;"></div>Querétaro</td>
                <td><a href="DetallesPartido">Detalles</a></td>


            </tr>

            <tr>
                <td style=""><a>Santos Laguna</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/5.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">1</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">3</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/6.png); background-size:cover;"></div>Dorados</td>
                <td><a href="DetallesPartido">Detalles</a></td>


            </tr>

            <tr>
                <td style=""><a>Pachuca</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/7.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">0</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">1</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/8.png); background-size:cover;"></div>Puebla</td>
                <td><a href="DetallesPartido">Detalles</a></td>


            </tr>

            <tr>
                <td style=""><a>Pumas</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/9.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">2</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">2</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/10.png); background-size:cover;"></div>Tigres UANL</td>
                <td><a href="DetallesPartido">Detalles</a></td>


            </tr>

            <tr>
                <td style=""><a>Chiapas</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/11.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">3</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">3</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/12.png); background-size:cover;"></div>Atlas</td>
                <td><a href="DetallesPartido">Detalles</a></td>


            </tr>

            <tr>
                <td style=""><a>Chivas</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/13.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">0</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">3</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/14.png); background-size:cover;"></div>Tijuana</td>
                <td><a href="DetallesPartido">Detalles</a></td>


            </tr>

            <tr>
                <td style=""><a>León</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/15.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">2</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">1</div></td>
                <td style=""><div id="LogoEquipo" style="  float:left; background:url(images/Clausura/16.png); background-size:cover;"></div>Monterrey</td>
                <td><a href="DetallesPartido">Detalles</a></td>


            </tr>

            <tr>
                <td style=""><a >Veracruz</a><div id="LogoEquipo" style="float:right; float:right;background:url(images/Clausura/17.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">0</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">1</div></td>
                <td style=""><div id="LogoEquipo" style=" float:left; background:url(images/Clausura/18.png); background-size:cover;"></div>Morelia</td>
                <td><a href="DetallesPartido">Detalles</a></td>


            </tr>










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


