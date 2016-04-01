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
         <li><a href="/BuscarClub">BUSCAR CLUB</a></li>
        </ul>
        </li>
         <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a> 
        </ul>


    </div>

    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg);
    background-size: cover;" >
        <div style="text-align: center; width: 1000px;">
            <div style="width: 500px; margin: 20px; padding: 20px; box-sizing: content-box;
        height:80px;background-color: whitesmoke;
        display: inline-block; position: relative">
                <form action="" name="search" method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Buscar:</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="search" type="text" value="{{$search}}">
                        </div>
                    </div>
                    <div >
                        <button type="button" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                </form>
            </div>
            <br/>
            <style>
                th{
                    text-align:center;
                }
            
            </style>
            <div id="TablaPrimera" style="display: inline-block">
                <table>
                    <thead>
                    <tr>
                        <th>Número</th>
                        <th>Equipo</th>
                        <th>DT</th>
                       
                    </tr>
                    </thead>
                    @foreach($pro_team_search as $proTeam)
                        <tr>
                            <td>
                                <div style="" id="PosicionTabla"> {{$proTeam->id}}</div>
                            </td>
                            <td style="text-align:left;">
                                <div id="LogoEquipo"
                                     style=" background:url({{$proTeam->getImageUrl()}}); background-size:cover;"></div>
                                <a href="clubes-pro/{{$proTeam->id}}">{{$proTeam->name}}</a></td>
                            <td>{{$proTeam->getDT()?$proTeam->getDT()->user_name:''}}</td>
                           

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

    </div>
@endsection

