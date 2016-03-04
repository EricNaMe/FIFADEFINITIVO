<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/PVSP.css" type="text/css" media="screen">
        <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body class="back" >
       
        
        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>1 VS 1</a>
               
                <li><a>DIVISIONES LIGA</a>
                <ul>
                <li><a>PRIMERA DIVISIÓN</a></li>
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
                <li><a href="#.php">SALA DE TROFEOS 1VS1</a></li>
                <li><a href="Ranking1VS1">RANKING</a></li>
                
                <li><a>ADMINISTRADOR</a>
                <ul>
                <li><a>CREAR TORNEO</a></li>
                <li><a>CREAR COPA</a></li>
                
                
                
                </ul>

                </li>
              <li><a href="Inicio">HOME</a></li>
                
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

        <div id="menuCentral" style="background:url(../../../../../Users/INIFAP/Desktop/fifacoche/TorneoFIFA-MenuDesplegable/Imagenes/balon.png); background: no-repeat;" >
                 
           
            <div>
               <IMG src="images/balon.png" ALIGN=right WIDTH=350 style="margin-right:220px; margin-top: 140px">
               <h1 class="title" align="left">Eliminatorias</h1>
                <div style="background-color: crimson; height:5px; position: relative;" class="banner"></div>
                <div style="background-color: transparent; height:50px; position: relative;"></div>
                
            </div>
            
            <table BORDER=10 style="margin-left: 60px" style="background-color: #ffffff">
                <tr>
                    <td>
                    <TABLE BORDER=0 align="center" style="background-color: #ffffff">                        
                        <tr height="20" style="background-color: azure;"><td height="25" colspan="5"><h4 style="text-align: right; font-size: 35px; color: darkred;">Encuentros</h4></td>
                            <td colspan="3"><img alt="Imagen" src="/images/encuentros.png" height="90" width="110" /></td>
                        </tr>
                    <tr>                       
                        <td ><img alt="Imagen" src="/images/internacional/argentina-hd-logo.png" height="50" width="50" /></td>
                        <td class="title3" width="180">Argentina</td>
                        <td width="15"></td>
                         <td class="title2">VS</td>    
                         <td width="15"></td>
                        <td class="title3" width="180">México</td>
                        <td><img alt="Imagen" src="/images/internacional/mexico-football-association.png" height="50" width="50" /></td>
                    </tr>                    
                    <tr><td height="30"></td></tr>
                     <tr>
                         
                    <tr>                       
                        <td ><img alt="Imagen" src="/images/internacional/Costa_Marfil.png" height="50" width="50" /></td>
                        <td class="title3" width="180">Costa de Marfil</td>
                        <td width="15"></td>
                         <td class="title2">VS</td>    
                         <td width="15"></td>
                        <td class="title3" width="180">Australia</td>
                        <td><img alt="Imagen" src="/images/internacional/australia-hd-logo.png" height="50" width="50" /></td>
                    </tr>                    
                    <tr><td height="30"></td></tr>
                     <tr>
                     
                         <tr>                       
                        <td ><img alt="Imagen" src="/images/internacional/austria-hd-logo.png" height="50" width="50" /></td>
                        <td class="title3" width="180">Austria</td>
                        <td width="15"></td>
                         <td class="title2">VS</td>    
                         <td width="15"></td>
                        <td class="title3" width="180">Bélgica</td>
                        <td><img alt="Imagen" src="/images/internacional/belgium-hd-logo.png" height="50" width="50" /></td>
                    </tr>                    
                    <tr><td height="30"></td></tr>
                     <tr>
                     
                           <tr>                       
                        <td ><img alt="Imagen" src="/images/internacional/argentina-hd-logo.png" height="50" width="50" /></td>
                        <td class="title3" width="180">Argentina</td>
                        <td width="15"></td>
                         <td class="title2">VS</td>    
                         <td width="15"></td>
                        <td class="title3" width="180">México</td>
                        <td><img alt="Imagen" src="/images/internacional/mexico-football-association.png" height="50" width="50" /></td>
                    </tr>                    
                    <tr><td height="30"></td></tr>
                     <tr>
                         



                    </TABLE>
                    </td>  
                </tr>
                
            </table>
            
            
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


