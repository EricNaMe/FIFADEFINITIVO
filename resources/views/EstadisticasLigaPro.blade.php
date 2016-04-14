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
        <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a>

    </ul>


</div>

<style>
    th {
        text-align: center;
    }

    #MenuEstadisticas {
        list-style-type: none;
        margin-top: 40px;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        width: 500px;
        margin-left: 100px;
    }
</style>

<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">


    <div>
        <ul id="MenuPerfil" style="width: 580px;">
            <li id="ListaPerfil"><a href="#">Tabla general</a></li>
            <li id="ListaPerfil"><a class="active" href="/ProCalendarioEnc/">Calendario</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Estadísticas</a></li>
            <li id="ListaPerfil"><a href="/SalaTrofeosCP">Campeones</a></li>

        </ul>

    </div>

    <div>
        <ul id="MenuEstadisticas" style="width: 120px;">
            <li id="ListaPerfil"><a href="/GoleadoresLigaPro">Top Goleadores</a></li>
            <li id="ListaPerfil"><a class="active" href="/ProCalendarioEnc/">Top Asistentes</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Top Porteros</a></li>
            <li id="ListaPerfil"><a href="/SalaTrofeosCP">Top mejor jugador</a></li>

        </ul>

    </div>


    @if($UsuarioVal==1)
    <div id="TablaPrimeraClubesPro" style="position: absolute; top:20%; left:22%; max-height:400px;">
        <table>
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Jugador</th>
                    <th>Goles</th>
                </tr>
            </thead>
            <?php $i = 1;
            
            for($j=0;$j<=count($UsuariosEquipoNombre);$j++){
            ?>
          
            <tr>
                <td>
                    <div id="PosicionTabla">
                        {{$i}}</div>
                </td>
                
                
                <td>
                    <a href="/PerfilDetalles/">
                        {{$UsuariosEquipoNombre[$j]}}
                    </a>
                </td>
             
            
                <td style="text-align: left;">
                    
                    <a>
                        {{$UsuariosEquipoGoles[$j]}}
                    </a>
                </td>
                
            <?php }$i++; ?>
            </tr>
           
        </table>
    </div>

    @endif


</div>


@endsection