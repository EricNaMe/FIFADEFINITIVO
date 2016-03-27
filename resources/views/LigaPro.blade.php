@extends('template')

@section('content')

    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
            <li><a>CLUBES PRO</a>
            <li><a href="/Inicio">HOME</a></li>
            <li><a>ADMINISTRADOR</a>
                <ul>
                    <li><a href="/ProCrearLiga">CREAR LIGA</a></li>
                    <li><a href="/ProCrearCopa">CREAR COPA</a></li>
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


                </ul>
            </li>



            <li><a href="Transferencias">TRANSFERENCIAS</a>

            </li>


            <li><a href="RankingCP">RANKING POR CLUBES</a>



            </li>



        </ul>


    </div>

        <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >


            <div>
                <ul id="MenuPerfil" style="width: 580px;">
                    <li id="ListaPerfil"><a href="#">Tabla general</a></li>
                    <li id="ListaPerfil"><a class="active" href="/ProCalendario">Calendario</a></li>
                    <li id="ListaPerfil"><a class="active" href="#">Estadísticas</a></li>
                    <li id="ListaPerfil"><a href="#">Campeones</a></li>

                </ul>

            </div>
            
            
      
                
               <span style="background-color: darkslategrey; height:60px; width: auto;padding: 10px; position:relative; display: inline-block; left:420px;"> <a style="padding-top:5px;font-size: 50px;color:white; font-family: sans-serif; font-weight: bold;">{{$league->name}}</a></span>
                
        
                 
                  <div id="TablaPrimera" style="position: absolute; top:22%; left:14%;">
            <table>
                <thead>
                <tr>
                    <th>Posición</th>
                    <th>Equipo</th>
                    <th>Pts</th>
                    <th>JJ</th>
                    <th>JG</th>
                    <th>JE</th>
                    <th>JP</th>
                    <th>GF</th>
                    <th>GC</th>
                    <th>DG</th>
                </tr>
                </thead>
                <?php $i=1; ?>

            @foreach($league->proTeams as $proTeam)
               
                

                <tr>
                    <td><div id="PosicionTabla">   {{$i}}</div></td>
                    <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(/images/Clausura/{{$proTeam->id}}.png); background-size:cover;"></div><a href="/clubes-pro/{{$proTeam->id}}">{{$proTeam->name}}</a></td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>


                    <?php $i++; ?>
                </tr>
                @endforeach
            </table>
        </div>
            
        </div>
        

@endsection