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
                <li><a href="/CrearClub">CREAR CLUB</a></li>


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


@include('partial.navbar')



<!-- inicio menu club -->



<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">

    <div>
        <ul id="MenuPerfil" style="width: 494px;">
            <li id="ListaPerfil"><a href="#">Equipo</a></li>
            <li id="ListaPerfil"><a class="active" href="/PlantillaPro/{{$proTeam->id}}">Plantilla</a></li>
            <li id="ListaPerfil"><a href="#">Estadísticas</a></li>
            <li id="ListaPerfil"><a href="#about">Sala de trofeos</a></li>
        </ul>

    </div>


    <div style="background-color:whitesmoke; width:500px; height:600px;position:relative; left:200px; top:30px;">

        <div style="background-color: green; height: 150px; width:150px; position: relative; top:20px; left:160px; background:url(/images/Clausura/{{$proTeam->id}}.png); background-size:cover;"></div>


        <div style="background-color: white;  position:relative; top:50px; left:0px; width: 500px; height: auto;">
            <div>
                <ul id="ListaDatosPerfil2">
                    <li style="background-color: #080808;">
                        <a style="font-weight: bold; color: white; font-size: 30px;text-align: center;">{{$proTeam->name}}
                            <a style="position:relative;left:100px;" href="/UnirteClubEquipo/{{$proTeam->id}}" class="btn btn-primary">Solicitar entrada</a>
                        </a>
                    </li>
                    <li><a style="font-weight: bold;">Lema:</a><a style="float:right;">{{$proTeam->quote}}</a></li>
                    <li><a style="font-weight: bold;">Consola:</a><a style="float:right;">xbox</a>
                    </li>


                    <li><a style="font-weight: bold;">Rank:</a><a style="float:right;">4</a></li>
                    <li><a style="font-weight: bold;">Estado:</a><a style="float:right;">{{$proTeam->state}}</a></li>
                    <li style="border-bottom: none;"><a style="font-weight: bold;">Experiencia:</a><a
                                style="float:right;">{{$proTeam->id}}Amateur</a></li>


                </ul>
          
            </div>


        </div>


        <div style="background-color: white;  position:relative; top:-540px; left:550px; width: 300px; height: auto;">

            <div>
                <ul id="ListaDatosPerfil2">
                    <li style="background-color: #080808;"><a
                                style="font-weight: bold; color: white; font-size: 20px;text-align: center;">Ultimos
                            partidos</a></li>

                    <li><a style="font-weight: bold;">vs
                            <div id="LogoEquipo"
                                 style=" background:url(/images/Clausura/3.png); background-size:cover;"></div>
                        </a> <a style="">Los pitudos FC</a><a style="float:right;">4 - 3</a></li>
                    <li><a style="font-weight: bold;">vs
                            <div id="LogoEquipo"
                                 style=" background:url(/images/Clausura/4.png); background-size:cover;"></div>
                        </a> <a style="">Valedores</a><a style="float:right;">2 - 3</a></li>
                    <li><a style="font-weight: bold;">vs
                            <div id="LogoEquipo"
                                 style=" background:url(/images/Clausura/5.png); background-size:cover;"></div>
                        </a> <a style="">Los miserables</a><a style="float:right;">5 - 3</a></li>



                </ul>
            </div>


        </div>




        </div>




    </div>

</div>


@endsection




