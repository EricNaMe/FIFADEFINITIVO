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
         <li><a href="/clubes-pro/buscar">BUSCAR CLUB</a></li>
        </ul>
        </li>
         <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a>    
   
        </ul>


    </div>

    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >




        <div style="width: 700px; height: 250px;border-radius: 10px; position:relative;top:100px;left:200px; background-color: whitesmoke;">

            <div class="container">
                <h2>MODIFICAR LIGA PRO</h2>
                <form action="EscogerLigaPro" name="FormaProCrearLiga" method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>


                    <h4>ESCOGE LA LIGA QUE QUIERAS MODIFICAR</h4>
                    <div style="position:relative; left:-40px;" class="form-group">
                        <label class="col-sm-2 control-label">Ligas:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="leagueSelect"  type="text" value="">
                             
                                 <option value=""></option>
                                @foreach($ligas as $liga)
                                    <option value="{{$liga->id}}">{{$liga->name}}</option>
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
