@extends('template')

@section('content')


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

    <div>
        <ul id="MenuPerfil" style="width: 570px;">
            <li id="ListaPerfil"><a href="CLUBESPRO">Tabla general</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Calendario</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Estadísticas</a></li>
            <li id="ListaPerfil"><a href="PerfilClubes">Campeones</a></li>

        </ul>

    </div>


    <div style="background-color: green; height: 150px; display:inline-block; width:150px; position: relative; top:20px; left:300px; background:url(/images/Clausura/4.png); background-size:cover;"></div>

    <span style="background-color: darkslategrey; height:60px; width: 180px; position:relative; display: inline-block; left:350px;"> <a style="padding-top:5px;font-size: 50px;color:white; font-family: sans-serif; font-weight: bold;">&nbsp;&nbsp;&nbsp;5 - 4</a></span>

    <div style="background-color: green; height: 150px; display:inline-block; width:150px; position: relative; top:20px; left:390px; background:url(/images/Clausura/5.png); background-size:cover;"></div>


    <span style="background-color: darkslategrey;  padding: 10px; position:relative; top:100px; display: inline-block; left:-200px;"> <a style="padding-top:5px;font-size: 30px;color:white; font-family: sans-serif; font-weight: bold;">Querétaro</a></span>

    <span style="background-color: darkslategrey; padding: 10px;  position:relative;top:100px; display: inline-block; left:40px;"> <a style="padding-top:5px;font-size: 30px;color:white; font-family: sans-serif; font-weight: bold;">Santos Laguna</a></span>




<div style="height: auto;position: relative;  top:140px; left:200px; width: 300px; background-color: whitesmoke;">
<ul style="padding-left: 0px;">
    <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif; background-color: #111111;color: white;font-weight: bold;"><a>POS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUGADOR</a></li>
    <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>MD</a><a style="margin-left: 80px;">Coche</a></li>
    <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>EI</a><a style="margin-left: 80px;">Coche</a></li>
    <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>DC</a><a style="margin-left: 80px;">Coche</a></li>

</ul>



</div>

    <div style="height: auto;position: relative; top:-108px; display: inline-block; left:670px; width: 300px; background-color: whitesmoke;">
        <ul style="padding-left: 0px;">
            <li style="list-style:none; margin-top: -16px; padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif; background-color: #111111;color: white;font-weight: bold;"><a>POS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUGADOR</a></li>
            <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>MD</a><a style="margin-left: 80px;">Coche</a></li>
            <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>EI</a><a style="margin-left: 80px;">Coche</a></li>
            <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>DC</a><a style="margin-left: 80px;">Coche</a></li>

        </ul>



    </div>



    </div>



</div>
@endsection


