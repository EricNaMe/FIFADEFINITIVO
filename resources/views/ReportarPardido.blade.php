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
                              <li><a href="/CrearLiga">CREAR LIGA</a></li>
                              <li><a href="/CrearCopa">CREAR COPA</a></li>
                              <li><a href="/Divisiones">ASIGNAR EQUIPOS</a></li>
                              <li><a href="/EliminarEquiposPvsP">ELIMINAR EQUIPOS</a></li>
                              <li><a href="/ModificarLiga">MODIFICAR LIGA</a></li>
                              <li><a href="/ModificarCopa">MODIFICAR COPA</a></li>


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




    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">


         <form action="/ReportarResultadosPvsP" name="FormaProCrearLiga" method="post" class="form-horizontal"
                      role="form">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <input type="hidden" name="EquipoLocalInput" value="{{$EquipoLocal->id}}"/>
             <input type="hidden" name="EquipoVisitanteInput" value="{{$EquipoVisitante->id}}"/>
             <input type="hidden" name="calendarioInput" value="{{$calendario->id}}"/>
         <div style="background-color: whitesmoke; margin-top: 200px;"  class="col-lg-7 col-lg-offset-2">


            <div class="col-sm-12">
                <div class="col-xs-3">
                    <label class="" for="usr">{{$EquipoLocal->name}}</label><img style="width:35px; height:35px;" src="{{$EquipoLocal->getImageUrl()}}">
                </div>
                <div class="col-xs-1" style="width:14%;">
                    <input type="number" min="0"  name="LocalInput" class="col-md-2 form-control" id="usr">
                </div>
                <div class="col-xs-1">
                    <a>VS</a>
                </div>
                <div class="col-xs-1" style="width:14%;">
                    <input type="number" min="0" name="VisitorInput" class="col-md-2 form-control" id="usr">
                </div>

                <div class="col-xs-4">
                   <img style="width:35px; height:35px;" src="{{$EquipoVisitante->getImageUrl()}}"> <label class=""  for="usr">{{$EquipoVisitante->name}}</label>
                </div>
            </div>


            <div style="padding-bottom:20px; margin-top: 40px;" class="col-sm-9 col-sm-offset-8">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
            </form>



    </div>

        <script>

            $(document).ready(function () {
                $('#ListaMenuLateral > li > a').click(function () {
                    if ($(this).attr('class') != 'active') {
                        $('#ListaMenuLateral li ul').slideUp();
                        $(this).next().slideToggle();
                        $('#ListaMenuLateral li a').removeClass('active');
                        $(this).addClass('active');
                    }
                });
            });
        </script>
@endsection