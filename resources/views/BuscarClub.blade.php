@extends('template')

@section('content')


    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
            <li><a href="Inicio">HOME</a></li>
            <li><a>ADMINISTRADOR</a>
                <ul>
                    <li><a href="/ProCrearLiga">CREAR LIGA</a></li>
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
                    <li><a href="#">BUSCAR CLUB</a></li>
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


        <div style="width: 500px; height:80px;background-color: whitesmoke; position:relative; top:100px; left:200px; ">
            <form action="" name="formBuscar" method="post" class="form-horizontal" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Buscar:</label>
                    <div class="col-sm-5">
                        <input class="form-control" name="BuscarInput" type="text" value="">
                    </div>
                </div>
                <div class="container">
                    <button  type="button" class="btn btn-primary">Reset</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>




        <div id="TablaPrimera" style="position: absolute; top:30%; left:10%;">
            <table>
                <thead>
                <tr>
                    <th>Número</th>
                    <th>Equipo</th>
                    <th>DT</th>
                    <th>Pts</th>

                </tr>
                </thead>






                <tr>
                    <td><div id="PosicionTabla">   1</div></td>
                    <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(/images/Clausura/1.png); background-size:cover;"></div><a href="clubes-pro">Nombre equipo</a></td>
                    <td>Manager</td>
                    <td>Puntos</td>
                    <td>ss</td>



                </tr>

            </table>
        </div>




    </div>



    <script>
@endsection

