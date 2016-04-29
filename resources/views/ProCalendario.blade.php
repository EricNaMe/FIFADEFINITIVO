@extends('template')

@section('content')

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
                <li id="ListaPerfil"><a class="active" href="/GoleadoresLigaPro/{{$LigaObj->id}}">Estadísticas</a></li>
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


        <div id="TablaPrimera" style="max-height:800px; width:700px;position: absolute; top:18%; left:15%;">


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
                         <script>alert("Hay DT2")</script>
                            @if($DTLocal2=$Equipos->localProTeam->getDT2())
                             <script>alert("AntesEsLocal")</script>
                                @if($DTAuth2->id==$DTLocal2->id)
                                 <script>alert("EsLocal")</script>
                                    <?php $BanderaDT1="EsDT2"; 
                                          $DTLocalBandera="Si";
                                    ?>
                                @endif
                            @endif
                            @if($DTVisitante2=$Equipos->visitorProTeam->getDT2())
                             <script>alert("AntesEsVisitante")</script>
                                @if($DTAuth2->id==$DTVisitante2->id)
                                 <script>alert("EsVisitante")</script>
                                    <?php $BanderaDT1="EsDT2"; 
                                  $DTVisitanteBandera="Si";
                                  ?>
                                @endif
                            @endif

                        @endif
                    @endif

                    <script>alert("Inicio")</script>
                    @if($Equipos->matchProTeam==null)

                     <script>alert("Inicio2")</script>

                        @if($DTAuth!="UsuarioSinEquipo")
                         <script>alert("Inicio3")</script>
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
                                <td></td>
                                @if($DTAuth->id==Auth::user()->id)
                                 <script>alert("Inicio4")</script>
                                  @if($DTAuth->id==$DTLocal->id || $DTAuth->id==$DTVisitante->id)
                                         <script>alert("Inicio5")</script>

                                        <td>
                                            <a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}">Reportar</a>
                                        </td>
                                    
                                  @else
                                    @if($DTAuth2!="NoMuestres" && $DTLocalBandera=="Si")  
                                     <script>alert("Inicio6")</script>
                                         <td>
                                            <a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}">Reportar</a>
                                        </td>
                                    @else    
                                    <td><a>-</a></td>

                                    @endif
                                    @if($DTAuth2!="NoMuestres" && $DTVisitanteBandera=="Si")  
                                     <script>alert("Inicio7")</script>
                                         <td>
                                            <a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}">Reportar</a>
                                        </td>
                                       @else
                                        <script>alert("Inicio8")</script>
                                       <td><a>-</a></td>

                                    @endif 
                                  @endif
                                @else
                                 <script>alert("Inicio9")</script>
                                    <td><a>-</a></td>
                        @endif

                    @else
                     <script>alert("Inicio10")</script>
                        <tr>
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
                            <td></td>
                            <td><a>-</a></td>


                        </tr>


                        @endif
                        </tr>
                        @else



                            @if($DTAuth!="UsuarioSinEquipo")
                             <script>alert("Inicio11")</script>
                                @if($DTLocal=$Equipos->localProTeam->getDT()) @endif
                                @if($DTVisitante=$Equipos->visitorProTeam->getDT()) @endif
                                @if($DTAuth->id==Auth::user()->id)
                                 <script>alert("Inicio12")</script>
                                    @if($DTAuth->id==$DTLocal->id || $DTAuth->id==$DTVisitante->id)
                                     <script>alert("Inicio13")</script>
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
                                     <script>alert("Inicio14")</script>
                          
                                    @endif
                                @else
                                
                                          @if($DTAuth2!="NoMuestres" && $DTLocalBandera=="Si") 
                                     <script>alert("Inicio15")</script>
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
                                    
                                 
                                      @endif
                                      @if($DTAuth2!="NoMuestres" && $DTVisitanteBandera=="Si")  
                                       <script>alert("Inicio17")</script>
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
                                           <script>alert("Inicio18")</script>
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
                                            <td><a>-</a></td>


                                        </tr>
   
                                
                                 <script>alert("Inicio19")</script>
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
                             <script>alert("Inicio20")</script>
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
                              

                              



                                        <!-- Código para segundos DTS -->

                                @if($DTAuth2!="NoMuestres")
                                    @if($Equipos->matchProTeam==null)
                                        @if($DTAuth2!="UsuarioSinEquipo")
                                            <tr>
                                                <td style="">{{$Equipos->localProTeam->name}}
                                                    <div id="LogoEquipo"
                                                         style="float:right; background:url({{$Equipos->localProTeam->getImageUrl()}}); background-size:cover;"></div>
                                                </td>

                                                @if($DTLocal=$Equipos->localProTeam->getDT2()) @endif
                                                @if($DTVisitante=$Equipos->visitorProTeam->getDT2()) @endif


                                                <td>
                                                    <div style="display:inline-block;left:-10px;"
                                                         id="PosicionTabla">0
                                                    </div>
                                                    -
                                                    <div id="PosicionTabla" style="display:inline-block;left:10px;">
                                                        0
                                                    </div>
                                                </td>
                                                <td style="">
                                                    <div id="LogoEquipo"
                                                         style="float:left; background:url({{$Equipos->visitorProTeam->getImageUrl()}}); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}
                                                </td>
                                                <td></td>
                                                @if($DTAuth2->id==Auth::user()->id)
                                                    @if($DTAuth2->id==$DTLocal->id || $DTAuth2->id==$DTVisitante->id)
                                                        <td>
                                                            <a href="/ReportarPartidoProMetodo/{{$Equipos->localProTeam->id}}/{{$Equipos->visitorProTeam->id}}/{{$Equipos->pro_league_id}}/{{$Equipos->id}}">Reportar</a>
                                                        </td>
                                                    @else
                                                        <td><a>-</a></td>

                                                    @endif
                                                @else
                                                    <td><a>-</a></td>
                                        @endif

                                    @else
                                        <tr>
                                            <td style="">{{$Equipos->localProTeam->name}}
                                                <div id="LogoEquipo"
                                                     style="float:right; background:url({{$Equipos->localProTeam->getImageUrl()}}); background-size:cover;"></div>
                                            </td>
                                            <td>
                                                <div style="display:inline-block;left:-10px;" id="PosicionTabla">0
                                                </div>
                                                -
                                                <div id="PosicionTabla" style="display:inline-block;left:10px;">0
                                                </div>
                                            </td>
                                            <td style="">
                                                <div id="LogoEquipo"
                                                     style="float:left; background:url({{$Equipos->visitorProTeam->getImageUrl()}}); background-size:cover;"></div>{{$Equipos->visitorProTeam->name}}
                                            </td>
                                            <td></td>
                                            <td><a>-</a></td>


                                        </tr>


                                        @endif
                                        </tr>
                                        @else



                                            @if($DTAuth2!="UsuarioSinEquipo")

                                                @if($DTAuth2->id==Auth::user()->id)
                                                    @if($DTLocal=$Equipos->localProTeam->getDT2())

                                                        @if($DTAuth2->id==$DTLocal->id)
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
                                                                <td>
                                                                    <a href="/DetallesPartido/{{$Equipos->matchProTeam->id}}">Detalles</a>
                                                                </td>
                                                                <td><a>-</a></td>


                                                            </tr>


                                                          @endif
                                                          @endif  
                                                            
                                                            @if($DTVisitante=$Equipos->visitorProTeam->getDT2())
                                                            @if($DTAuth2->id==$DTVisitante->id)
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
                                                                <td>
                                                                    <a href="/DetallesPartido/{{$Equipos->matchProTeam->id}}">Detalles</a>
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
                                                        <td>
                                                            <a href="/DetallesPartido/{{$Equipos->matchProTeam->id}}">Detalles</a>
                                                        </td>
                                                        <td><a>-</a></td>


                                                    </tr>

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
                                                    <td>
                                                        <a href="/DetallesPartido/{{$Equipos->matchProTeam->id}}">Detalles</a>
                                                    </td>
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


                                                        <!-- fin código para segundos dts -->

                                            @endif
                                        @endif
                                    @endif
                             

                                    @endforeach

            </table>

        </div>

    </div>

@endsection