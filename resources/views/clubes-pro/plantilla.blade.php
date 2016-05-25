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
                    </ul>
                </li>

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
         <li><a href="/BuscarClub">BUSCAR CLUB</a></li>
        </ul>
        </li>
         <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a>
    </ul>
</div>

<!-- inicio menu club -->
<style>
    #MenuPerfil {
        list-style-type: none;
        margin-top: 40px;
        padding: 0;
        overflow: hidden;
        background-color: #333;
        width: 500px;
        margin-left: 300px;
    }

    #ListaPerfil {
        float: left;
    }

    #ListaPerfil a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 20px 25px;
        text-decoration: none;
        font-family: sans-serif;
        font-weight: bold;
    }

    #ListaPerfil a:hover {
        background-color: #111;
    }

    #ListaDatosPerfil {
        list-style: none;
        padding-left: 0px;
    }

    #ListaDatosPerfil li {
        border-bottom: groove;

        padding: 11px 13px;
        font-size: 16px;
        font-family: sans-serif;
    }

    #ListaPerfil {

    }

    #ListaDatosPerfil2 {
        list-style: none;
        padding-left: 0px;
    }

    #ListaDatosPerfil2 li {
        border-bottom: groove;
        padding: 20px 25px;
        font-size: 16px;
        font-family: sans-serif;
    }

    #ListaDatosPerfil2 li:last-child {
        border-bottom: none;
        padding: 20px 25px;
        font-size: 16px;
        font-family: sans-serif;
    }



    #ListaDatosPerfil3 {
        list-style: none;
        padding-left: 0px;
    }


</style>

