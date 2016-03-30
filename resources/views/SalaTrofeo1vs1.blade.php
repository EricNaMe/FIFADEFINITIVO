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
      
      imagen.src="/images/trofeoCopa.png";
    break;
  case "2da":
    imagen.src="/images/trofeoCopa.png";
    break;
    case "3ra":
    imagen.src="/images/trofeoCopa.png";
    break;
    
  case "4ta":
    imagen.src="/images/trofeoCopa.png";
   break;
   
  default:
    imagen.src="/images/trofeoCopa.png";
    break;
    }
}

</script>

                @extends('template')

                @section('content')


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




        
        <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover; margin-left: -80px;" >
                 
            
                    <div>
                        <ul id="MenuPerfil">
                            <li id="ListaPerfil"><a class="active" href="#">Campeón COPA</a></li>                        
                            <li id="ListaPerfil"><a  href="SalaTrofeo1vs1Div">Campeón DIVISIÓN</a></li>                        
                        </ul>

                    </div>
      <div class="myBox"style="background-image: url(/images/canchaF.png); background-size: cover; position: absolute; width: 780px; height: 600px; margin-left: 210px; top: 100px;-webkit-border-radius: 20px 20px;-webkit-border-radius: 20px 20px;">  
           <div onmouseover="muestra('star');" onmouseout="ocultar('star');" class="cuadro" style="margin-left: 20px; margin-top: 70px;">
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPANA/REAL_SOCIEDAD_DE_FUTBOL-LOGO.png"></div>
                                <div style="width: 30px; margin-top: -132px; margin-left: 150px;">
                                    <span class="Info">COPA</span>
                                    <br></br>
                                    <span class="Info">EQUIPO</span>
                                    <br></br>
                                    <span class="Info">GT</span>
                                    
                                </div>
                               <div style="width: 300px; margin-top: -105px; margin-left: 300px;">
                                    <span id="temp" class="Info2">Edición No. 1</span>
                                    <br></br>
                                    <span id="divi" class="Info2">BARCELONA</span>
                                    <br></br>
                                    <span id="nomb"class="Info2">WERUX</span>
                                 
                                </div>
                            <img id="star" src="/images/star3.png" style="display: none;margin-top: 15px; margin-left: 430px; width: 80px;">
                            <img id="trofeoImg" src="" style="margin-top: -150px; margin-left: 600px; height: 150px">                         
                            
                            
                            <script>selTrofeo('divi', 'trofeoImg');</script>
                            

           </div>
             <br ></br> <br ></br>
            
              
          <!--seccion que se debe repetir de aqui para abajo se borra solo es para presentación-->
          <div onmouseover="muestra('star2');" onmouseout="ocultar('star2');" class="cuadro" style="margin-left: 20px; margin-top: 70px;">
                            <div style="margin-top: 5px; margin-left: -15px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="/Imagenes/LIGA_BBVA_ESPANA/GETAFE_CLUB_DE_FUTBOL-LOGO.png"></div>
                                <div style="width: 30px; margin-top: -132px; margin-left: 150px;">
                                    <span class="Info">COPA</span>
                                    <br></br>
                                    <span class="Info">EQUIPO</span>
                                    <br></br>
                                    <span class="Info">GT</span>
                                    
                                </div>
                               <div style="width: 300px; margin-top: -105px; margin-left: 300px;">
                                    <span id="temp2" class="Info2">Edición No. 3</span>
                                    <br></br>
                                    <span id="divi2" class="Info2">BAYER</span>
                                    <br></br>
                                    <span id="nomb2"class="Info2">FERACE</span>
                                 
                                </div>
                            <img id="star2" src="/images/star3.png" style="display: none;margin-top: 15px; margin-left: 430px; width: 80px;">
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


@endsection;