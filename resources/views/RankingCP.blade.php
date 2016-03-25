@extends('template')

@section('content')

    <link rel="stylesheet" href="/css/Ranking.css" type="text/css" media="screen">


    <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>CLUBES PRO</a>
               
                <li><a>TORNEOS VIGENTES</a>
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
                
                 <li><a href="#">RANKING POR CLUBES</a></li>
                 
                 <li><a href="SalaTrofeosCP">SALA DE TROFEOS</a></li>
                
                
                
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


        <div id="menuCentral" >
                 
             <div>
               
                <h1 class="title">RANKINGS Clubes PRO</h1>
            </div>
            <div style="background-color: crimson; height:5px; position: relative;" class="banner"></div>
            <div style="background-color: transparent; height:50px; position: relative;"></div>
            
           
         
            
             <table>
                <tr>
                    <td>
                            <div class="datagrid" style="width: 470px; height: 1050px; margin-left: 25px;"><table border="0">
                            <thead><tr><th colspan="2" style="text-align: center;">Ranking de Clubes</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th style="text-align: center;"><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                           <tbody><tr><td style="width: 10px;">1er</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;" >cochexbox123</td><td style="text-align: center;">Pts. 120</td></tr>
            <tr class="alt"><td>2do</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td style="text-align: center;">Pts. 115</td></tr>
            <tr><td>3er</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td style="text-align: center;">Pts. 105</td></tr>
            <tr class="alt"><td>4to</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td style="text-align: center;">Pts. 95</td></tr>
            <tr><td>5to</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td style="text-align: center;">Pts. 89</td></tr>
            <tr><td style="width: 10px;">6to</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td style="text-align: center;">Pts. 120</td></tr>
            <tr class="alt"><td>7mo</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td style="text-align: center;">Pts. 115</td></tr>
            <tr><td>8vo</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td style="text-align: center;">Pts. 105</td></tr>
            <tr class="alt"><td>9no</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td style="text-align: center;">Pts. 95</td></tr>
            <tr><td>10mo</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td style="text-align: center;"    >Pts. 89</td></tr>            
                           </tbody>
                           </table>   

                           </div>        
                        
                    </td>
                    <td width="25"></td>
                    <td >
                             <div style="width: 500px; height: 500px; margin-left: 0px; margin-top: -540px;"><table border="0">
                                     <img src="/images/stars.png" style="text-align: center; width: 490px; height: 490px;">
                          
                           </table>   

                           </div>   
                    </td>
                </tr>
                
            </table>
            <div style="background-color: transparent; height:80px; position: relative;"></div>
                   <table>
                <tr>
                    <td>
                            <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px""><table border="0">
                            <thead><tr><th colspan="2" style="text-align: center;">Delanteros</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                           <tbody><tr><td style="width: 10px;">1er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td>Pts. 120</td></tr>
                           <tr class="alt"><td>2do</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td>Pts. 115</td></tr>
                           <tr><td>3er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td>Pts. 105</td></tr>
                           <tr class="alt"><td>4to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td>Pts. 95</td></tr>
                           <tr><td>5to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td>Pts. 89</td></tr>
                           </tbody>
                           </table>   

                           </div>        
                        
                    </td>
                    <td width="45"></td>
                    <td>
                             <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px"><table border="0">
                            <thead><tr><th colspan="2" style="text-align: center;">Defensas</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                           <tbody><tr><td style="width: 10px;">1er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td>Pts. 120</td></tr>
                           <tr class="alt"><td>2do</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td>Pts. 115</td></tr>
                           <tr><td>3er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td>Pts. 105</td></tr>
                           <tr class="alt"><td>4to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td>Pts. 95</td></tr>
                           <tr><td>5to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td>Pts. 89</td></tr>
                           </tbody>
                           </table>   

                           </div>   
                    </td>
                </tr>
                
            </table>
             <div style="background-color: transparent; height:80px; position: relative;"></div>
                   <table>
                <tr>
                    <td>
                            <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px""><table border="0">
                            <thead><tr><th colspan="2" style="text-align: center;">Medios Ofensivos</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                           <tbody><tr><td style="width: 10px;">1er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td>Pts. 120</td></tr>
                           <tr class="alt"><td>2do</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td>Pts. 115</td></tr>
                           <tr><td>3er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td>Pts. 105</td></tr>
                           <tr class="alt"><td>4to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td>Pts. 95</td></tr>
                           <tr><td>5to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td>Pts. 89</td></tr>
                           </tbody>
                           </table>   

                           </div>        
                        
                    </td>
                    <td width="45"></td>
                    <td>
                             <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px"><table border="0">
                            <thead><tr><th colspan="2" style="text-align: center;">Medios Defensivos</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                           <tbody><tr><td style="width: 10px;">1er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td>Pts. 120</td></tr>
                           <tr class="alt"><td>2do</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td>Pts. 115</td></tr>
                           <tr><td>3er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td>Pts. 105</td></tr>
                           <tr class="alt"><td>4to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td>Pts. 95</td></tr>
                           <tr><td>5to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td>Pts. 89</td></tr>
                           </tbody>
                           </table>   

                           </div>   
                    </td>
                </tr>
                
            </table>
                <div style="background-color: transparent; height:80px; position: relative;"></div>
                   <table>
                <tr>
                    <td>
                            <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px""><table border="0">
                            <thead><tr><th colspan="2" style="text-align: center;">Porteros</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                           <tbody><tr><td style="width: 10px;">1er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td>Pts. 120</td></tr>
                           <tr class="alt"><td>2do</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td>Pts. 115</td></tr>
                           <tr><td>3er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td>Pts. 105</td></tr>
                           <tr class="alt"><td>4to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td>Pts. 95</td></tr>
                           <tr><td>5to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td>Pts. 89</td></tr>
                           </tbody>
                           </table>   

                           </div>        
                        
                    </td>
                   </table>
            
            
            
        </div>
@endsection
