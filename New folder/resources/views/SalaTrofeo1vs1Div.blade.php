<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/SalaTrofeos1vs1.css" type="text/css" media="screen">
        <link rel="stylesheet" href="" type="text/css" media="screen">
        <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
                <script>
    function muestra(star){
 
    obj = document.getElementById(star);
    obj.style.display = "block"; 
       
}
 
function ocultar(star){
    obj = document.getElementById(star);
    obj.style.display = "none";
 
}
function selTrofeo(trofeo, idTrofeo)
{
    trofeo = document.getElementById(trofeo).textContent;
         
     imagen = document.getElementById(idTrofeo);
    switch (trofeo) {
  case "1ra":
      
      imagen.src="/images/trofeoDiv1.png";
    break;
  case "2da":
    imagen.src="/images/trofeoDiv1.png";
    break;
    case "3ra":
    imagen.src="/images/fifaTrofeo2.png";
    break;
    
  case "4ta":
    imagen.src="/images/fifaTrofeo3.png";
   break;
   
  default:
    imagen.src="/images/fifaTrofeo3.png";
    break;
    }
}

</script>
       
        
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

        <div id="menuCentral" style="background:url(/images/f1ut.jpg); width:1200px; height: 1400px; background-size:cover;" >
            
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

        
        <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover; margin-left: -80px;" >
                 
            
                    <div>
                        <ul id="MenuPerfil">
                            <li id="ListaPerfil"><a class="active" href="SalaTrofeo1vs1">Campeón COPA</a></li>                        
                            <li id="ListaPerfil"><a  href="#">Campeón DIVISIÓN</a></li>                        
                        </ul>

                    </div>
      <div class="myBox"style="background-image: url(/images/canchaF.png); background-size: cover; position: absolute; width: 780px; height: 600px; margin-left: 210px; top: 100px;-webkit-border-radius: 20px 20px;-webkit-border-radius: 20px 20px;">  
                     
              
          <!--seccion que se debe repetir de aqui para abajo se borra solo es para presentación-->
            <div onmouseover="muestra('star3');" onmouseout="ocultar('star3');" class="cuadro" style="margin-left: 20px; margin-top: 70px;">
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPANA/SD_EIBAR-LOGO.png"></div>
                                <div style="width: 30px; margin-top: -132px; margin-left: 150px;">
                                    <span class="Info">TEMPORADA</span>
                                    <br></br>
                                    <span class="Info">DIVISION</span>
                                    <br></br>
                                    <span class="Info">NOMBRE</span>
                                    
                                </div>
                               <div style="width: 300px; margin-top: -105px; margin-left: 300px;">
                                    <span id="temp3" class="Info2">Edición No. 1</span>
                                    <br></br>
                                    <span id="divi3" class="Info2">1ra</span>
                                    <br></br>
                                    <span id="nomb3"class="Info2">LEÑAS FC</span>
                                 
                                </div>
                            <img id="star3" src="/images/star2.png" style="display: none;margin-top: 15px; margin-left: 430px; width: 80px;">
                            <img id="trofeoImg3" src="" style="margin-top: -150px; margin-left: 600px; height: 150px">
                            <script>selTrofeo('divi3', 'trofeoImg3');</script>
                            
                            <br></br>
                            <br></br>
                            <br></br>
                            <br></br>
                            <br></br>
                            <br></br>
           </div>
          <br ></br> <br ></br>
           <div onmouseover="muestra('star4');" onmouseout="ocultar('star4');" class="cuadro" style="margin-left: 20px; margin-top: 70px;">
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPANA/REAL_SPORTING_DE_GIJON-LOGO.png"></div>
                                <div style="width: 30px; margin-top: -132px; margin-left: 150px;">
                                    <span class="Info">TEMPORADA</span>
                                    <br></br>
                                    <span class="Info">DIVISION</span>
                                    <br></br>
                                    <span class="Info">NOMBRE</span>
                                    
                                </div>
                               <div style="width: 300px; margin-top: -105px; margin-left: 300px;">
                                    <span id="temp4" class="Info2">Edición No. 3</span>
                                    <br></br>
                                    <span id="divi4" class="Info2">4ta</span>
                                    <br></br>
                                    <span id="nomb4"class="Info2">ALDEBARAN FC</span>
                                 
                                </div>
                            <img id="star4" src="/images/star2.png" style="display: none;margin-top: 15px; margin-left: 430px; width: 80px;">
                            <img id="trofeoImg4" src="" style="margin-top: -150px; margin-left: 600px; height: 150px;">
                            <script>selTrofeo('divi4', 'trofeoImg4');</script>
                            
                            <br style="height: 250px"></br>
                            
           </div> 
            <br ></br> <br ></br>                  
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


