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
                <?php $user=Auth::user();
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


        <div style="width: 700px; border-radius: 10px;  top:10%; left:15%; background-color: whitesmoke;">

            <div class="container" >
                <h2>Asignar Equipos</h2>


                <div style="position:relative; left:50px;" class="form-group">
                    <label style="left:26px" class="col-sm-1 control-label">Liga:</label>

                    <div class="col-sm-4">
                        <input class="form-control" name="JornadasInput" id="focusedInput" type="text" disabled
                               value="{{$league->name}}">
                    </div>
                </div>


                <br></br>

                <div style="position:relative; top:500px; left:500px;" class="container">
                    <form action="/clubes-pro">
                        <!--<button class="btn btn-primary">Enviar</button>-->
                    </form>
                </div>


                <form action="AgregarProTeamLiga" name="FormaAgregarClubaLiga" method="post" class="form-horizontal"
                      role="form">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdLeague" value="{{$league->id}}"/>
                   

                    <div style="position:relative; left:-40px;" class="form-group">
                        <label class="col-sm-2 control-label">Equipos:</label>

                        <div class="col-sm-4">
                            <select id="clubSelect" onchange="seleccionaEquipo()" class="form-control" name="clubSelect"
                                    type="text" value="">
                                <option value=""></option>
                                @foreach($clubes as $club)
                                  
                                    <option value="{{$club->id}}">{{$club->name}}</option>
                                
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div style="position:relative; top:-50px; left:550px;" class="container">
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
 

                </form>


                <input type='hidden' id="textList2" name="textList2" value="" maxlength='30'/>


                <form action="ProEliminarClubLiga" name="FormaAgregarClubaLiga2" method="post" class="form-horizontal"
                      role="form">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdLeague" value="{{$league->id}}"/>
                    <input type="hidden" id="InputIdClub" name="InputIdClub" value=""/>


                    <div class="col-sm-2">
                        <button type="submit" onclick="if(document.getElementById('clubSelect').selectedIndex==0 || document.getElementById('clubSelect').selectedIndex==null){alert('Selecciona un Equipo');return false;}else{};" class="btn btn-primary">Borrar</button>
                    </div>
                </form>

                <form action="ProCrearCalendario" name="FormaAgregarClubaLiga2" method="post" class="form-horizontal"
                      role="form">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdLeague" value="{{$league->id}}"/>



                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Crear Torneo</button>
                    </div>
                </form>
                
                 <form action="ProBorrarLiga" name="FormaAgregarClubaLiga2" method="post" class="form-horizontal"
                      role="form">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdLeague" value="{{$league->id}}"/>



                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary">Borrar Torneo</button>
                    </div>
                </form>


                <br></br> <br>
                <div  style="margin-left: 80px; background-color: white; max-height:300px;  width:390px; ">
                    <?php $i = 1; ?>
                    @foreach($league->proTeams as $leagueTeams)
                        <ul style="list-style:none;">
                            <li>
                                <a style="font-family: sans-serif; font-size:20px; text-decoration:none; color:black">{{$i++}}
                                    .-{{$leagueTeams->name}} </a></li>


                        </ul>

                    @endforeach
                </div>


            </div>


        </div>

    </div>
@endsection


