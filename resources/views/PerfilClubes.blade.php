@extends('template')

@section('content')


<div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a>HOME</a></li>

    </ul>


</div>

<div id="menuCentral" style="background-color:darkslategray; background-size: cover;" >
    <style>
        #MenuPerfil {
            list-style-type: none;
            margin-top: 40px;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            width: 500px;
            margin-left: 300px;
        }

        #ListaPerfil{
            float: left;
        }

        #ListaPerfil a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 20px 25px;
            text-decoration: none;
            font-family: sans-serif;
            font-weight: bold;
        }

        #ListaPerfil a:hover {
            background-color: #111;
        }

        #ListaDatosPerfil{
            list-style: none;
            padding-left: 0px;
        }

        #ListaDatosPerfil li{
            border-bottom:groove;
            padding: 11px 13px;
            font-size: 16px;
            font-family: sans-serif;
        }
        #ListaPerfil{

        }

    </style>
    <div>
        <ul id="MenuPerfil">
            <li id="ListaPerfil"><a class="active" href="Perfil">Perfil</a></li>
            <li id="ListaPerfil"><a href="#">Clubes Pro</a></li>           
            <li id="ListaPerfil"><a href="/SalaTrofeosPerfil">Sala de trofeo</a></li>
        </ul>

    </div>

    <div style="background-color: white; width: 500px; height: 100px; position: relative; left: 300px;">

        <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatarpic-l.png); background-size:90px 80px;background-color:#0000C2;display: inline-block; position:relative; left:10px;top:10px;width:90px; height: 80px;"></div>

        <span style="display: inline-block;position: relative;top:-40px;left:20px;font-size: 20px;font-family: sans-serif;"><a>{{Auth::User()->gamertag}}</a></span>
        <span style="color:gray;display: inline-block;position: relative;top:-10px;left:-40px;font-size: 20px;font-family: sans-serif;"><a>"{{Auth::User()->quote}}"</a></span>
    </div>


    <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatar-body.png); background-size:300px 300px;  display:inline-block; margin-top: 20px;margin-left: 20px; width: 300px; height: 300px;">


    </div>

    <div style="background-color: white;  position:relative; top:-320px; left:380px; width: 300px; height: auto;">
        <div>
            <ul id="ListaDatosPerfil">
                <li style="background-color: #080808;"><a style="font-weight: bold; color: white">Historial clubes Pro</a></li>
                <li><a style="font-weight: bold;">Juegos jugados:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Ganados:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Empates:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Perdidos:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Goles:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Asistencias:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Jugador del partido:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Tarjetas Amarillas:</a><a style="float:right;">0</a></li>
                <li style="border-bottom: none;"><a style="font-weight: bold;">Tarjetas Rojas:</a><a style="float:right;">0</a></li>



            </ul>
        </div>
    </div>

    <div style="background-color: white;   position:relative; top:-764px; left:740px; width: 300px; height: auto;">
        <div>
            <ul id="ListaDatosPerfil">
                <li style="background-color: #080808;"><a style="font-weight: bold; color: white">Temporada actual</a></li>
                <li><a style="font-weight: bold;">Juegos jugados:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Ganados:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Empates:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Perdidos:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Goles:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Asistencias:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Jugador del partido:</a><a style="float:right;">0</a></li>
                <li><a style="font-weight: bold;">Tarjetas Amarillas:</a><a style="float:right;">0</a></li>
                <li style="border-bottom: none;"><a style="font-weight: bold;">Tarjetas Rojas:</a><a style="float:right;">0</a></li>



            </ul>
        </div>
    </div>







</div>

@endsection
