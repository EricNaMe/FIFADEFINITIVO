@extends('template')

@section('content')

    <script>

    function fechaJornada()
    {
    var date=document.getElementById('jornadas').value+","+document.getElementById('hora').value+","+document.getElementById('fecha').value;

    if(document.getElementById('fecha').value=="" || document.getElementById('hora').value=="" || document.getElementById('jornadas').value=="")
    {
    alert('Ingresa los valores necesarios');
    return false;
    }
    else{

    document.getElementById('dateTimeJ').value=date;
    return true;

    }
    }
    function cargarFecha()
    {
    var fechaJor= "{{$jornada->fecha_jornada}}";
    var temp = new Array();
    temp = fechaJor.split(',');
    document.getElementById('numJor').textContent=temp[0];
    document.getElementById('fecha2').value=temp[2];
    document.getElementById('hora2').value=temp[1];
    }

    </script>

    <body onload="cargarFecha();">

    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">


        <ul id="ListaMenuLateral">
            <li><a href="/Inicio">HOME</a></li>
            @if (Auth::check())
                <?php $user = Auth::user();
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
                    @foreach($copas as $copa1)
                        <li><a href="/EncontrarCopa/{{$copa1->id}}">{{$copa1->name}}</a></li>

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

    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">


        <!-- <div id="Menu1vs1" style="background-color:gray; position:relative; height: 100px; width:900px; left:100px; top:100px;">
             <a href="#" class="myButton"><div style="width:30px; height: 30px; display:inline-block; background:url(images/calendar.png); background-size: cover;"></div>Calendario</a>
         </div>-->

        <div>
            <ul id="MenuPerfil" style="width: 580px;">
                <li id="ListaPerfil"><a href="/EncontrarLiga/{{$LigaObj->id}}">Tabla general</a></li>
                <li id="ListaPerfil"><a class="active" href="#">Calendario</a></li>
                <li id="ListaPerfil"><a class="active" href="/GoleadoresProLiga/{{$LigaObj->id}}">Estadísticas</a></li>
                <li id="ListaPerfil"><a href="/SalaTrofeosCP">Campeones</a></li>

            </ul>

        </div>


        <style>
            th {
                text-align: center;
            }

            td {
                padding: 6px;
            }
        </style>


        @if (Auth::check())
            <?php $user=Auth::user();
            ?>
            @if($user->user_name==="Administrador22")
                <form action="/dateJornada" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" id="dateTimeJ" name="dateTimeJ" value="">
                    <div style="position: absolute; right: 400px;"><input type="number" name="jornadas" id="jornadas" min="1" style=" width: 40px;" > <input type="date" name="fecha" id="fecha"> <input type="time" name="hora" id="hora"></div>
                    <div style="position: absolute; right: 320px;"><button type="boton" onclick="if(fechaJornada()){}else{return false};" >Guardar</button></div>
                </form>

            @endif
        @endif
        <div style="background-color: #333; width: 420px; height: 37px;font-family: sans-serif;
    font-weight: bold; margin-left:330px;font-size: 22px; color: white;
     word-break:break-all ;">&nbsp;&nbsp;&nbsp; JORNADA &nbsp&nbsp &nbsp&nbsp {{$jornada->fecha_jornada}}&nbsp&nbsp &nbsp&nbsp
            <input type="date" name="fecha2" id="fecha2" style="background-color: transparent; border: 0px;" readonly="readonly">
              </div>

        <div id="TablaPrimera" style="max-height:800px; width:750px;position: absolute; top:28%; left:15%;">


            <table>
                <thead>
                <tr>

                    <th>Local</th>
                    <th>Marcador</th>
                    <th>Visitante</th>
                    <th>Detalles</th>
                    <th>Reportar</th>

                </tr>
                </thead>

                <?php
                $jor = 1;
                ?>



                <?php ?>

                @foreach($proCalendar as $Equipos)
                    @if($jor==$Equipos->jornada)

                        <thead>
                        <tr>
                            <th colspan="5" style="text-align:center;background-color: darkslategrey;">
                                JORNADA {{$jor}}</th>

                        </tr>
                        </thead>
                        <?php $jor++; ?>

                    @endif
                        <?php $BanderaDT1=""; 
                        $DTLocalBandera="";
                        $DTVisitanteBandera="";?>
                    @if($DTAuth2!="NoMuestres")
                        @if($DTAuth2->id==Auth::user()->id)
                         
                            @if($DTLocal2=$Equipos->localProTeam->getDT2())
                          
                                @if($DTAuth2->id==$DTLocal2->id)
                            
                                    <?php $BanderaDT1="EsDT2"; 
                                          $DTLocalBandera="Si";
                                    ?>
                                @endif
                            @endif
                            @if($DTVisitante2=$Equipos->visitorProTeam->getDT2())
                             
                                @if($DTAuth2->id==$DTVisitante2->id)
                                 
                                    <?php $BanderaDT1="EsDT2"; 
                                  $DTVisitanteBandera="Si";
                                  ?>
                                @endif
                            @endif

                        @endif
                    @endif

                   
                    @if($Equipos->matchProTeam==null)                   

                        @if($DTAuth!="UsuarioSinEquipo")
                        
                            <tr>
                                           
                                <td style="">{{$Equipos->localProTeam->name}}
                                    <div id="LogoEquipo"
                                         style="float:right; background:url({{$Equipos->localProTeam->getImageUrl()}}); background-size:cover;"></div>
                                </td>

                                @if($DTLocal=$Equipos->localProTeam->getDT()) @endif
                                @if($DTVisitante=$Equipos->visitorProTeam->getDT()) @endif


                                <td>
                                    <div style="display:inline-block;left:-10px;" id="PosicionTabla">0</div>
                                    -
                                    <div id="PosicionTabla" style="display:inline-block;left:10px;">0</div>
                                </td>
                                <td style="">
                                    <div id="LogoEquipo"
                                         style="float:left; background:url({{$Equipos->visitorProTeam->getImageUrl()}}); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}
                                </td>
                               
                                 <td>-</td>   
                                @if($DTAuth->id==Auth::user()->id || ($DTAuth2!="NoMuestres" && $DTLocalBandera=="Si") || ($DTAuth2!="NoMuestres" && $DTVisitanteBandera=="Si"))
                            
                                  @if($DTAuth->id==$DTLocal->id || $DTAuth->id==$DTVisitante->id)                                        
                                         
                                        <td>
                                            <a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}">Reportar</a>
                                        </td>
                                    
                                  @else
                                    @if($DTAuth2!="NoMuestres" && $DTLocalBandera=="Si")  
                                    
                                         <td>
                                            <a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}">Reportar</a>
                                        </td>
                                    @else   
                                      
                                    <td><a>-</a></td>

                                    @endif
                                    @if($DTAuth2!="NoMuestres" && $DTVisitanteBandera=="Si")  
                                      <script>alert("Usuario DTAuth2 Visitante")</script>
                                         <td>
                                            <a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}">Reportar</a>
                                        </td>
                                       @else
                                          
                                       

                                    @endif 
                                  @endif
                                @else
                                 
                                    <td><a>-</a></td>
                        @endif

                    @else
                     
                        <tr>
                            @if(Auth::check() && Auth::user()->user_name=="Administrador22" )                                        
                                 <td><a href="/ProGanarLocalDefault/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}"
                                           class="btn btn-primary">Gana local</a></td>
                                 @endif 
                            <td style="">{{$Equipos->localProTeam->name}}
                                <div id="LogoEquipo"
                                     style="float:right; background:url({{$Equipos->localProTeam->getImageUrl()}}); background-size:cover;"></div>
                            </td>
                            <td>
                                <div style="display:inline-block;left:-10px;" id="PosicionTabla">0</div>
                                -
                                <div id="PosicionTabla" style="display:inline-block;left:10px;">0</div>
                            </td>
                            <td style="">
                                <div id="LogoEquipo"
                                     style="float:left; background:url({{$Equipos->visitorProTeam->getImageUrl()}}); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}
                            </td>
                             @if(Auth::check() && Auth::user()->user_name=="Administrador22" )
                                 <td><a href="/ProGanarVisitanteDefault/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}"
                                           class="btn btn-primary">Gana visitante</a></td>                                   
                                @endif 
                            <td></td>
                            <td><a>-</a></td>


                        </tr>


                        @endif
                        </tr>
                        @else



                            @if($DTAuth!="UsuarioSinEquipo")
                             
                                @if($DTLocal=$Equipos->localProTeam->getDT()) @endif
                                @if($DTVisitante=$Equipos->visitorProTeam->getDT()) @endif
                                @if($DTAuth->id==Auth::user()->id)
                               
                                    @if($DTAuth->id==$DTLocal->id || $DTAuth->id==$DTVisitante->id)
                                   
                                        <tr>
                                            <td style="">{{$Equipos->localProTeam->name}}
                                                <div id="LogoEquipo"
                                                     style="float:right; background:url({{$Equipos->localProTeam->getImageUrl()}}); background-size:cover;"></div>
                                            </td>
                                            <td>
                                                <div style="display:inline-block;left:-10px;"
                                                     id="PosicionTabla">{{$Equipos->matchProTeam->local_score}}</div>
                                                -
                                                <div id="PosicionTabla"
                                                     style="display:inline-block;left:10px;">{{$Equipos->matchProTeam->visitor_score}}</div>
                                            </td>
                                            <td style="">
                                                <div id="LogoEquipo"
                                                     style="float:left; background:url({{$Equipos->visitorProTeam->getImageUrl()}}); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}
                                            </td>
                                            <td>
                                                <a href="/DetallesPartido/{{$Equipos->matchProTeam->id}}">Detalles</a>
                                            </td>
                                            <td>
                                                <a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}/{{$Equipos->matchProTeam->id}}">Editar</a>
                                            </td>
                                        </tr>
                                    @else                                    
                                    <tr>
                                        <td style="">{{$Equipos->localProTeam->name}}
                                            <div id="LogoEquipo"
                                                 style="float:right; background:url({{$Equipos->localProTeam->getImageUrl()}}); background-size:cover;"></div>
                                        </td>
                                        <td>
                                            <div style="display:inline-block;left:-10px;"
                                                 id="PosicionTabla">{{$Equipos->matchProTeam->local_score}}</div>
                                            -
                                            <div id="PosicionTabla"
                                                 style="display:inline-block;left:10px;">{{$Equipos->matchProTeam->visitor_score}}</div>
                                        </td>
                                        <td style="">
                                            <div id="LogoEquipo"
                                                 style="float:left; background:url({{$Equipos->visitorProTeam->getImageUrl()}}); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}
                                        </td>
                                        <td><a href="/DetallesPartido/{{$Equipos->matchProTeam->id}}">Detalles</a>
                                        </td>
                                        <td><a>-</a></td>
                                    </tr>             
                                    @endif
                                @else
                                
                                          @if($DTAuth2!="NoMuestres" && $DTLocalBandera=="Si")                                  
                                       <tr>
                                            <td style="">{{$Equipos->localProTeam->name}}
                                                <div id="LogoEquipo"
                                                     style="float:right; background:url({{$Equipos->localProTeam->getImageUrl()}}); background-size:cover;"></div>
                                            </td>
                                            <td>
                                                <div style="display:inline-block;left:-10px;"
                                                     id="PosicionTabla">{{$Equipos->matchProTeam->local_score}}</div>
                                                -
                                                <div id="PosicionTabla"
                                                     style="display:inline-block;left:10px;">{{$Equipos->matchProTeam->visitor_score}}</div>
                                            </td>
                                            <td style="">
                                                <div id="LogoEquipo"
                                                     style="float:left; background:url({{$Equipos->visitorProTeam->getImageUrl()}}); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}
                                            </td>
                                            <td>
                                                <a href="/DetallesPartido/{{$Equipos->matchProTeam->id}}">Detalles</a>
                                            </td>
                                            <td>
                                                <a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}/{{$Equipos->matchProTeam->id}}">Editar</a>
                                            </td>
                                        </tr>
                                        @else
                                    
                                 
                                      @endif
                                      @if($DTAuth2!="NoMuestres" && $DTVisitanteBandera=="Si")  
                                      
                                         <tr>
                                            <td style="">{{$Equipos->localProTeam->name}}
                                                <div id="LogoEquipo"
                                                     style="float:right; background:url({{$Equipos->localProTeam->getImageUrl()}}); background-size:cover;"></div>
                                            </td>
                                            <td>
                                                <div style="display:inline-block;left:-10px;"
                                                     id="PosicionTabla">{{$Equipos->matchProTeam->local_score}}</div>
                                                -
                                                <div id="PosicionTabla"
                                                     style="display:inline-block;left:10px;">{{$Equipos->matchProTeam->visitor_score}}</div>
                                            </td>
                                            <td style="">
                                                <div id="LogoEquipo"
                                                     style="float:left; background:url({{$Equipos->visitorProTeam->getImageUrl()}}); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}
                                            </td>
                                            <td>
                                                <a href="/DetallesPartido/{{$Equipos->matchProTeam->id}}">Detalles</a>
                                            </td>
                                            <td>
                                                <a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}/{{$Equipos->matchProTeam->id}}">Editar</a>
                                            </td>
                                        </tr>
                                      @else
                             
                                   
                                    @endif
                        
                                    @if($DTVisitanteBandera!="Si" && $DTLocalBandera!="Si")
                                                     
                                    <tr>
                                        <td style="">{{$Equipos->localProTeam->name}}
                                            <div id="LogoEquipo"
                                                 style="float:right; background:url({{$Equipos->localProTeam->getImageUrl()}}); background-size:cover;"></div>
                                        </td>
                                        <td>
                                            <div style="display:inline-block;left:-10px;"
                                                 id="PosicionTabla">{{$Equipos->matchProTeam->local_score}}</div>
                                            -
                                            <div id="PosicionTabla"
                                                 style="display:inline-block;left:10px;">{{$Equipos->matchProTeam->visitor_score}}</div>
                                        </td>
                                        <td style="">
                                            <div id="LogoEquipo"
                                                 style="float:left; background:url({{$Equipos->visitorProTeam->getImageUrl()}}); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}
                                        </td>
                                        <td><a href="/DetallesPartido/{{$Equipos->matchProTeam->id}}">Detalles</a>
                                        </td>
                                        <td><a>-</a></td>


                                    </tr>
                                    @endif
                                 @endif
                            @else
                            
                                <tr>
                                    
                                    <td style="">{{$Equipos->localProTeam->name}}
                                        <div id="LogoEquipo"
                                             style="float:right; background:url({{$Equipos->localProTeam->getImageUrl()}}); background-size:cover;"></div>
                                    </td>
                                    <td>
                                        <div style="display:inline-block;left:-10px;"
                                             id="PosicionTabla">{{$Equipos->matchProTeam->local_score}}</div>
                                        -
                                        <div id="PosicionTabla"
                                             style="display:inline-block;left:10px;">{{$Equipos->matchProTeam->visitor_score}}</div>
                                    </td>
                                    <td style="">
                                        <div id="LogoEquipo"
                                             style="float:left; background:url({{$Equipos->visitorProTeam->getImageUrl()}}); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}
                                    </td>
                                    
                                    <td><a href="/DetallesPartido/{{$Equipos->matchProTeam->id}}">Detalles</a></td>
                                    <td><a>-</a></td>
                                    @if(Auth::check())
                                        @if(Auth::user()->user_name=="Administrador22")
                                            <td>
                                                <a href="/ReportarPartidoProMetodoAdmin/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}/{{$Equipos->matchProTeam->id}}">Editar
                                                    Admin</a></td>
                                        @endif
                                    @endif
                                </tr>
                                    @endif
                              @endif

                                    @endforeach

            </table>

        </div>

    </div>

@endsection