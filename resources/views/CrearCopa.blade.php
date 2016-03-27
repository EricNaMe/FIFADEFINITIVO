@extends('template')

@section('content')


<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a>CLUBES PRO</a>

        <li><a>TORNEOS VIGENTES</a>
            <ul>
                <li><a>PRIMERA DIVISIÓN</a></li>
                <li><a>SEGUNDA DIVISIÓN A</a></li>
                <li><a>SEGUNDA DIVISIÓN B</a></li>
                <li><a>TERCERA DIVISIÓN A</a></li>
                <li><a>TERCERA DIVISIÓN B</a></li>

            </ul>
        </li>


        <li><a>CLUBES</a>
            <ul>
                <li><a>BUSCAR CLUB</a></li>
                <li><a href="clubes-pro/crear">CREAR CLUB</a></li>


            </ul>
        </li>

        <li><a>JUGADORES</a>

        </li>

        <li><a>TRANSFERENCIAS</a>

        </li>


        <li><a href="RankingCP">RANKING POR CLUBES</a>
        <li><a>ADMINISTRADOR</a>
            <ul>
                <li><a>CREAR LIGA</a></li>
                <li><a>CREAR COPA</a></li>
            </ul>
        </li>
        <li><a href="Inicio">HOME</a></li>

        </li>



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

                <div class="form-group">
                    <label class="col-sm-2 control-label">Número de equipos:</label>
                    <div class="col-sm-5">
                        <input class="form-control" name="JornadasInput" id="focusedInput" type="number" min="1" max="100" value="">
                    </div>
                </div>

                <br></br>

                <div style="position:relative; left:500px;" class="container">
                    <button  type="button" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>






            </form>
        </div>


    </div>
@endsection


