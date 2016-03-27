@extends('template')

@section('content')


<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a>CLUBES PRO</a>

        <li><a>TORNEOS VIGENTES</a>
            <ul>


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
            <h2>MODIFICAR COPA</h2>
            <form action="ModificarCopa" name="FormaProCrearLiga" method="post" class="form-horizontal" role="form">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>


                <h4>ESCOGE LA COPA QUE QUIERAS MODIFICAR</h4>
                <div style="position:relative; left:-40px;" class="form-group">
                    <label class="col-sm-2 control-label">Ligas:</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="leagueSelect"  type="text" value="">
                            @foreach($copas as $copa)
                                <option value="{{$copa->id}}">{{$copa->name}}</option>
                            @endforeach
                        </select>
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


