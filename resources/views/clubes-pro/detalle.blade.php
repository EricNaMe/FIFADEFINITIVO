@extends('template')

@section('content')


<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a href="/Inicio">HOME</a></li>
        @if (Auth::check())
        <?php $user = Auth::user(); ?>
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
        <li>
            <a>LIGAS VIGENTES</a>
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
                <li><a href="/BuscarClub">BUSCAR CLUB</a></li>
            </ul>
        </li>
        <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a>


    </ul>


</div>

<!-- inicio menu club -->

<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">
    <div>
        <ul id="MenuPerfil" style="width: 494px;">
            <li id="ListaPerfil"><a href="#">Equipo</a></li>
            <li id="ListaPerfil"><a class="active" href="/clubes-pro/{{$proTeam->id}}/plantilla">Plantilla</a></li>
            <li id="ListaPerfil"><a href="#">Estadísticas</a></li>
            <li id="ListaPerfil"><a href="/SalaTrofeoClub">Sala de trofeos</a></li>
        </ul>
    </div>


    @if(Auth::check())
    @if(Auth::user()->user_name=="Administrador22")
    <form action="/bloquear-altas" name="FormaProCrearLiga" method="post"
          class="form-horizontal" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary">Bloquear transferencias</button>
        </div>
    </form>
    @endif

    @if(Auth::user()->user_name=="Administrador22")
    @if($proTeam->inscriptions_locked)
    {{Form::open([
                  'url' => "/desbloquear-altas" ,
                  'method' => 'post'
                  ])}}
    <button type="submit" class="btn btn-info">
        Desbloquear altas de transferencias
    </button>
    {{Form::close()}}
    @endif
    @endif
    @endif

    @if(Auth::check())

    @if(Auth::user()->id == $proTeam->getDT()->id)
    <form action="/EditarClubPro/{{$proTeam->id}}" name="FormaProCrearLiga" method="post" class="form-horizontal" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-danger">
            Editar Imagen  
        </button>
    </form>
    @else
    @if($DT2=$proTeam->getDT2() && $proTeam->getDT2()->id==Auth::user()->id)
    <form action="/EditarClubPro/{{$proTeam->id}}" name="FormaProCrearLiga" method="post" class="form-horizontal" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-danger">
            Editar Imagen  
        </button>
    </form>
    @endif
    @endif
    @endif
    <div class="row">
        <div class="col-lg-4 col-lg-offset-2" style=" ">
            <div style="background-color: white; height: 150px;    background-size:cover;">
                <div class="col-lg-5 col-lg-offset-4"  style="background-color: green; height:150px;"></div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div  class="col-lg-4 col-lg-offset-2">
            <div style="background-color: white;">
                <ul id="ListaDatosPerfil2">
                    <li style="background-color: #080808;">
                        <a style="font-weight: bold; color: white; font-size: 30px;text-align: center;">
                            {{$proTeam->name}}
                            @if(Auth::check())
                            @if(! $status = $proTeam->isInTeamStatus(Auth::user()))
                            @if(!Auth::user()->isInAnyTeam())
                            <a style="position:relative;left:100px;" href="/clubes-pro/{{$proTeam->id}}/unirte"
                               class="btn btn-primary">
                                Solicitar entrada
                            </a>
                            @endif
                            @else
                            {{Form::open([
                                              'url' => "/clubes-pro/$proTeam->id/baja/me" ,
                                              'method' => 'delete'
                                              ])}}
                            <button type="submit"
                                    class="btn btn-danger">
                                Baja de equipo
                            </button>
                            {{Form::close()}}


                            @if(Auth::user()->user_name == "Administrador22")
                            @if($proTeam->inscriptions_locked)
                            {{Form::open([
                                                      'url' => "/desbloquear-altas" ,
                                                      'method' => 'post'
                                                      ])}}
                            <button type="submit" class="btn btn-info">
                                Desbloquear altas de transferencias
                            </button>
                            {{Form::close()}}
                            @else
                            {{Form::open([
                                                     'url' => "/bloquear-altas" ,
                                                     'method' => 'post'
                                                     ])}}
                            <button type="submit" class="btn btn-warning">
                                Bloquear altas de transferencias
                            </button>
                            {{Form::close()}}
                            @endif
                            @endif
                            @endif
                            @endif
                        </a>
                    </li>
                    <li><a style="font-weight: bold;">Lema:</a><a style="float:right;">{{$proTeam->quote}}</a></li>
                    <li><a style="font-weight: bold;">Consola:</a><a style="float:right;">xbox</a>
                    </li>


                    <li><a style="font-weight: bold;">Rank:</a><a style="float:right;">4</a></li>
                    <!--<li><a style="font-weight: bold;">Estado:</a><a style="float:right;">{{$proTeam->state}}</a></li>-->
                    <li style="border-bottom: none;"><a style="font-weight: bold;">Experiencia:</a><a
                            style="float:right;">{{$proTeam->id}}</a></li>
                </ul>

            </div>
        </div>


        <div  class="col-lg-3 ">
            <div style="background-color: white;">
                <ul id="ListaDatosPerfil">
                    <li style="background-color: #080808;"><a style="font-weight: bold; color: white">Estadísticas generales</a></li>
                    <li><a style="font-weight: bold;">Juegos jugados:</a><a style="float:right;">{{$proTeam->JJ}}</a></li>
                    <li><a style="font-weight: bold;">Juegos ganados:</a><a style="float:right;">{{$proTeam->JG}}</a></li>
                    <li><a style="font-weight: bold;">Juegos empatados:</a><a style="float:right;">{{$proTeam->JE}}</a></li>
                    <li><a style="font-weight: bold;">Juegos perdidos:</a><a style="float:right;">{{$proTeam->JP}}</a></li>
                    <li><a style="font-weight: bold;">Puntos:</a><a style="float:right;">{{$proTeam->points}}</a></li>
                    <li><a style="font-weight: bold;">Goles a Favor:</a><a style="float:right;">{{$proTeam->GF}}</a></li>
                    <li><a style="font-weight: bold;">Goles en contra:</a><a style="float:right;">{{$proTeam->GC}}</a></li>

                </ul>
            </div>
        </div>

    </div>  

</div>

</div>


@endsection




