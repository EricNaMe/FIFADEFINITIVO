<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/Equipo_CP.css" type="text/css" media="screen">
        <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
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
              <li><a>CLUBES PRO</a>
               
                <li><a href="Inicio">HOME</a>
              <!--  <ul>
                <li><a>PRIMERA DIVISIÓN</a></li>
                <li><a>SEGUNDA DIVISIÓN A</a></li>
                <li><a>SEGUNDA DIVISIÓN B</a></li>
                <li><a>TERCERA DIVISIÓN A</a></li>
                <li><a>TERCERA DIVISIÓN B</a></li>
              
                </ul>-->
                </li>
                
                
                <li><a href="CLUBESPRO">CLUBES</a>

                </li>
                

                
                 <li><a href="Transferencias">TRANSFERENCIAS</a>
             
                </li>
                
                 <li><a href="/RankingCP">RANKING POR CLUBES</a>

                <li><a href="/Equipo_CP">EQUIPO DE LA SEMANA</a></li>
             
                </li>
                
                
                
            </ul>
            
            
        </div>


        <div id="menuSuperior" style="background:url(/images/topMenu.jpeg); background-size: cover; ">

            <ul id="ListaMenuSuperior" style="margin-left: 400px;">
                <li><a href="CLUBESPRO">CLUBES PRO</a></li>
                <li><a href="PVSP">1 VS 1</a></li>
                <li><a href="Reglamento">REGLAMENTO</a></li>
                <li><a href="Clips">CLIPS</a></li>
                <li><a href="Noticias">NOTICIAS</a></li>
                @if (Auth::check())
                    <li id="LoginMenu"><a href="#" ><div id="LogoEquipo" style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatarpic-l.png); background-size:cover;"></div>{{Auth::User()->user_name}}</a>
                        <ul id="SubMenu">

                            <li style="font-size: 12px; "><a href="Perfil" >Ver Perfil</a></li>
                            <li style="font-size: 12px; "><a href="EditarPerfil" >Editar Perfil</a></li>
                            <li style="font-size: 12px; "><a href="/auth/logout" >Cerrar sesión</a></li>


                        </ul>
                    </li>
                @else
                    <li id="LoginMenu"><a href="/auth/login" >LOGIN</a>


                        <ul id="SubMenu">
                            <li style="font-size: 12px; "><a href="/auth/login" >Iniciar Sesión</a></li>
                            <li style="font-size: 12px; margin-left: 5px; "><a href="/auth/register" >Registrarse</a></li>

                        </ul>
                    </li>
                @endif

            </ul>


        </div>

       
        <div id="menuSuperior" style="background:url(/images/topMenu.jpeg); background-size: cover;"> 
            <ul id="ListaMenuSuperior">
               <li><a href="CLUBESPRO">CLUBES PRO</a></li>
                <li><a href="PVSP">1 VS 1</a></li>
                <li href="Regamento"><a>REGLAMENTO</a></li>
                <li><a href="Clips">CLIPS</a></li>
                <li><a href="Noticias.php">NOTICIAS</a></li>
                <li><a>LOGIN</a></li>
                
                 
            </ul>
        </div>
        <div id="menuCentral" style="background:url(/images/EquipoCP.jpg); background-size: cover; background-repeat: no-repeat;" >
            <div><h1 class="title">EQUIPO DE LA SEMANA</h1></div>
            
            <div>
                <div style="background:url(/images/Alineacion.png);background-size: 100%; width: 450px; height: 650px; background-repeat: no-repeat;margin-top: 4%;"><span class="titleA"><div  style="margin-top: -4%; margin-left: -3%;">ALDEBARAN FC</div></span> 
                        <div id="carta"  style=" background:url(/images/CPSemana.png); width: 190px; height:300px; top:69px; left:600px; position:relative; background-size: 100%; display:inline-block; margin-top: -90px;margin-left:-470px; display: none; ">              
                            
                            <div id="avatarB"style="background:url(https://avatar-ssl.xboxlive.com/avatar/werux/avatar-body.png); background-size:150px 280px;background-repeat: no-repeat;  display:inline-block; margin-top: 1px;margin-left: 60px; width: 150px; height: 150px;">  </div>
                            <div id="logoCP" style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 70px; height:70px; position:relative; top:-110px; margin-left: 10px;"></div>          
                            <div style="width: 182px; margin-top: -72px; margin-left: 5px; text-align:center;">
                                <span id="defaultCarta" class="Info3">WERUX</span>
                            </div>
                            <div style="width: 60px; margin-top: 12px; margin-left: 10px;">
                                <span class="Info">RANK</span>
                                <span class="Info">POSICION</span>  
                                <span class="Info">DIVISION</span>
                            </div>
                            <div style="width: 30px; margin-top: -55px; margin-left: 130px;">
                                <span class="Info2">4</span>
                                <span class="Info2">DFC</span>
                                <span class="Info2">2da.</span>
                            </div>
                        </div> 
            
                
                
                </div>     
                <div style="background:url(/images/cancha3d.png); background-size: 100%; width: 600px; height: 950px; position:relative; background-repeat: no-repeat;margin-top: -53%; margin-left: 35%;">
                        <!---DC----->         
                         <div onmouseover="visible('dc1')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:120px; left:600px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-240px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/jorgeCR7bbc/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="dc1" class="Info6">jorgeCR7bbc</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 16px;">
                                <span class="Info5">DC</span>                         
                            </div>
                           
                        </div>   
                    
                    <!---DC----->
                         <div onmouseover="visible('dc2')"  onmouseout="ocultar()"  style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:120px; left:650px; position: relative; background-size: 100%; display:inline-block; margin-top: -45px;margin-left:-310px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="dc2" class="Info6">Cochexbox123</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 16px;">
                                <span class="Info5">DC</span>                         
                            </div>
                           
                        </div>                 
                      <!---MCO----->         
                         <div onmouseover="visible('mco')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:230px; left:900px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-225px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/soyMariohig/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="mco" class="Info6">soyMariohig</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 5px;">
                                <span class="Info5">MCO</span>                         
                            </div>
                           
                        </div>   
                      
                       <!---MI----->         
                         <div onmouseover="visible('mi')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:320px; left:900px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-225px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/MEX%20STURMTIGER/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="mi" class="Info6">MEX%20STURMTIGER</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 19px;">
                                <span class="Info5">MI</span>                         
                            </div>
                           
                        </div>   
                       <!---MD----->         
                         <div onmouseover="visible('md')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:320px; left:1300px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-180px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/DiegoHA17/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="md" class="Info6">DiegoHA17</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 15px;">
                                <span class="Info5">MD</span>                         
                            </div>
                           
                        </div> 
                         <!---MCD----->         
                         <div onmouseover="visible('mcd')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:430px; left:1300px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-210px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/LLeninLis/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="mcd" class="Info6">LLeninLis</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 5px;">
                                <span class="Info5">MCD</span>                         
                            </div>
                           
                        </div> 
                           <!---LI----->         
                         <div onmouseover="visible('li1')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:540px; left:1620px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-195px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/barajasruben/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="li1" class="Info6">barajasruben</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 21px;">
                                <span class="Info5">LI</span>                         
                            </div>
                           
                        </div>   
                             <!---LD----->         
                         <div onmouseover="visible('ld')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:540px; left:1380px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-225px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/VFL118/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="ld"class="Info6">VFL118</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 17px;">
                                <span class="Info5">LD</span>                         
                            </div>
                           
                        </div> 
                              <!---DFC----->         
                         <div onmouseover="visible('dfc1')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:560px; left:1790px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-210px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/dragsville/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="dfc1"class="Info6">dragsville</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 7px;">
                                <span class="Info5">DFC</span>                         
                            </div>
                           
                        </div> 
                               <!---DFC----->         
                         <div onmouseover="visible('dfc2')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:560px; left:1780px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-210px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/Werux/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="dfc2"class="Info6">Werux</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 7px;">
                                <span class="Info5">DFC</span>                         
                            </div>
                           
                        </div> 
                           <!---POR----->         
                         <div onmouseover="visible('por')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:690px; left:1995px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-210px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/alangraciano2/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="por"class="Info6">alangraciano2</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 6px;">
                                <span class="Info5">POR</span>                         
                            </div>
                           
                        </div> 
                    
                                 
                   
            </div>          
                     
            
            
            
            
         <div style="background:url(/images/BancaCP.png); background-size: 89%; width: 550px; height:350px; position:relative; top:-500px; margin-left: -15px;">
             <span class="titleA"><div  style="margin-top: 6%; margin-left: -15%;">BANCA</div></span>
              <!---DC----->         
                         <div onmouseover="visible('dcB')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top: 88px; left:315px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-240px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/SaltyBunny99620/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="dcB" class="Info6">SaltyBunny99620</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 16px;">
                                <span class="Info5">DC</span>                         
                            </div>
                           
                        </div> 
               <!---MCO----->         
                         <div  onmouseover="visible('mcoB')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:87px; left:555px; position:relative; background-size: 100%; display:inline-block; margin-top: -80px;margin-left:-225px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="mcoB"class="Info6">ealtamirano91</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 5px;">
                                <span class="Info5">MCO</span>                         
                            </div>
                           
                        </div>  
                <!---LD----->         
                         <div onmouseover="visible('ldB')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:87px; left:795px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-225px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="ldB"class="Info6">kelly%20uchiha</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 17px;">
                                <span class="Info5">LD</span>                         
                            </div>
                           
                        </div> 
                   <!---POR----->         
                         <div onmouseover="visible('porB')"  onmouseout="ocultar()" style=" background:url(/images/CPSemana.png); width: 67px; height:105px; top:87px; left:1020px; position:relative; background-size: 100%; display:inline-block; margin-top: -85px;margin-left:-210px; ">              
                            
                            <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/FERACE/avatar-body.png); background-size:45px 85px;background-repeat: no-repeat;  display:inline-block; margin-top: 7px;margin-left: 27px; width: 50px; height: 46px;">  </div>
                            <div style="background:url(/Imagenes/INTERNACIONAL/MEXICO-FOOTBALL-LOGO.png); background-size: cover; width: 30px; height:30px; position:relative; top:-39px; margin-left: 4px;"></div>          
                            <div style="width: 182px; margin-top: -40px; margin-left: -57px; text-align:center;">
                                <span id="porB" class="Info6">FERACE</span>
                            </div>
                            <div style="width: 60px; margin-top: -4px; margin-left: 6px;">
                                <span class="Info5">POR</span>                         
                            </div>
                           
                        </div>
             
         </div>          
           
            
        </div>
            



</body>
</html>