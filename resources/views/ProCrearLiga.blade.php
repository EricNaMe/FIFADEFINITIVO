@extends('template')

@section('content')


    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
            <li><a href="Inicio">HOME</a></li>
            <li><a>ADMINISTRADOR</a>
                <ul>
                    <li><a href="#">CREAR LIGA</a></li>
                    <li><a href="/ProCrearCopa">CREAR COPA</a></li>
                    <li><a href="/ModificarLigaPro">MODIFICAR LIGA</a></li>
                    <li><a href="/ModificarCopaPro">MODIFICAR COPA</a></li>
                </ul>
            </li>

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
                    <li><a href="clubes-pro/buscar">BUSCAR CLUB</a></li>
                </ul>
            </li>

            <li><a href="Transferencias">TRANSFERENCIAS</a>
            </li>
            <li><a href="RankingCP">RANKING POR CLUBES</a>
            </li>
            <li><a href="Equipo_CP">EQUIPO DE LA SEMANA</a>
            </li>
            <li><a href="Equipo_CP">EQUIPO DE LA TEMPORADA</a>
            </li>
            <li><a href="SalaTrofeosCP">SALA DE TROFEOS</a>
            </li>

        </ul>


    </div>

    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >




        <div style="width: 700px; height: 250px;border-radius: 10px; position:relative;top:100px;left:200px; background-color: whitesmoke;">

            <div class="container">
                <h2>Crear Liga PRO</h2>
                <form action="" name="FormaProCrearLiga" method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre de liga:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="name"  type="text" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Número de jornadas:</label>
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

        <!--     <div style=" background:url(/images/CPSemana.jpg);background-color: yellow; width: 225px; height:356px; top:100px; left:600px; position:relative;">



                 <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/werux/avatar-body.png); background-size:cover;  display:inline-block; margin-top: 20px;margin-left: 20px; width: 100px; height: 200px;">
                 <div style="background:url(/images/Clausura/3.png); background-size: cover; width: 70px; height:70px; position:relative; top:40px; margin-left: 40px;"></div>



           </div> -->


    </div>
@endsection