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

    td{
        font-size: 16px;
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
            <li id="ListaPerfil"><a href="/EncontrarLiga/{{$League->id}}">Tabla general</a></li>
            <li id="ListaPerfil"><a class="active" href="/ProCalendarioEnc/{{$League->id}}">Calendario</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Estadísticas</a></li>
            <li id="ListaPerfil"><a href="/SalaTrofeosCP">Campeones</a></li>

        </ul>

    </div>

    <div>
        <ul id="MenuEstadisticas" style="width: 120px;">
            <li id="ListaPerfil"><a href="/GoleadoresProLiga/{{$League->id}}">Top Goleadores</a></li>
            <li id="ListaPerfil"><a class="active" href="/AsistenciasProLiga/{{$League->id}}">Top Asistentes</a></li>
            <li id="ListaPerfil"><a class="active" href="/PorterosImbatidosProLiga/{{$League->id}}">Top Porteros</a></li>
            <li id="ListaPerfil"><a href="/MejoresJugadoresProLiga/{{$League->id}}">Top mejor jugador</a></li>
            <li id="ListaPerfil"><a href="/DefensasImbatidasProLiga/{{$League->id}}">Top defensa</a></li>

        </ul>

    </div>


    @if($UsuarioVal==1)
    <div id="TablaPrimeraClubesPro" style="position: absolute; top:20%; left:22%; max-height:400px;">
        <table>
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Club</th>
                    <th>Jugador</th>
                    <th>Goles</th>
                </tr>
            </thead>
            <?php $i = 1;
            
       
            ?>
          @foreach($GoleadoresLiga as $usuariosLiga)
            <tr>
                <td>
                    <div id="PosicionTabla">
                        {{$i}}</div>
                </td>                
                <td>
                    @foreach($usuariosLiga->proTeams as $clubesUsuarios)  
                    <img src="{{$clubesUsuarios->getImageUrl()}}">
                    <div style="background:url(); background-size:90px 80px;"></div>
                    <a>{{$clubesUsuarios->name}}</a>
                    @endforeach
       
                </td>
              
                <td>
                    @if($usuariosLiga->gamertag==null)

                    @else

                    <img src="{{$UsuariosLiga->getAvatar()}}">

                    <div style="background:url();
                          background-size:90px 80px;"></div>
                    @endif
                    <a href="/PerfilDetalles/{{$usuariosLiga->id}}">
                        {{$usuariosLiga->user_name}}
                    </a>
                </td>
             
            
                <td style="text-align: center;">
                    
                    <a>
                    {{$usuariosLiga->goals}}
                    </a>
                </td>
                
            <?php $i++; ?>
            </tr>
           @endforeach
        </table>
    </div>

    @endif


</div>


    @if($UsuarioVal==3)
    <div id="TablaPrimeraClubesPro" style="position: absolute; top:28%; left:42%; max-height:400px;">
        <table>
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Club</th>
                    <th>Jugador</th>
                    <th>Asistencias</th>
                </tr>
            </thead>
            <?php $i = 1;
            
       
            ?>
          @foreach($AsistenciasLiga as $usuariosAsistLiga)
            <tr>
                <td>
                    <div id="PosicionTabla">
                        {{$i}}</div>
                </td>
                
                
                <td>
               @foreach($usuariosAsistLiga->proTeams as $clubesUsuarios)
                   
                    
                    
                      <img src="{{$clubesUsuarios->getImageUrl()}}">
                    <div style="background:url();
                          background-size:90px 80px;"></div>
                    <a>{{$clubesUsuarios->name}}</a>
                    @endforeach
       
                </td>
                
                <td>
                    @if($usuariosAsistLiga->gamertag==null)

                    @else

                      
                          <img src="{{$usuariosAsistLiga->getAvatar()}}">
                        <div style="background:url();
                          background-size:90px 80px;"></div>
                    @endif
                    <a href="/PerfilDetalles/{{$usuariosAsistLiga->id}}">
                        {{$usuariosAsistLiga->user_name}}
                    </a>
                </td>
             
            
                <td style="text-align: center;">
                    
                    <a>
                    {{$usuariosAsistLiga->assistance}}
                    </a>
                </td>
                
            <?php $i++; ?>
            </tr>
           @endforeach
        </table>
    </div>

    @endif
    
        @if($UsuarioVal==4)
    <div id="TablaPrimeraClubesPro" style="position: absolute; top:28%; left:42%; max-height:400px;">
        <table>
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Club</th>
                    <th>Jugador</th>
                    <th>Partidos imbatidos</th>
                </tr>
            </thead>
            <?php $i = 1;
            
       
            ?>
          @foreach($PorterosImbatidos as $usuariosPorLiga)
            <tr>
                <td>
                    <div id="PosicionTabla">
                        {{$i}}</div>
                </td>
                
                
               <td>
               @foreach($usuariosPorLiga->proTeams as $clubesUsuarios)
                   
                     <img src="{{$clubesUsuarios->getImageUrl()}}">
                     

                    <div style="background:url();
                          background-size:90px 80px;"></div>
                    <a>{{$clubesUsuarios->name}}</a>
                    @endforeach
       
                </td>
                
                
                <td>
                    @if($usuariosPorLiga->gamertag==null)

                    @else

                       
                        <img src="{{$usuariosPorLiga->getAvatar()}}">
                        <div style="background:url();
                          background-size:90px 80px;"></div>
                    @endif
                    <a href="/PerfilDetalles/{{$usuariosPorLiga->id}}">
                        {{$usuariosPorLiga->user_name}}
                    </a>
                </td>
             
            
                <td style="text-align: center;">
                    
                    <a>
                    {{$usuariosPorLiga->gk_unbeaten}}
                    </a>
                </td>
                
            <?php $i++; ?>
            </tr>
           @endforeach
        </table>
    </div>

    @endif
    
           @if($UsuarioVal==5)
    <div id="TablaPrimeraClubesPro" style="position: absolute; top:28%; left:42%; max-height:400px;">
        <table>
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Club</th>
                    <th>Jugador</th>
                    <th>Jugador del partido</th>
                </tr>
            </thead>
            <?php $i = 1;
            
       
            ?>
          @foreach($MejorJugadorOrdenado as $usuariosPorLiga)
            <tr>
                <td>
                    <div id="PosicionTabla">
                        {{$i}}</div>
                </td>
                
                <td>
               @foreach($usuariosPorLiga->proTeams as $clubesUsuarios)
                   
                    
                     <img src="{{$clubesUsuarios->getImageUrl()}}">

                    <div style="background:url();
                          background-size:90px 80px;"></div>
                    <a>{{$clubesUsuarios->name}}</a>
                    @endforeach
       
                </td>
                <td>
                    @if($usuariosPorLiga->gamertag==null)

                    @else

                        <img src="{{$usuariosPorLiga->getAvatar()}}">

                        <div style="background:url();
                          background-size:90px 80px;"></div>
                    @endif
                    <a href="/PerfilDetalles/{{$usuariosPorLiga->id}}">
                        {{$usuariosPorLiga->user_name}}
                    </a>
                </td>
             
            
                <td style="text-align: center;">
                    
                    <a>
                    {{$usuariosPorLiga->best_player}}
                    </a>
                </td>
                
            <?php $i++; ?>
            </tr>
           @endforeach
        </table>
    </div>

    @endif
    
    
       @if($UsuarioVal==6)
    <div id="TablaPrimeraClubesPro" style="position: absolute; top:28%; left:42%; max-height:400px;">
        <table>
            <thead>
                <tr>
                    <th>Posición</th>
                    <th>Club</th>
                    <th>Jugador</th>
                    <th>Defensa imbatida</th>
                </tr>
            </thead>
            <?php $i = 1;
            
       
            ?>
          @foreach($DefensaImbatidaOrdenado as $usuariosPorLiga)
            <tr>
                <td>
                    <div id="PosicionTabla">
                        {{$i}}</div>
                </td>
                
                <td>
               @foreach($usuariosPorLiga->proTeams as $clubesUsuarios)
                   
                    
                     <img src="{{$clubesUsuarios->getImageUrl()}}">

                    <div style="background:url();
                          background-size:90px 80px;"></div>
                    <a>{{$clubesUsuarios->name}}</a>
                    @endforeach
       
                </td>
                <td>
                    @if($usuariosPorLiga->gamertag==null)

                    @else

                        <img src="{{$usuariosPorLiga->getAvatar()}}">

                        <div style="background:url();
                          background-size:90px 80px;"></div>
                    @endif
                    <a href="/PerfilDetalles/{{$usuariosPorLiga->id}}">
                        {{$usuariosPorLiga->user_name}}
                    </a>
                </td>
             
            
                <td style="text-align: center;">
                    
                    <a>
                    {{$usuariosPorLiga->defence_unbeaten}}
                    </a>
                </td>
                
            <?php $i++; ?>
            </tr>
           @endforeach
        </table>
    </div>

    @endif

    





@endsection