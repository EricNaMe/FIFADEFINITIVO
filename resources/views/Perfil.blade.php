@extends('template')

@section('content')


<div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a href="/Inicio">HOME</a></li>

    </ul>


</div>

<div id="menuCentral" style="height:140%;background-color:darkslategray; background-size: cover;" >
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
        <li id="ListaPerfil"><a class="active" href="#">Perfil</a></li>
        <li id="ListaPerfil"><a href="/PerfilClubes">Clubes Pro</a></li>         
        <li id="ListaPerfil"><a href="/SalaTrofeosPerfil">Sala de trofeo</a></li>
    </ul>

</div>

    <div style="background-color: white; width: 500px; height: 100px; position: relative; left: 300px;">

        <div style="background:url({{Auth::User()->getAvatar()}}); background-size:90px 80px;background-color:  #0000C2;display: inline-block; position:relative; left:10px;top:10px;width:90px; height: 80px;"></div>

        <span style="display: inline-block;position: relative;top:-60px;left:20px;font-size: 20px;font-family: sans-serif;"><a><b>Username:</b>{{Auth::User()->user_name}}</a></span>
        <span style="display: inline-block;position: relative;top:-40px;left:-145px;font-size: 20px;font-family: sans-serif;"><a><b>Gamertag:</b></b>{{Auth::User()->gamertag}}</a></span>
        <span style="color:gray;display:inline-block;  width: 400px; position: relative;top:-40px;left:110px;font-size: 20px;font-family: sans-serif;"><a>"{{Auth::User()->quote}}"</a></span>
    </div>

    @if(Auth::user()->playerGamertag()==null)

        <div style="background-color: #98EFFC;position:relative;border: groove;  top:-40px; left:40px; width:140px; height:100px;"><a><b>Agrega un gamertag, en la opción de editar perfil.</b></a></div>
    @endif

    <div style="background:url({{Auth::User()->getAvatarBody()}});  background-size: contain; background-repeat: no-repeat;  display:inline-block; margin-top: 20px;margin-left: 90px; width: 300px; height: 400px;">


    </div>

    <div style="background-color: white; display:inline-block; position:relative; top:-140px; width: 300px; height: auto;">
     <div>
        <ul id="ListaDatosPerfil">
            <li style="background-color: #080808;"><a style="font-weight: bold; color: white">Datos generales</a></li>
            <li><a style="font-weight: bold;">ID:</a><a style="float:right;">{{Auth::User()->id}}</a></li>
            <li><a style="font-weight: bold;">Consola:</a><a style="float:right;">{{Auth::User()->platform}}</a></li>
            <li><a style="font-weight: bold;">Gamertag:</a><a style="float:right;">{{Auth::User()->gamertag}}</a></li>
            <li><a style="font-weight: bold;">Posición:</a><a style="float:right;">{{Auth::User()->position}}</a></li>
            <li><a style="font-weight: bold;">Rank:</a><a style="float:right;">4</a></li>
           
            <li style="border-bottom: none;"><a style="font-weight: bold;">Experiencia:</a><a style="float:right;">Amateur</a></li>


        </ul>
     </div>
    </div>

    <div style="background-color: white; display: inline-block; margin-left: 40px;  width: 300px; height: auto;">
        <div>
            <ul id="ListaDatosPerfil">
                <li style="background-color: #080808;"><a style="font-weight: bold; color: white">Estadísticas generales</a></li>
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