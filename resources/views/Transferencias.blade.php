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
                @foreach($transfers as $transfer)
                <div id="contenidos">
                    <div id="columna1">
                        <div style="width: 40px; height: 40px; position: absolute; margin-top: -10px;">
                            <img src="https://avatar-ssl.xboxlive.com/avatar/{{$transfer->user->gamertag}}/avatarpic-l.png" style="width: 40px;"/>
                        </div>
                        <div class="title" style="color: navy;  line-height: normal; width: 160px; margin-left: 50px;font-size: 20px; ">{{$transfer->user->user_name}}</div>
                    </div>
                    <div id="columna1" class="title" style="color: black; font-size: 18px; font-style: normal; font-family: Arial;">Se ha Transferido de</div>
                    <div id="columna1" >
                        <div style="width: 40px;  height: 40px; position: absolute; margin-top: -10px;">
                            <img src="{{$transfer->downProTeam->getImageUrl()}}" style="width: 40px;"/></div>
                        <div class="title" style="font-size: 20px; line-height: normal; width: 170px; margin-left: 50px; ">{{$transfer->downProTeam->name}}</div>
                    </div>
                    <div id="columna1" class="title" style="color: black; font-size: 18px; font-style: normal; font-family: Arial;">a</div>
                    <div id="columna1" >
                        <div style="width: 40px; height: 40px; position: absolute; margin-top: -10px;">
                            <img src="{{$transfer->upProTeam->getImageUrl()}}" style="width: 40px;"/></div>
                        <div class="title" style=" font-size: 20px;line-height: normal; width: 170px; margin-left: 50px; ">
                            {{$transfer->upProTeam->name}}
                        </div>
                    </div>
                </div>
                @endforeach
{{--

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

--}}

            </div>

        </div>
@endsection