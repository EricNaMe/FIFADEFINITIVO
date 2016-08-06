@extends('template')

@section('content')


    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
                      <li><a href="Inicio">HOME</a></li>

            @if (Auth::check())
                <?php $user=Auth::user();
                ?>

                @if($user->user_name==="Administrador22")
                    <li><a>ADMINISTRADOR</a>
                        <ul>
                            <li><a href="CrearLiga">CREAR LIGA</a></li>
                            <li><a href="#">CREAR COPA</a></li>
                            <li><a href="Divisiones">ASIGNAR EQUIPOS</a></li>
                            <li><a href="EliminarEquiposPvsP">ELIMINAR EQUIPOS</a></li>
                            <li><a href="ModificarLiga">MODIFICAR LIGA</a></li>
                            <li><a href="ModificarCopa">MODIFICAR COPA</a></li>


                        </ul>
                    </li>

                @endif
            @endif


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




        <div style="width: 700px; height: 250px;border-radius: 10px; position:relative;top:100px;left:200px; background-color: whitesmoke;">

            <div class="container">
                <h2>Crear Copa 1 vs 1</h2>
                <form action="CrearCopaPlayer" name="FormaProCrearLiga" method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre de la copa:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="name"  type="text" value="">
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Número de equipos:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="JornadasInput" id="focusedInput" type="number" min="1" max="100" value="">
                        </div>
                    </div>
                    -->

                    <br></br>

                    <div style="position:relative; left:500px;" class="container">
                        <button  type="button" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>






                </form>
            </div>


        </div>
@endsection