<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">

    <div>
        <ul id="MenuPerfil" style="width: 494px;">
            <li id="ListaPerfil"><a href="/clubes-pro/{{$proTeam->id}}">Equipo</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Plantilla</a></li>
            <li id="ListaPerfil"><a href="#">Estadísticas</a></li>
            <li id="ListaPerfil"><a href="/SalaTrofeoClub">Sala de trofeos</a></li>
        </ul>

    </div>

    <div style="background-color: white;  position:relative; top:50px; left:100px; width: 300px; height: auto;">
        <div>
            <ul id="ListaDatosPerfil2">
                <li style="background-color: #080808;">
                    <a style="font-weight: bold;
                        color: white; font-size: 20px;text-align: center;">Plantilla</a>
                </li>
                <table>
                    <tbody>
                    @foreach($proTeam->users as $user)
                        <tr>
                            <td style="font-weight: bold;">
                                <div id="LogoEquipo"
                                     style=" background:url({{$user->getAvatar()}}); background-size:cover;"></div>
                            </td>
                            @if($user->playerGamertag()==null)
                            <td>
                                <a href="/PerfilDetalles/{{$user->id}}">
                                    {{$user->playerName()}}
                                </a>
                            </td>
                            @else
                                <td>
                                    <a href="/PerfilDetalles/{{$user->id}}">
                                        {{$user->playerGamertag()}}
                                    </a>
                                </td>
                            @endif

                            <td style="font-weight: bold; ">
                                {{$user->pivot->position}}
                            </td>
                            <td style="font-weight: bold; ">
                                {{$user->pivot->status}}
                            </td>
                            <td>
                                @if($user->pivot->status == 'pending'
                                    && ($proTeam->getDT()->id == Auth::user()->id))
                                    {{Form::open([
                                        'url' => "/clubes-pro/$proTeam->id/autorizar/$user->id" ,
                                        'method' => 'put'
                                        ])}}
                                        <button type="submit"
                                                class="btn btn-success">
                                            Autorizar
                                        </button>
                                    {{Form::close()}}
                                    {{Form::open([
                                        'url' => "/clubes-pro/$proTeam->id/denegar/$user->id" ,
                                        'method' => 'put'
                                    ])}}
                                    <button type="submit"
                                            class="btn btn-danger">
                                        Denegar
                                    </button>
                                    {{Form::close()}}
                   
                                    @else
                                    @if(Auth::check() && $proTeam->getDT()->id==Auth::user()->id)
                                        {{Form::open([
                                        'url' => "/clubes-pro/$proTeam->id/denegar/$user->id" ,
                                        'method' => 'put'
                                        ])}}
                                        <button type="submit"
                                                class="btn btn-success">
                                            Dar de baja
                                        </button>
                                    {{Form::close()}}
                                    @endif
                                @endif
                                      @if($dt2=$proTeam->getDT2())  
                                       @if($user->pivot->status == 'pending'
                                    && ($proTeam->getDT2()->id == Auth::user()->id))
                                    {{Form::open([
                                        'url' => "/clubes-pro/$proTeam->id/autorizar/$user->id" ,
                                        'method' => 'put'
                                        ])}}
                                        <button type="submit"
                                                class="btn btn-success">
                                            Autorizar
                                        </button>
                                    {{Form::close()}}
                                    {{Form::open([
                                        'url' => "/clubes-pro/$proTeam->id/denegar/$user->id" ,
                                        'method' => 'put'
                                    ])}}
                                    <button type="submit"
                                            class="btn btn-danger">
                                        Denegar
                                    </button>
                                    {{Form::close()}}
                   
                                    @else
                                    @if(Auth::check() && $proTeam->getDT2()->id==Auth::user()->id)
                                        {{Form::open([
                                        'url' => "/clubes-pro/$proTeam->id/denegar/$user->id" ,
                                        'method' => 'put'
                                        ])}}
                                        <button type="submit"
                                                class="btn btn-success">
                                            Dar de baja
                                        </button>
                                    {{Form::close()}}
                                    @endif
                                @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </ul>
        </div>
    </div>

    <div style="background-color: white;  position:absolute;z-index: 10; top:150px; left:550px; width: 300px; height: auto;">
        @if($dt = $proTeam->getDT())
       
        <div>
            <ul id="ListaDatosPerfil2">
                <li style="background-color: #080808;">
                    <a tyle="font-weight: bold; color: white; font-size: 20px;text-align: center;">Managers</a>
                </li>

                <li>
                    <a style="font-weight: bold;">
                        <div id="LogoEquipo" style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{$user->playerGamertag()}}/avatarpic-l.png);
                                    background-size:cover;"></div>

                    </a>
                    @if($dt->playerGamertag()==null)
                    <a style="" href="/PerfilDetalles/{{$dt->id}}">
                        {{$dt->playerName()}}
                    </a>
                    @else
                        <a style="" href="/PerfilDetalles/{{$dt->id}}">
                            {{$dt->playerGamertag()}}
                        </a>
                    @endif
                    <a style="float:right;"></a>
                </li>
                 @if($dt2 = $proTeam->getDT2())
                  <li>
                    <a style="font-weight: bold;">
                        <div id="LogoEquipo" style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{$user->playerGamertag()}}/avatarpic-l.png);
                                    background-size:cover;"></div>

                    </a>
                    @if($dt2->playerGamertag()==null)
                    <a style="" href="/PerfilDetalles/{{$dt2->id}}">
                        {{$dt2->playerName()}}
                    </a>
                    @else
                        <a style="" href="/PerfilDetalles/{{$dt2->id}}">
                            {{$dt2->playerGamertag()}}
                        </a>
                    @endif
                    <a style="float:right;"></a>
                </li>
                 
                 @endif
            </ul>
        </div>
        @endif
    
    </div>
    
    
    @if(Auth::check() && $proTeam->getDT()->id==Auth::user()->id && !$proTeam->getDT2())
           <div style="width: 700px; height: 250px;border-radius: 10px; position:relative;top:100px;left:200px; background-color: whitesmoke;">

            <div class="container">
                   <form action="/AsignarDTProTeam" name="FormaProCrearLiga" method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   

                    

                    <h4>Escoge al usuario que quieres hacer DT2</h4>
                    <div style="position:relative; left:-40px;" class="form-group">
                        <label class="col-sm-2 control-label">Ligas:</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="usuarioSelect"  type="text" value="">
                                <option></option>
                                @foreach($proTeam->users as $usuarios)
                                    
                                    @if($usuarios->gamertag!=null)
                                    <option value="{{$usuarios->id}}">{{$usuarios->gamertag}}</option>
                                    @else
                                     <option value="{{$usuarios->id}}">{{$usuarios->user_name}}</option>
                                    @endif
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
    @endif
    
    
    
    
    
    

</div>

@endsection

