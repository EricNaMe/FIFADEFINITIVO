<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/Ranking.css" type="text/css" media="screen">
        <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body class="back">
       
        
        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>1 VS 1</a>
               
                <li><a>DIVISIONES LIGA</a>
                <ul>
                <li><a>PRIMERA DIVISIÓN</a></li>id
                <li><a>SEGUNDA DIVISIÓN A</a></li>
                <li><a>SEGUNDA DIVISIÓN B</a></li>
                <li><a>TERCERA DIVISIÓN A</a></li>
                <li><a>TERCERA DIVISIÓN B</a></li>
              
                </ul>
                </li>
                
                
                <li><a>COPA</a>
                <ul>
                <li><a href="Fase1PvsP">FASE 1</a></li>
                <li><a href="Fases">FASE 2</a></li>
                <li><a>FASE 3</a></li>
                
                </ul>
                </li>
                <li><a href="#">SALA DE TROFEOS 1VS1</a></li>
                <li><a href="Ranking1VS1">RANKING</a></li>
                <li><a>ADMINISTRADOR</a>
                <ul>
                <li><a>CREAR TORNEO</a></li>
                <li><a>CREAR COPA</a></li>
                
                
                
                </ul>
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

        <div id="menuCentral"  >
                 
         <div>
               
                <h1 class="title">RANKING 1 VS 1</h1>
            </div>
            <div style="background-color: crimson; height:5px; position: relative;" class="banner"></div>
            <div style="background-color: transparent; height:50px; position: relative;"></div>
            
             <div class="datagrid" style="width: 800px; height: 1050px; margin-left: 100px;"><table border="0">
                    <thead><tr><th colspan="2" style="text-align: center;">Ranking 1VS1</th><th style="text-align: center;"><h1 >☆</h1></th><th style="text-align: center;"><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
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
            </table></div>
           
        </div>    
        
        
    </body>
    
    <script>
    
    $(document).ready(function () {
  $('#ListaMenuLateral > li > a').click(function(){
    if ($(this).attr('class') != 'active'){
      $('#ListaMenuLateral li ul').slideUp();
      $(this).next().slideToggle();
      $('#ListaMenuLateral li a').removeClass('active');
      $(this).addClass('active');
    }
  });
});
    </script>
</html>


