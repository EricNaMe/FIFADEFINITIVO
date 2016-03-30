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
              <li><a>ADMINISTRADOR</a>
                  <ul>
                      <li><a href="CrearLiga">CREAR LIGA</a></li>
                      <li><a href="CrearCopa">CREAR COPA</a></li>
                      <li><a href="Divisiones">ASIGNAR EQUIPOS</a></li>
                      <li><a href="#">ELIMINAR EQUIPOS</a></li>
                      <li><a href="ModificarLiga">MODIFICAR LIGA</a></li>
                      <li><a href="ModificarCopa">MODIFICAR COPA</a></li>


                  </ul>
              </li>
                <li><a>DIVISIONES LIGA</a>
                <ul>
                <li><a href="#">PRIMERA DIVISIÓN</a></li>
                    @foreach($ligas as $liga)
                        <li><a href="EncontrarLigaPlay/{{$liga->id}}">{{$liga->name}}</a></li>

                    @endforeach

                </ul>
                </li>


                <li><a>COPA</a>
                <ul>
                <li><a href="Fase1PvsP">ELIMINATORIAS</a></li>
                    @foreach($copas as $copa)
                <li><a href="EncontrarCopaPlay/{{$copa->id}}">{{$copa->name}}</a></li>

                    @endforeach
                <li><a href="Fases">PRELIMINARES 1</a></li>
                </ul>
                </li>
              <li><a href="SalaTrofeo1vs1">SALA DE TROFEOS 1VS1</a></li>
              <li><a href="Ranking1VS1">RANKING</a></li>


    </ul>


</div>

<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >




    <div style="width: 700px; height: 350px;border-radius: 10px; position:relative;top:100px;left:200px; background-color: whitesmoke;">

        <div class="container">
            <h2>Asignar Equipos</h2>







            <br></br>

            <div style="position:relative; top:200px; left:300px;" class="container">
                <form action="PVSP">
                    <button class="btn btn-primary">Enviar</button>
                </form>
            </div>




            <form action="EliminarTeamLiga" name="FormaAgregarClubaLiga" method="post" class="form-horizontal" role="form">

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="InputIdLeague" value=""/>

                <div style="position:relative; left:-40px;" class="form-group">
                    <label class="col-sm-2 control-label">Equipos:</label>
                    <div class="col-sm-4">
                        <select class="form-control" onchange="seleccionaEquipo();" id="clubSelect" name="clubSelect"  type="text" value="">
                            <option>-</option>
                            @foreach($clubes as $club)
                                @if($club->status==="Activo")
                                <option value="{{$club->id}}">{{$club->name}} - @foreach($club->users as $user) {{$user->user_name}} @endforeach</option>
                                @else


                                @endif

                            @endforeach
                        </select>
                    </div>
                </div>

            </form>
            
                     <form action="EliminarTeamLiga" name="FormaAgregarClubaLiga2" method="post" class="form-horizontal" role="form">
            
 <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="InputIdLeague" value=""/>
  <input type="hidden" id="InputIdClub" name="InputIdClub" value=""/>
  
        
         <div style="position:relative; top:-50px; left:550px;" class="container">
             <button type="submit" class="btn btn-primary">Borrar</button>
         </div>    
               </form>





        </div>


    </div>

</div>
@endsection