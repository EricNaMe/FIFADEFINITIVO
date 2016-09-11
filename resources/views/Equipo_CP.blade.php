@extends('template')

@section('content')
    <link rel="stylesheet" href="/css/Equipo_CP.css" type="text/css" media="screen">

    <script>
        function visible(id1){

            obj = document.getElementById("carta");
            obj.style.display = "block";

            document.getElementById('defaultCarta').textContent=document.getElementById(id1).textContent;
            var a=document.getElementById(id1).textContent;

            var urlStringAv = 'url(https://avatar-ssl.xboxlive.com/avatar/' + a + '/avatar-body.png)';
            //var logoStringCP=''; //cambia el logo segun el jugador
            document.getElementById('avatarB').style.backgroundImage= urlStringAv;
            // document.getElementById('logoCP').style.backgroundImage= urlString; se le setea el nuevo logo del club

        }

        function ocultar(){
            obj = document.getElementById("carta");
            obj.style.display = "none";

        }

    </script>



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
            <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a></li>
            <li><a href="#">EQUIPO DE LA SEMANA</a>
        </ul>


    </div>

    <div id="menuCentral" style="background:url(/images/EquipoCP.jpg); background-size: cover; background-repeat: no-repeat;" >
       
        
        <div><h1 class="title">EQUIPO DE LA SEMANA</h1></div>


        <div>
            <div style="background:url(/images/Alineacion.png);background-size: 100%; width: 450px; height: 650px; background-repeat: no-repeat;margin-top: 4%;"><span class="titleA"><div  style="margin-top: -6%; margin-left: -3%;"></div></span>


                <div id="carta"  style=" background:url(/images/CPSemana.png); width: 190px; height:300px; top:69px; left:600px; position:relative; background-size: 100%; display:inline-block; margin-top: -102px;margin-left:-470px; display: none; ">

                    <div id="avatarB"style="background:url(https://avatar-ssl.xboxlive.com/avatar/werux/avatar-body.png); background-size:150px 280px;background-repeat: no-repeat;  display:inline-block; margin-top: 1px;margin-left: 60px; width: 150px; height: 150px;">  </div>
                    <div id="logoCP" style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 70px; height:70px; position:relative; top:-110px; margin-left: 10px;"></div>
                    <div style="width: 182px; margin-top: -72px; margin-left: 5px; text-align:center;">
                        <span id="defaultCarta" class="Info3">WERUX</span>
                    </div>
                    <div style="width: 60px; margin-top: 12px; margin-left: 10px;">
                        <span class="Info"></span>
                        <span class="Info">POSICION</span>
                        <span class="Info">DIVISION</span>
                    </div>
                    <div style="width: 30px; margin-top: -55px; margin-left: 130px;">
                        <span class="Info2"></span>
                        <span class="Info2"></span>
                        <span class="Info2"></span>
                    </div>
                </div>



            </div>
            <div style="background:url(/images/cancha3D.png); background-size: 100%; width: 600px; height: 950px; position: absolute; background-repeat: no-repeat;margin-top: -57%; margin-left: 35%;">
                <!---DC----->
                @if($BanderaEquipoSemana==1)
                <?php $ContadorMedio=1;?>
                <?php $ContadorDefensa=1; ?>
                 <?php $ContadorDelantero=1;?>
                @foreach($EquipoSemana as $Equipo)
                    @if ($Equipo->position=="PORTERO")
                        <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:600px; left:270px;  position:relative; background-size: 100%; display:inline-block;">

                            <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 16px;">
                                <span class="Info5">PO</span>
                            </div>

                        </div>
                    @endif

                    @if ($Equipo->position=="DEFENSA")
                            <!---LI----->
                        
                                <!---LI----->
                        @if($ContadorDefensa==1)
                            
                            <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:450px; left:20px;  position:relative; background-size: 100%; display:inline-block; ">

                                <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                    <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                                </div>
                                <div style="width: 60px; margin-top: -4px; margin-left: 21px;">
                                    <span class="Info5">LI</span>
                                </div>

                            </div>
                            @endif
                                    <!---LD----->
                            @if($ContadorDefensa==2)
                                <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:450px; left:300px; position:relative; background-size: 100%; display:inline-block; ">

                                    <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                    <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                    <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                        <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                                    </div>
                                    <div style="width: 60px; margin-top: -4px; margin-left: 17px;">
                                        <span class="Info5">LD</span>
                                    </div>

                                </div>
                                @endif
                                        <!---DFC----->
                                @if($ContadorDefensa==3)
                                    <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:450px;   position:relative;  background-size: 100%; display:inline-block;">

                                        <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                        <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                        <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                            <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                                        </div>
                                        <div style="width: 60px; margin-top: -4px; margin-left: 7px;">
                                            <span class="Info5">DFC</span>
                                        </div>

                                    </div>
                                    @endif
                                            <!---DFC----->
                                    @if($ContadorDefensa==4)
                                        <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:450px; left:45px; position:relative; background-size: 100%; display:inline-block; ">

                                            <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                                <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                                            </div>
                                            <div style="width: 60px; margin-top: -4px; margin-left: 7px;">
                                                <span class="Info5">DFC</span>
                                            </div>

                                        </div>
                                        @endif
                                        <?php $ContadorDefensa++; ?>
                                                <!---POR----->
                                    @endif


                                    @if ($Equipo->position=="MEDIO")

                                    
                                            <!---MCO----->
                                        @if($ContadorMedio==1)
                                            <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:300px; right:145px;  position:relative;  background-size: 100%; display:inline-block;  ">

                                                <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                                <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                                <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                                    <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                                                </div>
                                                <div style="width: 60px; margin-top: -4px; margin-left: 5px;">
                                                    <span class="Info5">MCO</span>
                                                </div>

                                            </div>
                                            @endif
                                            @if($ContadorMedio==2)
                                                    <!---MI----->
                                            <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:300px; position:relative; right:330px;  background-size: 100%; display:inline-block;  ">

                                                <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                                <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                                <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                                    <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                                                </div>
                                                <div style="width: 60px; margin-top: -4px; margin-left: 19px;">
                                                    <span class="Info5">MI</span>
                                                </div>

                                            </div>
                                            @endif
                                                    <!---MD----->
                                            @if($ContadorMedio==3)
                                                <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:300px; right:60px; position:relative; background-size: 100%; display:inline-block; ">

                                                    <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                                    <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                                    <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                                        <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                                                    </div>
                                                    <div style="width: 60px; margin-top: -4px; margin-left: 15px;">
                                                        <span class="Info5">MD</span>
                                                    </div>

                                                </div>
                                                @endif
                                                        <!---MCD----->
                                                @if($ContadorMedio==4)
                                                    <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:190px; left:330px; position:relative; background-size: 100%; display:inline-block;  ">

                                                        <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                                        <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                                        <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                                            <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                                                        </div>
                                                        <div style="width: 60px; margin-top: -4px; margin-left: 5px;">
                                                            <span class="Info5">MCD</span>
                                                        </div>

                                                    </div>
                                                @endif
                                                <?php $ContadorMedio++; ?>
                                            @endif


                    @if ($Equipo->position=="DELANTERO")
                       
                    @if($ContadorDelantero==1)
                        <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; bottom:2px; left:136px; position:relative; background-size: 100%; display:inline-block;">

                            <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 16px;">
                                <span class="Info5">DC</span>
                            </div>

                        </div>
                    @endif


                    @if($ContadorDelantero==2)
                        <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()"  style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:0px; left:500px; position: relative; background-size: 100%; display:inline-block; margin-top: -45px;margin-left:-310px; ">

                            <div style="background:url({{$Equipo->user->getAvatarBody()}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user->user_name}}</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 16px;">
                                <span class="Info5">DC</span>
                            </div>

                        </div>


                        <!---DC----->

                    @endif
                            <?php $ContadorDelantero++; ?>
                    @endif






                @endforeach
               
                <!---IF para poner mejor equipo ultima jornada----->
                @endif


                @if($BanderaEquipoSemana==2)
                <?php $ContadorMedio=1;?>
                <?php $ContadorDefensa=1; ?>
                <?php $ContadorDelantero=1;?>
               
                   
                        <div onmouseover="visible({{$portero[0]->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:600px; left:270px;  position:relative; background-size: 100%; display:inline-block;">

                            <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($portero[0]->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="{{$portero[0]->id}}" class="Info6">{{$portero[0]->user_name}}</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 16px;">
                                <span class="Info5">PO</span>
                            </div>

                        </div>
                    

                  
                    
                    @foreach($defensas as $Equipo)
                            <!---LI----->
                        
                                <!---LI----->
                        @if($ContadorDefensa==1)
                            
                            <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:450px; left:20px;  position:relative; background-size: 100%; display:inline-block; ">

                                <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($Equipo->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                    <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user_name}}</span>
                                </div>
                                <div style="width: 60px; margin-top: -4px; margin-left: 21px;">
                                    <span class="Info5">LI</span>
                                </div>

                            </div>
                            @endif
                                    <!---LD----->
                            @if($ContadorDefensa==2)
                                <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:450px; left:300px; position:relative; background-size: 100%; display:inline-block; ">

                                    <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($Equipo->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                    <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                    <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                        <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user_name}}</span>
                                    </div>
                                    <div style="width: 60px; margin-top: -4px; margin-left: 17px;">
                                        <span class="Info5">LD</span>
                                    </div>

                                </div>
                                @endif
                                        <!---DFC----->
                                @if($ContadorDefensa==3)
                                    <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:450px;   position:relative;  background-size: 100%; display:inline-block;">

                                        <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($Equipo->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                        <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                        <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                            <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user_name}}</span>
                                        </div>
                                        <div style="width: 60px; margin-top: -4px; margin-left: 7px;">
                                            <span class="Info5">DFC</span>
                                        </div>

                                    </div>
                                    @endif
                                            <!---DFC----->
                                    @if($ContadorDefensa==4)
                                        <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:450px; left:45px; position:relative; background-size: 100%; display:inline-block; ">

                                            <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($Equipo->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                                <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user_name}}</span>
                                            </div>
                                            <div style="width: 60px; margin-top: -4px; margin-left: 7px;">
                                                <span class="Info5">DFC</span>
                                            </div>

                                        </div>
                                        @endif
                                        <?php $ContadorDefensa++; ?>
                                                <!---POR----->
                                        @endforeach
                                        
                                    


                                  

                                    @foreach($medios as $Equipo)
                                            <!---MCO----->
                                        @if($ContadorMedio==1)
                                            <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:300px; right:145px;  position:relative;  background-size: 100%; display:inline-block;  ">

                                                <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($Equipo->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                                <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                                <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                                    <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user_name}}</span>
                                                </div>
                                                <div style="width: 60px; margin-top: -4px; margin-left: 5px;">
                                                    <span class="Info5">MCO</span>
                                                </div>

                                            </div>
                                            @endif
                                            @if($ContadorMedio==2)
                                                    <!---MI----->
                                            <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:300px; position:relative; right:330px;  background-size: 100%; display:inline-block;  ">

                                                <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($Equipo->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                                <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                                <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                                    <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user_name}}</span>
                                                </div>
                                                <div style="width: 60px; margin-top: -4px; margin-left: 19px;">
                                                    <span class="Info5">MI</span>
                                                </div>

                                            </div>
                                            @endif
                                                    <!---MD----->
                                            @if($ContadorMedio==3)
                                                <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:300px; right:60px; position:relative; background-size: 100%; display:inline-block; ">

                                                    <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($Equipo->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                                    <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                                    <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                                        <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user_name}}</span>
                                                    </div>
                                                    <div style="width: 60px; margin-top: -4px; margin-left: 15px;">
                                                        <span class="Info5">MD</span>
                                                    </div>

                                                </div>
                                                @endif
                                                        <!---MCD----->
                                                @if($ContadorMedio==4)
                                                    <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:190px; left:330px; position:relative; background-size: 100%; display:inline-block;  ">

                                                        <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($Equipo->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                                                        <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                                                        <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                                            <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user_name}}</span>
                                                        </div>
                                                        <div style="width: 60px; margin-top: -4px; margin-left: 5px;">
                                                            <span class="Info5">MCD</span>
                                                        </div>

                                                    </div>
                                                @endif
                                                <?php $ContadorMedio++; ?>
                                                @endforeach
                                          


                  
                       
                    @foreach($delanteros as $Equipo)
                    @if($ContadorDelantero==1)
                        <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; bottom:2px; left:136px; position:relative; background-size: 100%; display:inline-block;">

                            <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($Equipo->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user_name}}</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 16px;">
                                <span class="Info5">DC</span>
                            </div>

                        </div>
                    @endif


                    @if($ContadorDelantero==2)
                        <div onmouseover="visible({{$Equipo->id}})"  onmouseout="ocultar()"  style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:0px; left:500px; position: relative; background-size: 100%; display:inline-block; margin-top: -45px;margin-left:-310px; ">

                            <div style="background:url({{'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($Equipo->gamertag).'/avatar-body.png'}}); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="{{$Equipo->id}}" class="Info6">{{$Equipo->user_name}}</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 16px;">
                                <span class="Info5">DC</span>
                            </div>

                        </div>


                        <!---DC----->

                    @endif
                            <?php $ContadorDelantero++; ?>
                            @endforeach
                    






                
               
                <!---IF para poner mejor equipo ultima jornada----->
                @endif

            
            </div>





            <div style="background:url(/images/BancaCP.png); background-size: 89%; width: 550px; height:350px; position:absolute; top: 500px; margin-left: -15px;">
                <span class="titleA"><div  style="margin-top: 5%; margin-left: -15%;">Escoge rango de jornadas</div></span>
                <!---DC----->
                
                <!---MCO----->
                
                 <div style="margin-top:50px; margin-left: 150px;" class="col-md-4">
                     <form method="post"  role="form" action="/EquipoSemana/{{$league->id}}">  
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         
                   
                    <div class="col-md-8">
                         <select name="JornadaInput1"  class="col-md-12">
                             <option value="1"></option>    
                             <option value="1">1</option>
                             <option value="2">2</option> 
                             <option value="3">3</option>
                             <option value="4">4</option> 
                             <option value="5">5</option>
                             <option value="6">6</option> 
                             <option value="7">7</option>
                             <option value="8">8</option> 
                             <option value="9">9</option>
                             <option value="10">10</option> 
                             <option value="11">11</option>
                             <option value="12">12</option> 
                             <option value="13">13</option>
                             <option value="14">14</option> 
                             <option value="15">15</option>
                             <option value="16">16</option> 
                             <option value="17">17</option>
                             <option value="18">18</option>
                             <option value="19">19</option>
                             <option value="20">20</option>
                             <option value="21">21</option>
                             <option value="22">22</option>
                             <option value="23">23</option>
                             <option value="24">24</option>
                             <option value="25">25</option>
                             <option value="26">26</option>
                             <option value="27">27</option>
                             <option value="28">28</option>
                             <option value="29">29</option>
                             <option value="30">30</option>
                         </select>
                    </div> 
                         
                           <div class="col-md-8">
                         <select name="JornadaInput2" class="col-md-12">
                             <option value="1"></option>    
                             <option value="1">1</option>
                             <option value="2">2</option> 
                             <option value="3">3</option>
                             <option value="4">4</option> 
                             <option value="5">5</option>
                             <option value="6">6</option> 
                             <option value="7">7</option>
                             <option value="8">8</option> 
                             <option value="9">9</option>
                             <option value="10">10</option> 
                             <option value="11">11</option>
                             <option value="12">12</option> 
                             <option value="13">13</option>
                             <option value="14">14</option> 
                             <option value="15">15</option>
                             <option value="16">16</option> 
                             <option value="17">17</option>
                             <option value="18">18</option>
                             <option value="19">19</option>
                             <option value="20">20</option>
                             <option value="21">21</option>
                             <option value="22">22</option>
                             <option value="23">23</option>
                             <option value="24">24</option>
                             <option value="25">25</option>
                             <option value="26">26</option>
                             <option value="27">27</option>
                             <option value="28">28</option>
                             <option value="29">29</option>
                             <option value="30">30</option>
                        </select>
                    </div>
                         <div class="col-md-3"><button type="submit" class="btn btn-primary">Enviar</button></div>
                     </form> 
                </div>
                <!---LD----->
              
                <!---POR----->
                

            </div>


        </div>


@endsection