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
         <li><a href="Transferencias">DATOS Y ESTADISTICAS</a>    
   
        </ul>


    </div>

    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >




        <div style="width: 700px; height: 250px;border-radius: 10px; position:relative;top:100px;left:200px; background-color: whitesmoke;">

            <div class="container">
                <h2>Crear Copa PRO</h2>
                <form action="" name="FormaProCrearLiga" method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nombre de la copa:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="name" id="name" type="text" value="">
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
                        <button onclick="if(document.getElementById('name').value==''){alert('Ingresa la Información requerida');return false;}else{};"  type="submit"  class="btn btn-primary">Enviar</button>
                    </div>






                </form>
            </div>


        </div
@endsection