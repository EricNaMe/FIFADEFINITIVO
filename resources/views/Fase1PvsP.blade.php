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







        <div id="menuCentral" style="background:url(/images/fut.jpg); width:1200px; height: 1400px; background-size:cover;" >
            
             <div style=" background: url(/images/Eliminatoria.png); height: 60px; background-size: contain; background-repeat: no-repeat; position: relative; margin-left: 400px; margin-top:30px;"></div>               
             
            <table border="0" style="margin: 30px; margin-top: -50px;" >                          
	
                  <tfoot>
                      <tr>
                         <td colspan="7" class="tdfloat">(todos los partidos se deben reportar dentro de la fecha establecida)</td>
                      </tr>
                  </tfoot>

                  <tbody>
                      <tr>
                          <td><div class="td"><div id="1-1" style="width: 120px; margin-top: 5px;">ALDEBARAN FC</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/OSTERSUNDS_FK-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="1-1a" style="margin-top: -40px; margin-left: 160px;">1</div></td>                                                                         
                      </tr>   
                      <tr>
                             <tr >
                                <td ></td>
                                <td width="10"></td>
                                <td><div class="td"><div id="2-1" style="width: 120px; margin-top: 5px;">ALDEBARAN FC</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/OSTERSUNDS_FK-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="2-1a" style="margin-top: -40px; margin-left: 160px;">2</div></td>                                                                                                        

                            </tr>
                          
                      </tr>
                       <tr>
                            <td><div class="td"><div id="1-2" style="width: 100px; margin-top: 5px;">Los Infernaless</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/AIK_SOLNA-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="1-2a" style="margin-top: -40px; margin-left: 160px;">1</div></td>                                                                                                        
                                                                           
                      </tr> 
                      <tr height="60px;">                           
                                <td ></td>
                                <td width="10"></td>
                                <td></td>
                                <td width="20"></td>
                                <td><div ><div class="td"><div  id="3-1" style="width: 100px; margin-top: 5px;">ALDEBARAN FC</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/OSTERSUNDS_FK-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="3-1a" style="margin-top: -40px; margin-left: 160px;">3</div></div></td>                                                                                                        
                                                      
                          
                      </tr>
                       <tr>
                          <
                           <td><div class="td"><div id="1-3" style="width: 100px; margin-top: 5px;">FOS FC</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/DJURGARDENS_IF-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="1-3a" style="margin-top: -40px; margin-left: 160px;">1</div></td>                                                                                                        
                      </tr> 
                            <tr >
                                <td ></td>
                                <td width="10"></td>
                                
                                <td><div class="td"><div id="2-2" style="width: 100px; margin-top: 5px;">FOS FC</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/DJURGARDENS_IF-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="2-2a" style="margin-top: -40px; margin-left: 160px;">1</div></td>                                                                                                        
                                

                            </tr>
                       <tr>
                            <td><div class="td"><div id="1-4" style="width: 100px; margin-top: 5px;">CARIÑOSOS</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/GEFLE_IF-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="1-4a" style="margin-top: -40px; margin-left: 160px;">1</div></td>                                                                                                        
                          
                                                 
                      </tr> 
                      <tr height="60"></tr>
                       <tr>
                           <td><div class="td"><div id="1-5" style="width: 100px; margin-top: 5px;">LEÑAS FC</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/HELSINGBORGS_IF-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="1-5a" style="margin-top: -40px; margin-left: 160px;">1</div></td>                                                                                                        
                                                                          
                      </tr> 
                      <tr>
                             <tr >
                                <td ></td>
                                <td width="50"></td>
                                <td><div class="td"><div id="2-3" style="width: 100px; margin-top: 5px;">CANALLAS</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/HAMMARBY_IF-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="2-3a" style="margin-top: -40px; margin-left: 160px;">1</div></td>                                                                                                        
                             </tr>
                      </tr>
                       <tr>
                            <td><div class="td"><div id="1-6" style="width: 100px; margin-top: 5px;">CANALLAS</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/HAMMARBY_IF-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="1-6a" style="margin-top: -40px; margin-left: 160px;">1</div></td>                                                                                                                               
                      </tr> 
                      <tr height="60px;">
                                 <td ></td>
                                <td width="10"></td>
                                <td ></td>
                                 <td width="10"></td>.
                                 <td><div ><div class="td"><div  id="3-2" style="width: 100px; margin-top: 5px;">MISERABLES</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/IFK_GOTEBORG-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="3-2a" style="margin-top: -40px; margin-left: 160px;">2</div></div></td>                                                                                                        
                                 
                      </tr>
                       <tr>
                             <td><div class="td"><div id="1-7" style="width: 100px; margin-top: 5px;">CHICHAROS</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/KALMAR-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="1-7a" style="margin-top: -40px; margin-left: 165px;">1</div></td>                                                                                                                               
                                                                     
                      </tr> 
                      <tr >
                             <tr >
                                <td ></td>
                                <td width="50"></td>
                                 <td><div class="td"><div id="2-4" style="width: 100px; margin-top: 5px;">MISERABLES</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/IFK_GOTEBORG-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="2-4a" style="margin-top: -40px; margin-left: 160px;">1</div></td>
                             </tr>
                      </tr>
                       <tr>
                            <td><div class="td"><div id="1-8" style="width: 100px; margin-top: 5px;">MISERABLES</div> <div style="margin-top: -20px; margin-left: 120px; width:50px;"><img src="/Imagenes/ALLSVENSKAN_SUECIA/IFK_GOTEBORG-LOGO.png" style="width:20px;"></div></div> <div class="marcador"id="1-8a" style="margin-top: -40px; margin-left: 160px;">1</div></td>                        
                      </tr> 
                      <tr height="50px;"></tr>
                  
                      
                  </tbody>
             
           </table>  
             
            <div style="background: url('/images/trofeo.png'); width: 180px; height: 240px; background-size: cover; position: relative; top: 50px; right: -770px;"></div>
             <div class="td2" style="width: 200px; height: 140px; background-size: cover; position: relative; top: 100px; right: -250px;">
                 <div class="conte">
                 <ul class="ul2">
                             <li>CAMPEONES</li>
                             <li>DE</li>
                             <li>COPA</li>			     
                 </ul>
                 </div>
                 <div class="wnr" >ALDEBARAN FC<img src="/Imagenes/ALLSVENSKAN_SUECIA/OSTERSUNDS_FK-LOGO.png" style="width:45px; margin-top: -15px;" align="right"></div>
             </div>
             

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

@endsection
