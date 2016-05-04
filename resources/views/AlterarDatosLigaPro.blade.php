@extends('template')

@section('content')
<script>

    function seleccionaEquipo() {

    
        var seleccion = document.getElementById('clubSelect');
        document.getElementById('InputIdClub').value = seleccion.options[seleccion.selectedIndex].value;


    }

</script>

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
            </ul>
        </li>

        @endif
        @endif
        <li><a>LIGAS VIGENTES</a>
            <ul>
                @foreach($ligas as $liga)
                <li><a href="EncontrarLiga/{{$liga->id}}">{{$liga->name}}</a></li>

                @endforeach
            </ul>
        </li>
        <li><a>COPAS VIGENTES</a>
            <ul>
                @foreach($copas as $copa)
                <li><a href="EncontrarCopa/{{$copa->id}}">{{$copa->name}}</a></li>

                @endforeach
            </ul>
        </li>
        <li><a>CLUBES</a>
            <ul>
                <li><a href="/clubes-pro/crear">CREAR CLUB</a></li>
                <li><a href="/clubes-pro/buscar">BUSCAR CLUB</a></li>
            </ul>
        </li>
        <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a> 

            </div>

            <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">


                <div style="width: 800px; border-radius: 10px;  top:10%; left:15%; background-color: whitesmoke;">

                    <div class="container" >
                        <h2>Asignar Equipos</h2>


                        <div style="position:relative; left:50px;" class="form-group">
                            <label style="left:26px" class="col-sm-1 control-label">Liga:</label>

                            <div class="col-sm-4">
                                <input class="form-control" name="JornadasInput" id="focusedInput" type="text" disabled
                                       value="{{$ligaPro->name}}">
                            </div>
                        </div>


                        <br></br>

                        <div style="position:relative; top:500px; left:500px;" class="container">
                            <form action="/clubes-pro">
                                <!--<button class="btn btn-primary">Enviar</button>-->
                            </form>
                        </div>


                        <form action="BuscarDatosPro" name="FormaAgregarClubaLiga" method="post" class="form-horizontal"
                              role="form">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="InputIdLeague" value="{{$ligaPro->id}}"/>


                            <div style="position:relative; left:-40px;" class="form-group">
                                <label class="col-sm-2 control-label">Equipos:</label>

                                <div class="col-sm-4">
                                    <select id="clubSelect" onchange="seleccionaEquipo()" class="form-control" name="clubSelect"
                                            type="text" value="">
                                        <option value=""></option>
                                        @foreach($ligaPro->proTeams as $club)

                                        <option value="{{$club->id}}">{{$club->name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div style="position:relative; top:-50px; left:550px;" class="container">
                                <button type="submit" class="btn btn-primary">Buscar datos</button>
                            </div>


                        </form>

                        <style>
                            ul#ListaDatos li{
                                display:inline;
                                padding: 5px 20px;

                            }
                            ul#ListaDatos li a{

                                font-weight: bold;
                                color:black;
                                text-decoration: none;
                            }


                        </style>
                      @if($Bandera!=1)
                      <h2 style="margin-left:250px;">{{$ClubPro->name}}</h2>
                        <div class="row">   
                            <div  class="col-sm-9" style="">
                                <ul id="ListaDatos">
                                    <li><a>JJ:</a>{{$JJ}}</li>
                                    <li><a>JG:</a>{{$JG}}</li>
                                    <li><a>JE:</a>{{$JE}}</li>
                                    <li><a>JP:</a>{{$JP}}</li>
                                    <li><a>Puntos:</a>{{$points}}</li>
                                    <li><a>GF:</a>{{$GF}}</li>
                                    <li><a>GC:</a>{{$GC}}</li>

                                </ul>


                            </div>
                        </div>   
                   

                            <div class="row">       

                                <div  class="col-sm-10" style="">
                                    <form action="ModificarDatosPro" name="FormaAgregarClubaLiga" method="post" role="form" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="InputIdLeague" value="{{$ligaPro->id}}"/>
                             <input type="hidden" name="InputIdClub" value="{{$ClubPro->id}}"/>
                                    <div  class="col-xs-1" style="margin-left:30px;">
                                        <input type="number"  value="0" name="InputJJ" class="col-md-2 form-control" id="usr">
                                    </div>
                                    <div class="col-xs-1" style="">
                                        <input type="number"  value="0" name="InputJG" class="col-md-2 form-control" id="usr">
                                    </div>
                                    <div class="col-xs-1" style="">
                                        <input type="number"  value="0" name="InputJE" class="col-md-2 form-control" id="usr">
                                    </div>
                                    <div class="col-xs-1" style="">
                                        <input type="number"  value="0" name="InputJP" class="col-md-2 form-control" id="usr">
                                    </div>
                                    <div class="col-xs-1" style="">
                                        <input type="number"  value="0" name="InputPuntos" class="col-md-2 form-control" id="usr">
                                    </div>
                                    
                                     <div class="col-xs-1" style="margin-left:14px;">
                                        <input type="number"  value="0" name="InputGF" class="col-md-2 form-control" id="usr">
                                    </div>
                                    <div class="col-xs-1" style="margin-left:14px;">
                                        <input type="number"  value="0" name="InputGC" class="col-md-2 form-control" id="usr">
                                    </div>
                             
                             <br></br><br></br>
                                <div class="col-sm-9 col-sm-offset-3">
                                      <button  type="submit" class="btn btn-primary">Cambiar datos</button>
                                </div>
                                    </form>        


                                </div>
                            </div>     

   @endif




                            <br></br> <br>



                        </div>


                    </div>

                </div>
                @endsection


