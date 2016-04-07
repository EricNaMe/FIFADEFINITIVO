@extends('template')

@section('content')


    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
            <li><a href="Inicio">HOME</a></li>
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
                    @foreach($copas as $copa1)
                        <li><a href="EncontrarCopa/{{$copa1->id}}">{{$copa1->name}}</a></li>

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

    <div id="menuCentral" style="height:180%;background:url(/images/middleMenu.jpeg); background-size: cover;">

        <div>
            <ul id="MenuPerfil" style="width: 410px; ">
                <li id="ListaPerfil"><a href="/EncontrarLiga/{{$partido->league_id}}">Tabla general</a></li>

                <li id="ListaPerfil"><a class="active" href="#">Estadísticas</a></li>
                <li id="ListaPerfil"><a href="/PerfilClubes">Campeones</a></li>

            </ul>

        </div>

        <style>
            a {
                text-decoration: none;
            }
        </style>

        <div style="margin-left: 350px;" class="row">
            <div class="row">
                <div style="background-color: green; height: 150px; display:inline-block; width:150px;background:url({{$partido->localProTeam->getImageUrl('md')}}); background-size:cover;"></div>
         <span style="background-color: darkslategrey; margin:30px; height:60px; width: 180px;  display: inline-block; "> <a
                     style="padding-top:5px;font-size: 50px; text-decoration: none;color:white; font-family: sans-serif; font-weight: bold;">
                 &nbsp;&nbsp;&nbsp;{{$partido->local_score}} - {{$partido->visitor_score}}</a></span>

                <div style="background-color: green; height: 150px; display:inline-block; width:150px; background:url({{$partido->visitorProTeam->getImageUrl('md')}}); background-size:cover;"></div>
            </div>


            <div style="margin-top: 20px;" class="row">
                <div class="col-sm-4">
        <span style="background-color: darkslategrey;  padding: 10px;  display: inline-block; "> <a
                    href="/clubes-pro/{{$partido->localProTeam->id}}"
                    style="padding-top:5px;font-size: 30px;color:white; font-family: sans-serif; font-weight: bold;">{{$partido->localProTeam->name}}</a></span>
                </div>
                <div class="col-sm-3">
        <span style="background-color: darkslategrey; padding: 10px;   display: inline-block; "> <a
                    href="/clubes-pro/{{$partido->visitorProTeam->id}}"
                    style="padding-top:5px;font-size: 30px;color:white; font-family: sans-serif; font-weight: bold;">{{$partido->visitorProTeam->name}}</a></span>
                </div>

            </div>


        </div>


        <br></br>
        <div class="row">
            <div class="col-sm-offset-1 col-sm-5">

                <div style="height: auto;display:inline-block;  width: 400px; background-color: whitesmoke;">
                    <ul style="padding-left: 0px;">
                        <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif; background-color: #111111;color: white;font-weight: bold;"><a>POS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUGADOR</a>
                        </li>

                        @if($partido->PO_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>PO</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->PO_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->PO_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->PO_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->PO_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->PO_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->PO_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->DFC_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DFC</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DFC_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DFC_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DFC_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->LTI_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>LTI</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->LTI_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->LTI_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->LTI_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTI_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTI_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTI_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->LTD_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>LTD</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->LTD_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->LTD_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->LTD_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTD_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTD_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTD_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->MCD_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MCD</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MCD_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MCD_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MCD_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->MC_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MC</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MC_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MC_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MC_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->MI_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MI</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MI_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MI_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MI_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MI_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MI_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MI_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->MD_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MD</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MD_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MD_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MD_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MD_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MD_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MD_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->MCO_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MCO</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MCO_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MCO_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MCO_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->EI_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>EI</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->EI_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->EI_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->EI_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->EI_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->EI_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->EI_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->ED_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>ED</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->ED_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->ED_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->ED_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->ED_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->ED_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->ED_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif


                        @if($partido->DI_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DI</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DI_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DI_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DI_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DI_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DI_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DI_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif


                        @if($partido->DD_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DD</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DD_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DD_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DD_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DD_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DD_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DD_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->DC_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DC</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DC_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DC_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DC_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DC_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DC_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DC_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        
                        
                        
                                     <!-- nuevas posiciones -->
                              @if($partido->DFC2_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DFC2</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DFC2_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DFC2_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DFC2_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC2_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC2_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC2_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->DFC3_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DFC3</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DFC3_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DFC3_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DFC3_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC3_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC3_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC3_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->MCD2_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MCD2</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MCD2_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MCD2_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MCD2_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD2_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD2_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD2_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->MC2_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MC2</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MC2_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MC2_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MC2_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC2_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC2_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC2_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->MVI_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MVI</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MVI_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MVI_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MVI_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVI_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVI_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVI_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->MVD_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MVD</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MVD_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MVD_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MVD_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVD_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVD_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVD_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->MCO2_local!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MCO2</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MCO2_local->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MCO2_local->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MCO2_local_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO2_local_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO2_local_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO2_local_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->


                    </ul>


                </div>

            </div>

            <!--Fin primera lista -->


            <div class="col-sm-6">


                <div style="height: auto;display:inline-block;  width: 400px; background-color: whitesmoke;">
                    <ul style="padding-left: 0px;">
                        <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif; background-color: #111111;color: white;font-weight: bold;"><a>POS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUGADOR</a>
                        </li>

                        @if($partido->PO_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>PO</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->PO_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->PO_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->PO_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->PO_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->PO_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->PO_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->DFC_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DFC</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DFC_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DFC_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DFC_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->LTI_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>LTI</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->LTI_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->LTI_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->LTI_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTI_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTI_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTI_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->LTD_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>LTD</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->LTD_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->LTD_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->LTD_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTD_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTD_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->LTD_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->MCD_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MCD</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MCD_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MCD_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MCD_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->MC_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MC</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MC_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MC_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MC_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->MI_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MI</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MI_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MI_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MI_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MI_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MI_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MI_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->MD_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MD</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MD_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MD_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MD_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MD_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MD_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MD_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->MCO_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MCO</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MCO_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MCO_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MCO_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->EI_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>EI</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->EI_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->EI_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->EI_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->EI_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->EI_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->EI_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->ED_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>ED</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->ED_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->ED_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->ED_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->ED_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->ED_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->ED_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif


                        @if($partido->DI_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DI</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DI_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DI_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DI_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DI_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DI_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DI_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif


                        @if($partido->DD_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DD</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DD_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DD_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DD_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DD_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DD_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DD_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif

                        @if($partido->DC_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DC</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DC_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DC_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DC_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DC_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DC_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DC_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        
                        <!-- nuevas posiciones -->
                              @if($partido->DFC2_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DFC2</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DFC2_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DFC2_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DFC2_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC2_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC2_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC2_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->DFC3_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>DFC3</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->DFC3_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->DFC3_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->DFC3_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC3_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC3_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->DFC3_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->MCD2_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MCD2</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MCD2_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MCD2_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MCD2_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD2_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD2_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCD2_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->MC2_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MC2</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MC2_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MC2_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MC2_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC2_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC2_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MC2_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->MVI_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MVI</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MVI_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MVI_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MVI_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVI_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVI_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVI_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->MVD_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MVD</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MVD_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MVD_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MVD_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVD_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVD_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MVD_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->
                        
                               <!-- nuevas posiciones -->
                              @if($partido->MCO2_visitor!=null)
                            <li style="list-style:none;  padding: 20px 25px;font-size: 16px;
    font-family: sans-serif;"><a>MCO2</a> <img
                                        src="https://avatar-ssl.xboxlive.com/avatar/{{$partido->MCO2_visitor->gamertag}}/avatarpic-l.png"
                                        style="width: 50px;"/>
                                <a style="text-decoration:none;margin-left: 20px;">{{$partido->MCO2_visitor->user_name}}
                                    &nbsp;<?php for($i = 0;$i < $partido->MCO2_visitor_goal;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/B1.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO2_visitor_yellow;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style=" width:15px;background-image:url(/images/tarjeta_amarilla.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO2_visitor_red;$i++){   ?>
                                    <div id="LogoEquipo"
                                         style="width:15px; background-image:url(/images/tarjeta_roja.png)"></div><?php }?>
                                    <?php for($i = 0;$i < $partido->MCO2_visitor_assistance;$i++){   ?>
                                    <div id="LogoEquipo" style="background-image:url(/images/assist.png)"></div><?php }?>


                                </a></li>
                        @endif
                        <!--fin nueva posicion -->


                    </ul>


                </div>


            </div>


        </div>


    </div>










@endsection


