@extends('template')

@section('content')


<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

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
                <li><a>CREAR CLUB</a></li>


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


<!-- inicio menu club -->
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

    #ListaPerfil {
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

    #ListaDatosPerfil {
        list-style: none;
        padding-left: 0px;
    }

    #ListaDatosPerfil li {
        border-bottom: groove;

        padding: 11px 13px;
        font-size: 16px;
        font-family: sans-serif;
    }

    #ListaPerfil {

    }

    #ListaDatosPerfil2 {
        list-style: none;
        padding-left: 0px;
    }

    #ListaDatosPerfil2 li {
        border-bottom: groove;
        padding: 20px 25px;
        font-size: 16px;
        font-family: sans-serif;
    }

    #ListaDatosPerfil2 li:last-child {
        border-bottom: none;
        padding: 20px 25px;
        font-size: 16px;
        font-family: sans-serif;
    }



    #ListaDatosPerfil3 {
        list-style: none;
        padding-left: 0px;
    }


</style>


<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">

    <div>
        <ul id="MenuPerfil" style="width: 494px;">
            <li id="ListaPerfil"><a href="/ClubDetalles/{{$proTeam->id}}">Equipo</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Plantilla</a></li>
            <li id="ListaPerfil"><a href="#">Estadísticas</a></li>
            <li id="ListaPerfil"><a href="#about">Sala de trofeos</a></li>
        </ul>

    </div>







        <div style="background-color: white;  position:relative; top:50px; left:100px; width: 300px; height: auto;">

            <div>
                <ul id="ListaDatosPerfil2">
                    <li style="background-color: #080808;"><a
                                style="font-weight: bold; color: white; font-size: 20px;text-align: center;">Plantilla</a>
                    </li>
                    @foreach($proTeam->users as $user)
                        <li><a style="font-weight: bold;">
                                <div id="LogoEquipo"
                                     style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{$user->playerGamertag()}}/avatarpic-l.png); background-size:cover;"></div>
                            </a> <a style="" href="/PerfilDetalles/{{$user->id}}">{{$user->playerName()}}</a> <a></a><a style="float:right; font-weight: bold; font-style: none;">{{$user->pivot->position}}</a></li>

                    @endforeach

                </ul>
            </div>


        </div>


        <div style="background-color: white;  position:absolute;z-index: 10; top:150px; left:550px; width: 300px; height: auto;">
            @foreach($proTeam->users as $proTeams)
                @if($proTeams->pivot->position==="DT")
            <div>
                <ul id="ListaDatosPerfil2">
                    <li style="background-color: #080808;"><a
                                style="font-weight: bold; color: white; font-size: 20px;text-align: center;">Managers</a>
                    </li>





                        <li><a style="font-weight: bold;">


                                    <div id="LogoEquipo" style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{$user->playerGamertag()}}/avatarpic-l.png);
                                            background-size:cover;"></div>

                            </a> <a style="" href="/PerfilDetalles/{{$user->id}}">{{$proTeams->playerName()}}</a>
                            <a style="float:right;"></a>

                        </li>



                </ul>

            </div>
                @endif
            @endforeach

        </div>


    <div style="background-color: white;  position:relative; top:0px; left:550px; width: 300px; ">


        <ul id="ListaDatosPerfil2">
            <li style="background-color: #080808;  "><a
                        style="font-weight: bold; color: white; font-size: 20px;text-align: center;">Goleadores</a></li>

            <li style=" ">
                    <div id="LogoEquipo"
                         style=" background:url(/images/Clausura/3.png); background-size:cover;"></div>
                <a style="font-weight: bold;">Coche  </a><a style="float:right;">3</a></li>






        </ul>



    </div>



    </div>

</div>

@endsection

