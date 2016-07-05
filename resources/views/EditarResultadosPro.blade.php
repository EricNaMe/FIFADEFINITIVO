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


            <li><a href="RankingCP">RANKING CLUBES PRO</a>
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
                        </ul>
                    </li>

                @endif
            @endif


            <li><a href="/Inicio">HOME</a></li>

            </li>


        </ul>


    </div>





    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">


        <style>
            #TablaPrimeraClubesPro2 {

                background-color: white;

                height: auto;

            }

            th {
                text-align: center;
            }

            td {
                text-align: center;
            }
        </style>


        <br></br>

        <script>
            function validaPosicion()
            {
                var elements=null;

                if(document.getElementsByName("PosicionSelectVisitante[]").length==0)
                {
                    elements = document.getElementsByName("PosicionSelect[]");
                }
                else
                {
                    elements = document.getElementsByName("PosicionSelectVisitante[]");
                }

                var ids = new Array(elements.length)
                for(i=0;i< elements.length; i++)
                {
                    ids[i]=elements[i].options[elements[i].selectedIndex].value;

                }
                for(i=0;i< elements.length; i++)
                {
                    for(e=0;e< elements.length; e++)
                    {
                        if(i==e)
                        {

                        }
                        else
                        {
                            if(ids[i]==ids[e])
                            {
                                alert("Existen dos jugadores con una posición igual!!");
                                i=elements.length;
                                e=elements.length;
                                return false;
                            }

                        }

                    }
                }
                return true;

            }
        </script>
        <form action="ReportarResultados2" name="FormaProCrearLiga" method="post"
              class="form-horizontal" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="EquipoLocalInput" value="{{$EquipoLocal->id}}">
            <input type="hidden" name="EquipoVisitanteInput" value="{{$EquipoVisitante->id}}">
            <input type="hidden" name="leagueInput" value="{{$league->id}}">
            <input type="hidden" name="calendarioInput" value="{{$calendario->id}}">
            <input type="hidden" name="partidoInput" value="{{$partido->id}}">
        
        @if($EquipoUsuarioAuth==$EquipoLocal->id)
        
        <div style="background-color: gray; padding: 10px;" class="col-lg-9 text-center">
            <span><a style="color:white; font-size: 18px; font-weight: bold; ">{{$EquipoLocal->name}}</a></span>
        </div>


        <div class="col-lg-9">
            <div id="TablaPrimeraClubesPro2" class="co-lg-9">

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



                                <td>
                                    <div id="PosicionTabla">   {{$i}}</div>
                                </td>


                                <td><a>{{$userLocal->user_name}}</a></td>


                                <td>
                                    <div class="form-group">

                                        <div class="col-sm-2">
                                            <select style="width: 100px;" name="PosicionSelect[]" id="PosicionSelect"
                                                    class="form-control">
                                                     <option value="1">PO</option>
                                                <option value="2">DFC</option>
                                                <option value="3">DFC2</option>
                                                <option value="4">DFC3</option>
                                                <option value="5">LTI</option>
                                                <option value="6">LTD</option>
                                                <option value="7">MCD</option>
                                                <option value="8">MCD2</option>
                                                <option value="9">MC</option>
                                                <option value="10">MC2</option>
                                                <option value="11">MI</option>
                                                <option value="12">MD</option>
                                                <option value="13">MVI</option>
                                                <option value="14">MVD</option>
                                                <option value="15">MCO</option>
                                                <option value="16">MCO2</option>
                                                <option value="17">EI</option>
                                                <option value="18">ED</option>
                                                <option value="19">DI</option>
                                                <option value="20">DD</option>
                                                <option value="21">DC</option>
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
        </div>

        @endif
        <br></br>

        <br></br><br>

        @if($EquipoUsuarioAuth==$EquipoVisitante->id)
       
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
                                              <option value="1">PO</option>
                                                <option value="2">DFC</option>
                                                <option value="3">DFC2</option>
                                                <option value="4">DFC3</option>
                                                <option value="5">LTI</option>
                                                <option value="6">LTD</option>
                                                <option value="7">MCD</option>
                                                <option value="8">MCD2</option>
                                                <option value="9">MC</option>
                                                <option value="10">MC2</option>
                                                <option value="11">MI</option>
                                                <option value="12">MD</option>
                                                <option value="13">MVI</option>
                                                <option value="14">MVD</option>
                                                <option value="15">MCO</option>
                                                <option value="16">MCO2</option>
                                                <option value="17">EI</option>
                                                <option value="18">ED</option>
                                                <option value="19">DI</option>
                                                <option value="20">DD</option>
                                                <option value="21">DC</option>
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
@endif

    <div class="col-sm-9">
                 <button type="submit" onclick="if(validaPosicion()){}else{return false;};"class="btn btn-primary">Enviar</button>
            </div>

        </form>

        
        
        @if(Auth::user()->user_name=="Administrador22")
        <form>
        <div style="background-color: white; margin-top: 30px;" class="col-lg-6">


            <div class="col-sm-12">
                <div class="col-sm-3">
                    <div class="col-xs-6">
                        <label class="" for="usr">{{$EquipoLocal->name}}</label>
                    </div>
                    <div class="col-xs-4">
                        <div id=""
                             style="height:40px; width:40px; background:url({{$EquipoLocal->getImageUrl()}});  background-size:cover;"></div>
                    </div>
                </div>

                <div class="col-xs-1" style="width:14%;">
                    <input type="number" min="0" name="LocalInput" class="col-md-2 form-control" id="usr">
                </div>
                <div class="col-xs-1">
                    <a>VS</a>
                </div>
                <div class="col-xs-1" style="width:14%;">
                    <input type="number" min="0" name="VisitorInput" class="col-md-2 form-control" id="usr">
                </div>

                <div class="col-sm-3">
                    <div class="col-xs-4">
                        <div id="" style="height:40px; width:40px; background:url({{$EquipoVisitante->getImageUrl()}});  background-size:cover;"></div>
                    </div>

                    <div class="col-xs-6">
                        <label class="" for="usr">{{$EquipoVisitante->name}}</label>
                    </div>

                </div>







            </div>


            <div class="col-sm-9">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
            </form>
        
        @endif

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