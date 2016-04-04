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
                    <li><a href="#">CREAR CLUB</a></li>
                    <li><a href="/clubes-pro/buscar">BUSCAR CLUB</a></li>
                </ul>
            </li>
            <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a>

        </ul>
    </div>

    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">
        <div style="width:700px; height:300px; background-color:whitesmoke; position: relative; top:200px; left:300px; ">
            <div class="container">
                <form action="/EditarImagen/{{$club->id}}" name="FormaCrearClub" method="post" class="form-horizontal" role="form"
                      enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>

                    <br></br>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Usuario:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="usuario" disabled type="text"
                                   value="{{Auth::User()->user_name}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre del club:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="nombreequipo" disabled id="nEquipo" type="text" value="{{$club->name}}">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">Escudo equipo:</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" name="picture">
                        </div>
                    </div>



                    <br></br>
                    <div class="container" style="margin-top: -50px;">
                        <button type="button" class="btn btn-primary">Reset</button>
                        <button type="submit"  class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- FIN menu central -->
@endsection




