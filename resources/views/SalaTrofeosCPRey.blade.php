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
      
      imagen.src="/images/trofeoRey.png";
    break;
  case "2da":
    imagen.src="/images/trofeoRey.png";
    break;
    case "3ra":
    imagen.src="/images/trofeoRey.png";
    break;
    
  case "4ta":
    imagen.src="/images/trofeoRey.png";
   break;
   
  default:
    imagen.src="/images/trofeoRey.png";
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


        <li><a href="/clubes-pro">CLUBES</a>

        </li>





        <li><a href="Transferencias">TRANSFERENCIAS</a>

        </li>

        <li><a href="RankingCP">RANKING POR CLUBES</a>

        <li><a href="SalaTrofeosCP">SALA DE TROFEOS</a></li>
        <li><a href="Equipo_CP">EQUIPO DE LA SEMANA</a></li>

        </li>



    </ul>


</div>

        <div id="menuCentral" style="background:url(//images/middleMenu.jpeg); background-size: cover; margin-left: -80px;" >
                 
                     <div>
                        <ul id="MenuPerfil" style="width: 230px;">                           
                            <li id="ListaPerfil"><a href="SalaTrofeosCP">&lt;</a></li>
                            <li id="ListaPerfil"><a href="#">REY DE REYES</a></li>
                        </ul>

                    </div>
                  
      <div class="myBox"style="background-image: url(//images/canchaF.png); background-size: cover; position: absolute; width: 780px; height: 600px; margin-left: 210px; top: 100px;-webkit-border-radius: 20px 20px;-webkit-border-radius: 20px 20px;">  
           <div onmouseover="muestra('star');" onmouseout="ocultar('star');" class="cuadro" style="margin-left: 20px; margin-top: 70px;">
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPAÑA/REAL_MADRID-LOGO.png"></div>
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
                            <img id="star" src="/images/reyCP.png" style="display: none;margin-top: 50px; margin-left: 440px; width: 80px;">
                            <img id="trofeoImg" src="" style="margin-top: -150px; margin-left: 600px; height: 150px">                         
                            
                            
                            <script>selTrofeo('divi', 'trofeoImg');</script>
                            

           </div>
             <br ></br> <br ></br>
            
              
          <!--seccion que se debe repetir de aqui para abajo se borra solo es para presentación-->
          <div onmouseover="muestra('star2');" onmouseout="ocultar('star2');" class="cuadro" style="margin-left: 20px; margin-top: 70px;">
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPAÑA/FC_BARCELONA-LOGO.png"></div>
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
                            <img id="star2" src="/images/reyCP.png" style="display: none;margin-top: 50px; margin-left: 440px; width: 80px;">
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
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPAÑA/MÁLAGA_CLUB_DE_FÚTBOL-LOGO.png"></div>
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
                            <img id="star3" src="/images/reyCP.png" style="display: none;margin-top: 50px; margin-left: 440px; width: 80px;">
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
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPAÑA/REAL_BETIS_BALOMPIÉ-LOGO.png"></div>
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
                            <img id="star4" src="/images/reyCP.png" style="display: none;margin-top: 50px; margin-left: 440px; width: 80px;">
                            <img id="trofeoImg4" src="" style="margin-top: -150px; margin-left: 600px; height: 150px;">
                            <script>selTrofeo('divi4', 'trofeoImg4');</script>
                            
                            <br style="height: 250px"></br>
                            
           </div>
           
        </div>
@endsection


