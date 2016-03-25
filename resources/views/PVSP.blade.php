@extends('template')

@section('content')
        
        <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>1 VS 1</a>
              <li><a href="Inicio">HOME</a></li>
              <li><a>ADMINISTRADOR</a>
                  <ul>
                      <li><a href="CrearLiga">CREAR LIGA</a></li>
                      <li><a href="CrearCopa">CREAR COPA</a></li>
                      <li><a href="Divisiones">ASIGNAR EQUIPOS</a></li>
                      <li><a href="EliminarEquiposPvsP">ELIMINAR EQUIPOS</a></li>
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
                <li><a href="Fase1PvsP">FASE 1</a></li>
                    @foreach($copas as $copa)
                <li><a href="EncontrarCopaPlay/{{$copa->id}}">{{$copa->name}}</a></li>

                    @endforeach
                
                </ul>
                </li>
              <li><a href="#">SALA DE TROFEOS 1VS1</a></li>
              <li><a href="Ranking1VS1">RANKING</a></li>


            </ul>
            
            
        </div>

        @include('partial.navbar')

        
        <div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover;" >

            <div>
                <ul id="MenuPerfil" style="width: 410px;">
                    <li id="ListaPerfil"><a href="#">Tabla general</a></li>
                    <li id="ListaPerfil"><a class="active" href="PvsPCalendario">Calendario</a></li>
                    <li id="ListaPerfil"><a class="active" href="#">Campeón</a></li>


                </ul>

            </div>

            <div id="TablaPrimera" style="position: absolute; top:20%; left:10%;">


                <table>
                    <thead>
                    <tr>
                        <th>Número</th>
                        <th>Equipo</th>
                        <th>Jugador</th>

                    </tr>
                    </thead>
                    <?php
                        $i=1;

                    ?>
                    @foreach($teams as $team)
                    <tr>
                        @if($team->status==="Activo")
                        <td><div id="PosicionTabla">{{$i}}</div></td>
                        <td style="text-align:left;">{{$team->name}}</td>
                        @foreach($team->users as $user)
                        <td>{{$user->user_name}}</td>
                        @endforeach

                       <?php $i++;?>
                       @endif
                    </tr>
                        @endforeach




                </table>
</div>
        </div
@endsection