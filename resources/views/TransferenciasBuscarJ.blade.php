@extends('template')

@section('content')

    <link rel="stylesheet" href="/css/Transferencias.css" type="text/css" media="screen">


    <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral" style="margin-top: 60%;">
        <li><a href="Inicio">HOME</a></li>
            <li><a href="#">TRANSFERENCIAS</a>
            </li>
             <li><a href="RankingCP">RANKING POR CLUBES</a>
            </li>
            <li><a href="Equipo_CP">EQUIPO DE LA SEMANA</a>
            </li>
            <li><a href="Equipo_CPTemp">EQUIPO DE LA TEMPORADA</a>
            </li>
            <li><a href="SalaTrofeosCP">SALA DE TROFEOS</a>
            </li> 
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
            <form action="" name="search" method="post"  class="container subcontainer light-grey">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <h2>Buscar Jugador</h2>
                <p>
                    <label>Ingresa GT de Jugador</label>
                    <input class="input1 border1" name="search" value="{{$search}}" type="text"></p>
                <p>
                    <button class="boton grey" type="submit">Genera Resultados</button>
            </form>
            </br>
            </br>
            </br>
            </br>

            <!--Tabla de datos de la base de datos-->


           
            
            
            
            
            <div id="contenedor" style="position:absolute;top:280px; left: 20px;">
                <div id="contenidos1">

                    <div id="columna21" >GAMER TAG</div>
                    <div id="columna21" >CLUB DE ORIGEN</div>
                    <div id="columna21" style="width: 150px;">ACCION</div>
                </div>
               
                 @foreach($user_search as $proTeam)
                 
                 
                 
                 <div id="contenidos">
                    <div id="columna1" > <div style="width: 50px; height: 50px; position: absolute; margin-top: -10px;"><img src="https://avatar-ssl.xboxlive.com/avatar/{{$proTeam->gamertag}}/avatarpic-l.png" style="width: 50px;"/></div> <div class="title" style="color: navy;  line-height: normal; width: 200px; margin-left: 50px; ">{{$proTeam->user_name}}</div> </div>
                    <div id="columna1" > <div style="width: 50px; height: 50px; position: absolute; margin-top: -10px;"><img src="Imagenes/MLS/TORONTO_FC-LOGO.png" style="width: 50px;"/></div> <div class="title" style=" line-height: normal; width: 210px; margin-left: 50px; "></div> </div>
                    <div id="columna2" style="width: 150px;"><form action="/PerfilDetalles/{{$proTeam->id}}"><button type="submit" class="boton2 grey">Ver perfil</button></a></form></div>
                </div>        
                 
                 
                    
                    @endforeach
            
            </div>
            
            
            
            




        </div>
@endsection