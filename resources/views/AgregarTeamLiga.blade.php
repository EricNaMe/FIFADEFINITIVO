@extends('template')

@section('content')


<script>


    function seleccionaEquipo()
    {


        var seleccion= document.getElementById('clubSelect');
        document.getElementById('InputIdClub').value=seleccion.options[seleccion.selectedIndex].value;


    }

</script>

<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
  <li><a href="Inicio">HOME</a></li>

        @if (Auth::check())
            <?php $user=Auth::user();
            ?>




            @if($user->user_name==="Administrador22")
                <li><a>ADMINISTRADOR</a>
                    <ul>
                        <li><a href="/CrearLiga">CREAR LIGA</a></li>
                        <li><a href="/CrearCopa">CREAR COPA</a></li>
                        <li><a href="/ModificarLiga">MODIFICAR LIGA</a></li>
                        <li><a href="/ModificarCopa">MODIFICAR COPA</a></li>
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

    </ul>


</div>

<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >




    <div style="width: 700px; height: 750px;border-radius: 10px; position:relative;top:100px;left:200px; background-color: whitesmoke;">

        <div class="container">
            <h2>Asignar Equipos</h2>



            <div style="position:relative; left:50px;"class="form-group">
                <label style="left:26px"class="col-sm-1 control-label">Liga:</label>
                <div class="col-sm-4">
                    <input class="form-control" name="JornadasInput" id="focusedInput" type="text" disabled value="{{$league->name}}">
                </div>
            </div>




            <br></br>

            <div style="position:relative; top:500px; left:500px;" class="container">
                <form action="/PVSP">
                   <!-- <button class="btn btn-primary">Enviar</button>-->
                </form>
            </div>




            <form action="AgregarTeamLiga" name="FormaAgregarClubaLiga" method="post" class="form-horizontal" role="form">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="InputIdLeague" value="{{$league->id}}"/>

                <div style="position:relative; left:-40px;" class="form-group">
                    <label class="col-sm-2 control-label">Equipos:</label>
                    <div class="col-sm-4">
                        <select class="form-control" onchange="seleccionaEquipo()" name="clubSelect" id="clubSelect"  type="text" value="">


                            @foreach($clubes as $club)
                           
                                @if($club->status==="Activo")
                        
                                <option value="{{$club->id}}">{{$club->name}} -    @foreach($club->users as $user) {{$user->user_name}} @endforeach</option>
                                   @endif
                              
                            @endforeach
                        </select>
                    </div>
                </div>
                <div style="position:relative; top:-50px; left:550px;" class="container">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>

            <form action="EliminarClubLiga" name="FormaAgregarClubaLiga2" method="post" class="form-horizontal" role="form">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="InputIdLeague" value="{{$league->id}}"/>
                <input type="hidden" id="InputIdClub" name="InputIdClub" value=""/>


                <div style="" class="col-md-2 col-lg-offset-2">
                    <button type="submit" class="btn btn-primary">Borrar</button>
                </div>
            </form>

            <form action="CrearCalendario" name="FormaAgregarClubaLiga2" method="post" class="form-horizontal"
                  role="form">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="InputIdLeague" value="{{$league->id}}"/>



                <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary">CrearTorneo</button>
                </div>
            </form>

            <br></br>

            <div style="position:relative; background-color: white; height:300px; width:390px; left:140px;">
                <?php $i=1; ?>
                @foreach($league->Teams as $leagueTeams)
                    <ul style="list-style:none;">
                        <li><a style="font-family: sans-serif; font-size:20px; text-decoration:none; color:black">{{$i++}}.-{{$leagueTeams->name}} </a></li>


                    </ul>

                @endforeach
            </div>


        </div>


    </div>

</div>

@endsection


