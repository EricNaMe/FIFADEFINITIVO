@extends('template')

@section('content')

    <link rel="stylesheet" href="/css/SalaTrofeosCP.css" type="text/css" media="screen">

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
      
      imagen.src="/images/trofeo.png";
    break;
  case "2da":
    imagen.src="/images/fifaTrofeo.png";
    break;
    case "3ra":
    imagen.src="/images/fifaTrofeo2.png";
    break;
    
  case "4ta":
    imagen.src="/images/fifaTrofeo3.png";
   break;
   
  default:
    imagen.src="/images/fifaTrofeo.png";
    break;
    }
}

</script>
       
        
        <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">
            
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
                
                 <li><a href="RankingCP">RANKING POR CLUBES</a>

              <li><a href="SalaTrofeosCP">SALA DE TROFEOS</a></li>
                <li><a href="Equipo_CP">EQUIPO DE LA SEMANA</a></li>
             
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

        
        <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover; margin-left: -80px;" >
                 
            
                    <div>
                        <ul id="MenuPerfil">
                            <li id="ListaPerfil"><a class="active" href="#">Campeón</a></li>
                            <li id="ListaPerfil"><a href="SalaTrofeosCPGol">Líder de Goleo</a></li>
                            <li id="ListaPerfil"><a href="SalaTrofeosCPAsi">Líder de Asistencias</a></li>
                            <li id="ListaPerfil"><a href="SalaTrofeosCPPor">Portero Invicto</a></li>
                            <li id="ListaPerfil"><a href="SalaTrofeosCPRey">&gt;</a></li>
                        </ul>

                    </div>
      <div class="myBox"style="background-image: url(/images/canchaF.png); background-size: cover; position: absolute; width: 780px; height: 600px; margin-left: 210px; top: 100px;-webkit-border-radius: 20px 20px;-webkit-border-radius: 20px 20px;">  
           <div onmouseover="muestra('star');" onmouseout="ocultar('star');" class="cuadro" style="margin-left: 20px; margin-top: 70px;">
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPANA/REAL_MADRID-LOGO.png"></div>
                                <div style="width: 30px; margin-top: -132px; margin-left: 150px;">
                                    <span class="Info">TEMPORADA</span>
                                    <br></br>
                                    <span class="Info">DIVISION</span>
                                    <br></br>
                                    <span class="Info">NOMBRE</span>
                                    
                                </div>
                               <div style="width: 300px; margin-top: -105px; margin-left: 300px;">
                                    <span id="temp" class="Info2">8va</span>
                                    <br></br>
                                    <span id="divi" class="Info2">1ra</span>
                                    <br></br>
                                    <span id="nomb"class="Info2">ALDEBARAN FC</span>
                                 
                                </div>
                            <img id="star" src="/images/star.png" style="display: none;margin-top: 15px; margin-left: 430px; width: 80px;">
                            <img id="trofeoImg" src="" style="margin-top: -150px; margin-left: 600px; height: 150px">                         
                            
                            
                            <script>selTrofeo('divi', 'trofeoImg');</script>
                            

           </div>
             <br ></br> <br ></br>
            
              
          <!--seccion que se debe repetir de aqui para abajo se borra solo es para presentación-->
          <div onmouseover="muestra('star2');" onmouseout="ocultar('star2');" class="cuadro" style="margin-left: 20px; margin-top: 70px;">
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPANA/FC_BARCELONA-LOGO.png"></div>
                                <div style="width: 30px; margin-top: -132px; margin-left: 150px;">
                                    <span class="Info">TEMPORADA</span>
                                    <br></br>
                                    <span class="Info">DIVISION</span>
                                    <br></br>
                                    <span class="Info">NOMBRE</span>
                                    
                                </div>
                               <div style="width: 300px; margin-top: -105px; margin-left: 300px;">
                                    <span id="temp2" class="Info2">2da</span>
                                    <br></br>
                                    <span id="divi2" class="Info2">2da</span>
                                    <br></br>
                                    <span id="nomb2"class="Info2">ALDEBARAN FC</span>
                                 
                                </div>
                            <img id="star2" src="/images/star.png" style="display: none;margin-top: 15px; margin-left: 430px; width: 80px;">
                            <img id="trofeoImg2" src="" style="margin-top: -150px; margin-left: 600px;  height: 150px">
                            <script>selTrofeo('divi2', 'trofeoImg2');</script>
                            
                           <br> </br>
                            <br></br>
                            <br></br>
                            <br></br>
                            <br></br>
                            <br></br>
           </div>
          <br ></br> <br ></br>
          <div onmouseover="muestra('star3');" onmouseout="ocultar('star3');" class="cuadro" style="margin-left: 20px; margin-top: 70px;">
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPANA/MALAGA_CLUB_DE_FUTBOL-LOGO.png"></div>
                                <div style="width: 30px; margin-top: -132px; margin-left: 150px;">
                                    <span class="Info">TEMPORADA</span>
                                    <br></br>
                                    <span class="Info">DIVISION</span>
                                    <br></br>
                                    <span class="Info">NOMBRE</span>
                                    
                                </div>
                               <div style="width: 300px; margin-top: -105px; margin-left: 300px;">
                                    <span id="temp3" class="Info2">1ra</span>
                                    <br></br>
                                    <span id="divi3" class="Info2">3ra</span>
                                    <br></br>
                                    <span id="nomb3"class="Info2">ALDEBARAN FC</span>
                                 
                                </div>
                            <img id="star3" src="/images/star.png" style="display: none;margin-top: 15px; margin-left: 430px; width: 80px;">
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
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPANA/REAL_BETIS_BALOMPIÉ-LOGO.png"></div>
                                <div style="width: 30px; margin-top: -132px; margin-left: 150px;">
                                    <span class="Info">TEMPORADA</span>
                                    <br></br>
                                    <span class="Info">DIVISION</span>
                                    <br></br>
                                    <span class="Info">NOMBRE</span>
                                    
                                </div>
                               <div style="width: 300px; margin-top: -105px; margin-left: 300px;">
                                    <span id="temp4" class="Info2">5ta</span>
                                    <br></br>
                                    <span id="divi4" class="Info2">4ta</span>
                                    <br></br>
                                    <span id="nomb4"class="Info2">ALDEBARAN FC</span>
                                 
                                </div>
                            <img id="star4" src="/images/star.png" style="display: none;margin-top: 15px; margin-left: 430px; width: 80px;">
                            <img id="trofeoImg4" src="" style="margin-top: -150px; margin-left: 600px; height: 150px;">
                            <script>selTrofeo('divi4', 'trofeoImg4');</script>
                            
                            <br style="height: 250px"></br>
                            
           </div>
           
        </div> 

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
@endsection
