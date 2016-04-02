@extends('template')

@section('content')


<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a>1 VS 1</a>

        <li><a>DIVISIONES LIGA</a>
            <ul>


            </ul>
        </li>


        <li><a>COPA</a>
            <ul>
                <li><a href="/Fase1PvsP">FASE 1</a></li>
                <li><a>FASE 2</a></li>
                <li><a>FASE 3</a></li>

            </ul>
        </li>
        <li><a href="#">SALA DE TROFEOS 1VS1</a></li>
        <li><a href="/Ranking1VS1">RANKING</a></li>
        @if (Auth::check())
            <?php $user=Auth::user();
            ?>

            @if($user->user_name==="Administrador22")
                <li><a>ADMINISTRADOR</a>
                    <ul>
                        <li><a href="/CrearLiga">CREAR LIGA</a></li>
                        <li><a href="/CrearCopa">CREAR COPA</a></li>
                        <li><a href="/Divisiones">ASIGNAR EQUIPOS</a></li>
                        <li><a href="/EliminarEquiposPvsP">ELIMINAR EQUIPOS</a></li>
                        <li><a href="/ModificarLiga">MODIFICAR LIGA</a></li>
                        <li><a href="/ModificarCopa">MODIFICAR COPA</a></li>


                    </ul>
                </li>

            @endif
        @endif

        <li><a href="/Inicio">HOME</a></li>

    </ul>


</div>

<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >


    <!-- <div id="Menu1vs1" style="background-color:gray; position:relative; height: 100px; width:900px; left:100px; top:100px;">


         <a href="#" class="myButton"><div style="width:30px; height: 30px; display:inline-block; background:url(images/calendar.png); background-size: cover;"></div>Calendario</a>


     </div>-->

    <div>
        <ul id="MenuPerfil" style="width: 420px;">
            <li id="ListaPerfil"><a href="PVSP">Tabla general</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Calendario</a></li>

            <li id="ListaPerfil"><a href="#">Campeón</a></li>

        </ul>

    </div>

  <style>
      th{
          text-align: center;
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

            @foreach($calendario as $Equipos)
                @if($j==0)
                    <thead>
                    <tr>


                        <th colspan="5" style="text-align: center; background-color: darkslategrey;">JORNADA 1</th>

                    </tr>
                    </thead>
                    <?php $j++ ?>

                @endif

                @if($Equipos->match==null)
                    <tr>
                        <td style="">{{$Equipos->localTeam->name}}<div id="LogoEquipo" style="float:right; background:url(images/Clausura/1.png); background-size:cover;"></div></td>
                        <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">0</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">0</div></td>
                        <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/2.png); background-size:cover;"></div>{{$Equipos->visitorTeam->name}}</td>
                        <td></td>
                        <td><a href="/ReportarPartidoPvsPMetodo/{{$Equipos->localTeam->id}}/{{$Equipos->visitorTeam->id}}/{{$Equipos->league_id}}/{{$Equipos->id}}">Reportar</a></td>


                    </tr>
                @else

                    <tr>
                        <td style="">{{$Equipos->localProTeam->name}}<div id="LogoEquipo" style="float:right; background:url(images/Clausura/1.png); background-size:cover;"></div></td>
                        <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">{{$Equipos->matchProTeam->local_score}}</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">{{$Equipos->matchProTeam->visitor_score}}</div></td>
                        <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/2.png); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}</td>
                        <td><a href="/DetallesPartido">Detalles</a></td>
                        <td><a >Ya Reportado</a></td>


                    </tr>
                @endif


                @if($k==$Equipos->jornada)

                    <tr>                    <thead>



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