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
         <li><a href="BuscarClub">BUSCAR CLUB</a></li>
        </ul>
        </li>
         <li><a href="Transferencias">DATOS Y ESTADISTICAS</a> 
            </ul>
        </div>

        <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >
                 
            <div style="width: 700px; height: 500px; position:relative;top:100px;left:200px; background-color: whitesmoke;">

    <div class="container">
        <h2>Entrar a equipo</h2>
        <form action="" name="FormaAlta" method="post" class="form-horizontal" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>
            <input type="hidden" name="IdClub" value="{{$club->id}}"/>

            <div class="form-group">
                <label class="col-sm-2 control-label">Usuario:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="UsuarioInput" disabled type="text" value="{{Auth::User()->user_name}}">
                </div>
            </div>
            
            
               <div class="form-group">
                <label class="col-sm-2 control-label">Equipo:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="UsuarioInput" disabled type="text" value="{{$club->name}}">
                </div>
            </div>

            <div class="form-group">
                <label for="disabledSelect" class="col-sm-2 control-label">Posición</label>
                <div class="col-sm-5">
                    <select name="PosicionSelect" id="PosicionSelect"  class="form-control">
                        <option value="PO">PO</option>
                        <option value="DFC">DFC</option>
                        <option value="LTI">LTI</option>
                        <option value="LTD">LTD</option>
                        <option value="MCD">MCD</option>
                        <option value="MC">MC</option>
                        <option value="MI">MI</option>
                        <option value="MD">MD</option>
                        <option value="MCO">MCO</option>
                        <option value="EI">EI</option>
                        <option value="ED">ED</option>
                        <option value="DI">DI</option>
                        <option value="DD">DD</option>
                        <option value="DC">DC</option>
                    </select>
                </div>
            </div>

            <div class="container">
                <button  type="button" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>

        </form>
    </div>

</div>  
            
        </div>
@endsection
