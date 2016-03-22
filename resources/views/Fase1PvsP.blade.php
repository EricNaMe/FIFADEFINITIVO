<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/1VS1Fase1.css" type="text/css" media="screen">
        <link rel="stylesheet" href="" type="text/css" media="screen">
        <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
       
        
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
                <li>FASE 1</a></li>
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

        <div id="menuCentral" style="background:url(/images/fut.jpg); width:1200px; height: 1400px; background-size:cover;" >
                          
            <table border="0" style="margin: 50px;" > 
                <caption class="td3">TORNEO FIFA 16 ELIMINATORIA</caption>
                
	
                  <tfoot>
                      <tr>
                         <td colspan="7" class="tdfloat">(todos los partidos se deben reportar dentro de la fecha establecida)</td>
                      </tr>
                  </tfoot>

                  <tbody>
                      <tr><td height=30></td></tr>
                      <tr>
                         <td width="100" class="td">Equipo1</td> 
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td ></td> 
                          <td width=180 rowspan="8"></td>
                      </tr>
                      <tr>
                           <td></td>
                          <td width="50"></td>
                          <td width="100" class="td">team(1/2)</td>  
                          
                      </tr>
                       <tr>
                         <td  class="td">Equipo2</td> 
                          <td>  </td>
                          <td>  </td>
                          <td>  </td>
                          <td> </td>
                          <td>  </td>                          
                          <td></td>  
                          
                      </tr>
                          <td></td> 
                          <td>  </td>
                          <td>  </td>
                          <td width="50">  </td>
                          <td width="100" class="td"> team(1-2/3-4) </td>
                          <td>  </td>
                          <td> </td>
                          
                      <tr>
                          
                      </tr>
                       <tr>
                         <td   class="td">Equipo3</td> 
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>                          
                      </tr>
                      <tr height=5>
                          <td></td>
                          <td></td>
                          <td  class="td">team(3/4)</td>   
                      </tr>
                       <tr>
                         <td   class="td">Equipo4</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td >  </td>
                          <td >  </td>
                          <td ></td>                          
                      </tr>
                       <tr height=25>
                            <td ></td> 
                          <td >  </td>
                          <td >  </td>
                          <td >  </td>
                          <td width=100></td>
                          <td width="50">  </td>
                          <td width="100"  class="td"> FINAL</td>                            
                       </tr>
                          <tr>
                         <td   class="td">Equipo5</td> 
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>                          
                      </tr>
                      <tr height=5>
                          <td></td>
                          <td></td>
                          <td  class="td">team(5/6)</td>   
                      </tr>
                       <tr>
                         <td   class="td">Equipo6</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td ></td>   
                          <td rowspan="9" style="background:url(/images/trofeo.png); background-size: cover; background-position-x: -10px;"></td>
                      </tr>
                      <tr height=25>
                         <td ></td> 
                          <td >  </td>
                          <td >  </td>
                          <td >  </td>
                          <td width=100  class="td"> team(5-6/7-8) </td>
                          <td >  </td>
                          <td > </td>   
                      </tr>
                       <tr>
                         <td   class="td">Equipo7</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td ></td>                          
                      </tr>
                      <tr height=5>
                          <td></td>
                          <td></td>
                          <td  class="td">team(7/8)</td>  
                      </tr>
                       <tr>
                         <td   class="td">Equipo8</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td > </td>                          
                      </tr>
                      <tr height=25>   
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td > </td> 
                          <td></td>
                          
                      </tr>
                       <tr>
                         <td   class="td">Equipo9</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td > </td> 
                          
                      </tr>
                      <tr height=5>
                          <td></td>
                          <td></td>
                          <td  class="td">team(9/10)</td>
                      </tr>
                       <tr>
                         <td   class="td">Equipo10</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td > </td>                          
                      </tr>
                      <tr height=25>   
                          <td ></td> 
                          <td >  </td>
                          <td >  </td>
                          <td >  </td>
                          <td width=100  class="td"> team(9-10/11-12) </td>
                          <td >  </td>
                          <td > </td>   
                          <td width=80 rowspan="4" class="td2">Ganador</td>
                      </tr>
                       <tr>
                         <td   class="td">Equipo11</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td > </td>                          
                      </tr>
                      <tr height=5>
                          <td></td>
                          <td></td>
                          <td  class="td">team(11/12)</td>
                      </tr>
                       <tr>
                         <td width=2  class="td">Equipo12</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td > </td>                          
                      </tr>
                       <tr height=25>
                         
                           <td ></td> 
                          <td >  </td>
                          <td >  </td>
                          <td >  </td>
                          <td width=100></td>
                          <td >  </td>
                          <td   class="td"> FINAL</td>  
                       </tr>
                          <tr>
                         <td   class="td">Equipo13</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td ></td>                          
                      </tr>
                      <tr height=5>
                           <td></td>
                          <td></td>
                          <td  class="td">team(13/14)</td>
                      </tr>
                       <tr>
                         <td   class="td">Equipo14</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td ></td>                          
                      </tr>
                      <tr height=25>
                          <td ></td> 
                          <td >  </td>
                          <td >  </td>
                          <td >  </td>
                          <td width=100  class="td"> team(13-14/15-16) </td>
                          <td >  </td>
                          <td > </td>   
                      </tr>
                       <tr>
                         <td   class="td">Equipo15</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td>
                          <td >  </td>
                          <td ></td>                          
                      </tr>
                      <tr height=5>
                          <td></td>
                          <td></td>
                          <td  class="td">team(15/16)</td> 
                      </tr>
                       <tr>
                         <td   class="td">Equipo16</td> 
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td > </td>
                          <td >  </td>
                          <td ></td> 
                          
                      </tr>
                      <tr height=25>                                                  
                      </tr>
                      
                  </tbody>
             
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


