@extends('template')

@section('content')
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
              <li><a href="/ModificarDatosLigaPro">MODIFICAR TABLA DE LIGA</a></li>


          </ul>
      </li>
            <script>
                alert("funciona admin")
            </script>
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
        <li><a href="/clubes-pro/jugadores-sin-club">JUGADORES SIN CLUB</a></li>
        </ul>
        </li>
         <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a> </li>

    </ul>
    </div>

    @include('partial.navbar')

    <style>
        th{
            text-align: center;
        }
    </style>
    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >
        <div>
            <ul id="MenuPerfil" style="position:relative; left:170px;width: 230px;">
                <li id="ListaPerfil"><a href="#">EQUIPOS SUSCRITOS</a></li>
            </ul>
        </div>

        <div id="TablaPrimeraClubesPro" style="position: absolute; top:20%; left:22%; max-height:400px;">
            <table>
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Equipo</th>
                        <th>DT</th>
                    </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach($clubes as $club)
                    <tr>
                        <td>
                            <div id="PosicionTabla">
                                {{$i}}</div>
                        </td>
                        <td style="text-align: left;"><div id="LogoEquipo" style=" background:url({{$club->getImageUrl()}}); background-size:cover;">
                            </div>
                            <a href="/clubes-pro/{{$club->id}}">
                                {{$club->name}}
                            </a>
                        </td>
                        @foreach($club->users as $user)
                            @if($user->pivot->position==="DT")
                            <td>
                                <a href="/PerfilDetalles/{{$user->id}}">
                                    {{$user->user_name}}
                                </a>
                            </td>
                            @endif
                        @endforeach
                        <?php $i++; ?>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection



