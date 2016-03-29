

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

    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >


        <!-- <div id="Menu1vs1" style="background-color:gray; position:relative; height: 100px; width:900px; left:100px; top:100px;">


             <a href="#" class="myButton"><div style="width:30px; height: 30px; display:inline-block; background:url(images/calendar.png); background-size: cover;"></div>Calendario</a>


         </div>-->

        <div>
            <ul id="MenuPerfil" style="width: 580px;">
                <li id="ListaPerfil"><a href="/clubes-pro">Tabla general</a></li>
                <li id="ListaPerfil"><a class="active" href="#">Calendario</a></li>
                <li id="ListaPerfil"><a class="active" href="#">Estadísticas</a></li>
                <li id="ListaPerfil"><a href="#">Campeones</a></li>

            </ul>

        </div>



        <style>
            th{
                text-align: center;
            }

            td{
                padding: 5px;
            }
        </style>


        <div id="TablaPrimera" style="max-height:800px; width:700px;position: absolute; top:18%; left:15%;">


            <table>
                <thead>
                <tr>

                    <th >Local</th>
                    <th>Marcador</th>
                    <th>Visitante</th>
                    <th>Detalles</th>
                    <th>Reportar</th>

                </tr>
                </thead>

                <?php
                $j=0;
                $k=2;

                ?>



                <?php $l=2;?>

                @foreach($proCalendar as $Equipos)
                    @if($j==0)
                        <thead>
                        <tr>


                            <th colspan="5" style="text-align: center; background-color: darkslategrey;">JORNADA 1</th>

                        </tr>
                        </thead>
                        <?php $j++ ?>

                    @endif

                    <tr>
                        <td style="">{{$Equipos->localProTeam->name}}<div id="LogoEquipo" style="float:right; background:url(images/Clausura/1.png); background-size:cover;"></div></td>
                        <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">{{$Equipos->matchProTeam->local_score}}</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">0</div></td>
                        <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/2.png); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}</td>
                        <td><a href="/DetallesPartido">Detalles</a></td>
                        <td><a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}">Reportar</a></td>


                    </tr>

                        @if($k==$Equipos->jornada)

                            <thead>
                            <tr>


                                <th colspan="5" style="text-align:center;background-color: darkslategrey;">JORNADA {{$l}}</th>

                            </tr>
                            </thead>
                            <?php $k++; $l++; ?>
                        @endif




                @endforeach




            </table>




        </div>






    </div>

@endsection
