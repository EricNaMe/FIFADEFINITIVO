@extends('template')

@section('content')




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
            <li><a href="Inicio">HOME</a></li>

            </li>


        </ul>


    </div>




    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">


        <div style="width: 700px; border-radius: 10px; display: block;  background-color: whitesmoke;">

            <div class="container">
                <h2>{{$Equipo1->name}}</h2>

                <form action="/ReportarResultadosPro" name="FormaProCrearLiga" method="post" class="form-horizontal"
                      role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>
                    <input type="hidden" name="EquipoLocalInput" value="{{$Equipo1->id}}"/>
                    <input type="hidden" name="EquipoVisitanteInput" value="{{$Equipo2->id}}"/>
                    <input type="hidden" name="leagueInput" value="{{$league->id}}"/>
                    <input type="hidden" name="calendarioInput" value="{{$calendario->id}}"/>



                    <h4>ESCOGE LA ALINEACIÓN</h4>

                    <div style="position:relative; left:-40px;" class="form-group">
                        <label class="col-sm-2 control-label"></label>

                        <div class="col-sm-4">

                            @foreach($Equipo1->users as $user)
                                <ul style="">


                                <input type="checkbox" name="checkbox[]" value="{{$user->id}}">
                                    <div id="LogoEquipo"
                                         style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{$user->playerGamertag()}}/avatarpic-l.png); background-size:cover;"></div>
                                <a style="text-decoration: none; font-weight:bold; color:black; font-family: Arial; font-size: 15px;">{{$user->playerName()}}</a> </br>
                                </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>


                    <br></br>





            </div>

            <br>

            <div style="width: 700px; border-radius: 10px; display: block; background-color: whitesmoke;">

                <div class="container">
                    <h2>{{$Equipo2->name}}</h2>




                    <h4>ESCOGE LA ALINEACIÓN</h4>

                    <div style="position:relative; left:-40px;" class="form-group">
                        <label class="col-sm-2 control-label"></label>

                        <div class="col-sm-4">

                            @foreach($Equipo2->users as $user)
                                <ul style="list-style:none;>
                            <li><a style=" list-style:none; font-weight: bold;">


                                <input type="checkbox" name="checkboxVisitante[]" value="{{$user->id}}">
                                <div id="LogoEquipo"
                                     style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{$user->playerGamertag()}}/avatarpic-l.png); background-size:cover;"></div>
                                <a style="text-decoration: none; color:black; font-weight:bold; font-family: Arial; font-size: 15px;">{{$user->playerName()}}</a> </br>
                                </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>


                    <br></br>

                    <div style="position:relative; left:500px; padding-bottom: 10px;" class="container">

                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>


                    </form>
                </div>


            </div>


        </div>

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