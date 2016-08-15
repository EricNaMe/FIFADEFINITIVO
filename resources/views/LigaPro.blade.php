@extends('template')

@section('content')

    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
            <li><a href="/Inicio">HOME</a></li>
            @if (Auth::check())
                <?php $user = Auth::user();
                ?>




                @if($user->user_name==="Administrador22")
                    <li><a>ADMINISTRADOR</a>
                        <ul>
                            <li><a href="/ProCrearLiga">CREAR LIGA</a></li>
                            <li><a href="/ProCrearCopa">CREAR COPA</a></li>
                            <li><a href="/ModificarLigaPro">MODIFICAR LIGA</a></li>
                            <li><a href="/ModificarCopaPro">MODIFICAR COPA</a></li>
                            <li><a href="/ModificarDatosLigaPro">MODIFICAR TABLA DE LIGA</a></li>
                            <li><a href="/crearEquipoSemana/{{$league->id}}">CREAR EQUIPO DE LA SEMANA</a></li>
                        </ul>
                    </li>

                @endif
            @endif
            <li><a>LIGAS VIGENTES</a>
                <ul>
                    @foreach($ligas as $liga)
                        <li><a href="/EncontrarLiga/{{$liga->id}}">{{$liga->name}}</a></li>

                    @endforeach
                </ul>
            </li>
            <li><a>COPAS VIGENTES</a>
                <ul>
                    @foreach($copas as $copa)
                        <li><a href="/EncontrarCopa/{{$copa->id}}">{{$copa->name}}</a></li>

                    @endforeach
                </ul>
            </li>
            <li><a>CLUBES</a>
                <ul>
                    <li><a href="/clubes-pro/crear">CREAR CLUB</a></li>
                    <li><a href="/clubes-pro/buscar">BUSCAR CLUB</a></li>
                </ul>
            </li>
            <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a></li>
            <li><a href="/EquipoSemana/{{$league->id}}">EQUIPO DE LA SEMANA</a>
        </ul>


    </div>

    <style>
        th {
            text-align: center;
        }
    </style>

    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">


        <div>
            <ul id="MenuPerfil" style="width: 580px;">
                <li id="ListaPerfil"><a href="#">Tabla general</a></li>
                <li id="ListaPerfil"><a class="active" href="/ProCalendarioEnc/{{$league->id}}">Calendario</a></li>
                <li id="ListaPerfil"><a class="active" href="/GoleadoresProLiga/{{$league->id}}">Estadísticas</a></li>
                <li id="ListaPerfil"><a href="/SalaTrofeosCP">Campeones</a></li>

            </ul>

        </div>


        <span style="background-color: darkslategrey; height:70px; width: auto;padding: 10px; position:relative; display: inline-block; left:420px;"> <a
                    style="padding-top:5px;font-size: 50px;color:white; font-family: sans-serif; font-weight: bold;">{{$league->name}}</a></span>


        <div id="TablaPrimera" style="position: absolute; top:35%; left:14%;">
            <table>
                <thead>
                <tr>
                    <th>Posición</th>
                    <th>Equipo</th>
                    <th>Pts</th>
                    <th>JJ</th>
                    <th>JG</th>
                    <th>JE</th>
                    <th>JP</th>
                    <th>GF</th>
                    <th>GC</th>
                    <th>DG</th>
                </tr>
                </thead>
                <?php $i = 1;

                ?>
                @foreach($proTeams as $estadisticas)
                    <?php $clubname= $estadisticas ?>
                            <tr>
                                <td>
                                    <div id="PosicionTabla">   {{$i}}</div>
                                </td>
                                <td style="text-align:left;">
                                        <div id="LogoEquipo"
                                             style=" background:url({{$estadisticas->getImageUrl()}});  background-size:cover;"></div>
                                        <a href="/clubes-pro/{{$estadisticas->id}}">{{$estadisticas->name}}</a></td>
                                    @if($estadisticas->pivot->points==0)
                                        <td>0</td>
                                    @else
                                        <td>{{$estadisticas->pivot->points}}</td>
                                    @endif

                                    @if($estadisticas->pivot->JJ==0)
                                        <td>0</td>
                                    @else
                                        <td>{{$estadisticas->pivot->JJ}}</td>
                                    @endif
                                    @if($estadisticas->pivot->JG==0)
                                        <td>0</td>
                                    @else
                                        <td>{{$estadisticas->pivot->JG}}</td>
                                    @endif
                                    @if($estadisticas->pivot->JE==0)
                                        <td>0</td>
                                    @else
                                        <td>{{$estadisticas->pivot->JE}}</td>
                                    @endif
                                    @if($estadisticas->pivot->JP==0)
                                        <td>0</td>
                                    @else
                                        <td>{{$estadisticas->pivot->JP}}</td>
                                    @endif
                                    @if($estadisticas->pivot->GF==0)
                                        <td>0</td>
                                    @else
                                        <td>{{$estadisticas->pivot->GF}}</td>
                                    @endif
                                    @if($estadisticas->pivot->GC==0)
                                        <td>0</td>
                                    @else
                                        <td>{{$estadisticas->pivot->GC}}</td>
                                    @endif
                                    <td>{{$DF=$estadisticas->pivot->GF-$estadisticas->pivot->GC}}</td>
                                <?php $i++; ?>

                            </tr>
                    @endforeach

            </table>
        </div>

    </div>


@endsection