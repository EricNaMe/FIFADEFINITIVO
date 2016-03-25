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
                <li><a href="CrearClub">CREAR CLUB</a></li>


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
@include('partial.navbar')



<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >


<style>
    #TablaPrimeraClubesPro2{

        background-color: white;
        width:500px;
        height:auto;
        position:relative;

    }
</style>


    <div id="TablaPrimeraClubesPro2" style="position: absolute; width:900px; top:20%; left:10%;">
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
            <?php $i=1; ?>





            @foreach($usuarios as $user)
                <tr>
                    <form action="ReportarResultados" name="FormaProCrearLiga" method="post" class="form-horizontal" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <td><div id="PosicionTabla">   {{$i}}</div></td>


                    <td><a href="/PerfilDetalles/{{$user->id}}">{{$user->user_name}}</a></td>


                    <td>       <div class="form-group">

                            <div class="col-sm-2">
                                <select style="width: 100px;"name="PosicionSelect[]" id="PosicionSelect"  class="form-control">
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
                        </div></td>

                    <td>       <div class="form-group">

                            <div class="col-sm-3">
                                <select style="width: 80px;"name="GolesSelect[]" id="GolesSelect"  class="form-control">
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
                        </div></td>

                    <td>       <div class="form-group">

                            <div class="col-sm-3">
                                <select style="width: 80px;"name="AsistenciasSelect[]" id="AsistenciasSelect"  class="form-control">
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
                        </div></td>

                    <td>       <div class="form-group">

                            <div class="col-sm-3">
                                <select style="width: 80px;"name="AmarillasSelect[]" id="AmarillasSelect"  class="form-control">
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
                        </div></td>

                    <td>       <div class="form-group">

                            <div class="col-sm-3">
                                <select style="width: 80px;"name="RojasSelect[]" id="RojasSelect"  class="form-control">
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
                        </div></td>

                    <td>
                        <div class="radio">
                           <input type="radio" value="{{$user->id}}" name="optradio">
                        </div>
                    </td>








                <?php

                    $VectorId[]=$user->id;
                    $i++;
                    ?>

                </tr>



            @endforeach

            @foreach($VectorId as $vector)
                <input type="hidden" name="VectorUsuario[]" value="{{$vector}}">
            @endforeach


            <div style="position:relative; left:500px;" class="container">

                <button type="submit" class="btn btn-primary">Enviar</button>

                </form>
            </div>
        </table>
    </div>

    <!--     <div style=" background:url(/images/CPSemana.jpg);background-color: yellow; width: 225px; height:356px; top:100px; left:600px; position:relative;">



             <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/werux/avatar-body.png); background-size:cover;  display:inline-block; margin-top: 20px;margin-left: 20px; width: 100px; height: 200px;">
             <div style="background:url(/images/Clausura/3.png); background-size: cover; width: 70px; height:70px; position:relative; top:40px; margin-left: 40px;"></div>



       </div> -->


</div>

@endsection