@extends('template')

@section('content')

    @include('partial.navbar')



    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
            <li><a>CLUBES PRO</a>

            <li><a>TORNEOS VIGENTES</a>
                <ul>


                </ul>
            </li>


        <li><a>CLUBES</a>
            <ul>
                <li><a>BUSCAR CLUB</a></li>
                <li><a href="clubes-pro/crear">CREAR CLUB</a></li>


                </ul>
            </li>

            <li><a>JUGADORES</a>

            </li>

            <li><a>TRANSFERENCIAS</a>

            </li>


            <li><a href="RankingCP">RANKING POR CLUBES</a>
            <li><a>ADMINISTRADOR</a>
                <ul>
                    <li><a>CREAR LIGA</a></li>
                    <li><a>CREAR COPA</a></li>
                </ul>
            </li>
            <li><a href="/Inicio">HOME</a></li>

            </li>


        </ul>


    </div>


    <div id="menuSuperior" style="background:url(/images/topMenu.jpeg); background-size: cover; ">

        <ul id="ListaMenuSuperior" style="margin-left: 400px;">
            <li><a href="/clubes-pro">CLUBES PRO</a></li>
            <li><a href="/PVSP">1 VS 1</a></li>
            <li><a href="/Reglamento">REGLAMENTO</a></li>
            <li><a href="/Clips">CLIPS</a></li>
            <li><a href="/Noticias">NOTICIAS</a></li>
            @if (Auth::check())
                <li id="LoginMenu"><a href="#">
                        <div id="LogoEquipo"
                             style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatarpic-l.png); background-size:cover;"></div>{{Auth::User()->user_name}}
                    </a>
                    <ul id="SubMenu">

                        <li style="font-size: 12px; "><a href="/Perfil">Ver Perfil</a></li>
                        <li style="font-size: 12px; "><a href="/EditarPerfil">Editar Perfil</a></li>
                        <li style="font-size: 12px; "><a href="/auth/logout">Cerrar sesión</a></li>


                    </ul>
                </li>
            @else
                <li id="LoginMenu"><a href="/auth/login">LOGIN</a>


                    <ul id="SubMenu">
                        <li style="font-size: 12px; "><a href="/auth/login">Iniciar Sesión</a></li>
                        <li style="font-size: 12px; margin-left: 5px; "><a href="/auth/register">Registrarse</a></li>

                    </ul>
                </li>
            @endif

        </ul>


    </div>


    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">


        <style>
            #TablaPrimeraClubesPro2 {

                background-color: white;

                height: auto;

            }
        </style>


        <br></br>

        <div style="background-color: gray; padding: 10px;" class="col-lg-9 text-center">
            <span><a  style="color:white; font-size: 18px; font-weight: bold; ">{{$EquipoLocal->name}}</a></span>
        </div>

            <div  id="TablaPrimeraClubesPro2"  class="co-lg-9">

                <table>
                    <thead>
                    <tr>
                        <th>Número</th>
                        <th>Jugador</th>
                        <th>Posición</th>
                        <th>Goles</th>
                        <th>Asistencias</th>
                        <th>Amarillas</th>
                        <th>Rojas</th>
                        <th>Jugador del partido</th>


                    </tr>
                    </thead>
                    <?php $i = 1; ?>





                    @foreach($usuariosLocal as $userLocal)
                        <tr>
                            <form action="ReportarResultados" name="FormaProCrearLiga" method="post"
                                  class="form-horizontal" role="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="EquipoLocalInput" value="{{$EquipoLocal->id}}">
                                <input type="hidden" name="EquipoVisitanteInput" value="{{$EquipoVisitante->id}}">
                                <input type="hidden" name="leagueInput" value="{{$league->id}}">

                                <td>
                                    <div id="PosicionTabla">   {{$i}}</div>
                                </td>


                                <td><a>{{$userLocal->user_name}}</a></td>


                                <td>
                                    <div class="form-group">

                                        <div class="col-sm-2">
                                            <select style="width: 100px;" name="PosicionSelect[]" id="PosicionSelect"
                                                    class="form-control">
                                                <option value="PO">PO</option>
                                                <option value="DFC">DFC</option>
                                                <option value="LTI">LTI</option>
                                                <option value="LTD">LTD</option>
                                                <option value="MCD">MCD</option>
                                                <option value="MC">MC</option>
                                                <option value="MI">MI</option>
                                                <option value="MD">MD</option>
                                                <option value="MCO">MCO</option>
                                                <option value="EI">EI</option>
                                                <option value="ED">ED</option>
                                                <option value="DI">DI</option>
                                                <option value="DD">DD</option>
                                                <option value="DC">DC</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">

                                        <div class="col-sm-3">
                                            <select style="width: 80px;" name="GolesSelect[]" id="GolesSelect"
                                                    class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>

                                            </select>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">

                                        <div class="col-sm-3">
                                            <select style="width: 80px;" name="AsistenciasSelect[]"
                                                    id="AsistenciasSelect" class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>

                                            </select>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">

                                        <div class="col-sm-3">
                                            <select style="width: 80px;" name="AmarillasSelect[]" id="AmarillasSelect"
                                                    class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>


                                            </select>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="form-group">

                                        <div class="col-sm-3">
                                            <select style="width: 80px;" name="RojasSelect[]" id="RojasSelect"
                                                    class="form-control">
                                                <option value="0">0</option>
                                                <option value="1">1</option>


                                            </select>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <div class="radio">
                                        <input type="radio" value="{{$userLocal->id}}" name="optradio">
                                    </div>
                                </td>


                            <?php

                            $VectorIdLocal[] = $userLocal->id;

                            $i++;
                            ?>

                        </tr>





                    @endforeach
                </table>

                @foreach($VectorIdLocal as $vector)
                    <input type="hidden" name="VectorUsuarioLocal[]" value="{{$vector}}">
                @endforeach


                <br></br>
            </div>



        <br></br><br>

        <div style="background-color: gray; padding: 10px;" class="col-lg-9 text-center">
            <span><a style="color:white; font-size: 18px; font-weight: bold; ">{{$EquipoVisitante->name}}</a></span>
        </div>
        <div id="TablaPrimeraClubesPro2" class="col-lg-9">
            <table>
                <thead>
                <tr>
                    <th>Número</th>
                    <th>Jugador</th>
                    <th>Posición</th>
                    <th>Goles</th>
                    <th>Asistencias</th>
                    <th>Amarillas</th>
                    <th>Rojas</th>
                    <th>Jugador del partido</th>


                </tr>
                </thead>
                <?php $j = 1; ?>





                @foreach($usuariosVisitante as $userVisitante)
                    <tr>


                        <td>
                            <div id="PosicionTabla">   {{$j}}</div>
                        </td>


                        <td><a>{{$userVisitante->user_name}}</a></td>


                        <td>
                            <div class="form-group">

                                <div class="col-sm-2">
                                    <select style="width: 100px;" name="PosicionSelectVisitante[]"
                                            id="PosicionSelectVisitante" class="form-control">
                                        <option value="PO">PO</option>
                                        <option value="DFC">DFC</option>
                                        <option value="LTI">LTI</option>
                                        <option value="LTD">LTD</option>
                                        <option value="MCD">MCD</option>
                                        <option value="MC">MC</option>
                                        <option value="MI">MI</option>
                                        <option value="MD">MD</option>
                                        <option value="MCO">MCO</option>
                                        <option value="EI">EI</option>
                                        <option value="ED">ED</option>
                                        <option value="DI">DI</option>
                                        <option value="DD">DD</option>
                                        <option value="DC">DC</option>
                                    </select>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">

                                <div class="col-sm-3">
                                    <select style="width: 80px;" name="GolesSelectVisitante[]" id="GolesSelectVisitante"
                                            class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>

                                    </select>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">

                                <div class="col-sm-3">
                                    <select style="width: 80px;" name="AsistenciasSelectVisitante[]"
                                            id="AsistenciasSelectVisitante" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>

                                    </select>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">

                                <div class="col-sm-3">
                                    <select style="width: 80px;" name="AmarillasSelectVisitante[]"
                                            id="AmarillasSelectVisitante" class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>


                                    </select>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">

                                <div class="col-sm-3">
                                    <select style="width: 80px;" name="RojasSelectVisitante[]" id="RojasSelectVisitante"
                                            class="form-control">
                                        <option value="0">0</option>
                                        <option value="1">1</option>


                                    </select>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="radio">
                                <input type="radio" value="{{$userVisitante->id}}" name="optradio">
                            </div>
                        </td>


                        <?php


                        $VectorIdVisitante[] = $userVisitante->id;
                        $j++;
                        ?>

                    </tr>



                @endforeach
            </table>


            @foreach($VectorIdVisitante as $vector2)
                <input type="hidden" name="VectorUsuarioVisitante[]" value="{{$vector2}}">
                @endforeach


                        <!--     <div style=" background:url(/images/CPSemana.jpg);background-color: yellow; width: 225px; height:356px; top:100px; left:600px; position:relative;">



                     <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/werux/avatar-body.png); background-size:cover;  display:inline-block; margin-top: 20px;margin-left: 20px; width: 100px; height: 200px;">
                     <div style="background:url(/images/Clausura/3.png); background-size: cover; width: 70px; height:70px; position:relative; top:40px; margin-left: 40px;"></div>



               </div> -->


        </div>


        <br></br>
        <br></br>
        <div style="background-color: white;" class="col-lg-6">


            <div class="col-sm-12">
                <div class="col-xs-2">
                    <label class="" for="usr">{{$EquipoLocal->name}}</label>
                </div>
                <div class="col-xs-1" style="width:10%;">
                    <input type="number" min="0"  name="LocalInput" class="col-md-2 form-control" id="usr">
                </div>
                <div class="col-xs-1">
                    <a>VS</a>
                </div>
                <div class="col-xs-1" style="width:10%;">
                    <input type="number" min="0" name="VisitorInput" class="col-md-2 form-control" id="usr">
                </div>

                <div class="col-xs-2">
                    <label class=""  for="usr">{{$EquipoVisitante->name}}</label>
                </div>


            </div>


            <div class="col-sm-9">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

        </form>


        <script>

            $(document).ready(function () {
                $('#ListaMenuLateral > li > a').click(function () {
                    if ($(this).attr('class') != 'active') {
                        $('#ListaMenuLateral li ul').slideUp();
                        $(this).next().slideToggle();
                        $('#ListaMenuLateral li a').removeClass('active');
                        $(this).addClass('active');
                    }
                });
            });
        </script>
@endsection