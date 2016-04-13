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
              <li><a href="/ModificarDatosLigaPro">MODIFICAR TABLA DE LIGA</a></li>
          </ul>
      </li>
            <script>
                alert("funciona admin")
            </script>
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
        <li><a href="/clubes-pro/crear">CREAR CLUB</a></li>
         <li><a href="/clubes-pro/buscar">BUSCAR CLUB</a></li>
        </ul>
        </li>
         <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a>    
    </ul>
    </div>

    @include('partial.navbar')




    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">




        <br></br>

        
        @if(Auth::user()->user_name=="Administrador22")
          <form action="/ReportarResultadosProAdmin" onsubmit="document.forms['FormaReportarLiga']['enviar'].disabled=true;" name="FormaReportarLiga" method="post"
              class="form-horizontal" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="InputPartido" value="{{$partido->id}}">
        <div style="background-color: white; margin-top: 30px;" class="col-lg-6">


            <div class="col-sm-12">
                <div class="col-sm-3">
                    <div class="col-xs-6">
                        <label class="" for="usr">{{$EquipoLocal->name}}</label>
                    </div>
                    <div class="col-xs-4">
                        <div id=""
                             style="height:40px; width:40px; background:url({{$EquipoLocal->getImageUrl()}});  background-size:cover;"></div>
                    </div>
                </div>

                <div class="col-xs-1" style="width:14%;">
                    <input type="number" min="0" name="InputMarcadorLocal" class="col-md-2 form-control" id="usr">
                </div>
                <div class="col-xs-1">
                    <a>VS</a>
                </div>
                <div class="col-xs-1" style="width:14%;">
                    <input type="number" min="0" name="InputMarcadorVisitante" class="col-md-2 form-control" id="usr">
                </div>

                <div class="col-sm-3">
                    <div class="col-xs-4">
                        <div id="" style="height:40px; width:40px; background:url({{$EquipoVisitante->getImageUrl()}});  background-size:cover;"></div>
                    </div>

                    <div class="col-xs-6">
                        <label class="" for="usr">{{$EquipoVisitante->name}}</label>
                    </div>

                </div>







            </div>


            <div class="col-sm-9">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
            </form>
        
        @endif

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