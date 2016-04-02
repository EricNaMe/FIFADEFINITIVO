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
    <body >
        <script>
  function valReportar(id, btn)
  {
      
      if(document.getElementById(id).textContent=="")
      {
          // se reporta partido con el siguiente formato
          // EquipoA&nbsp;&nbsp;-&nbsp;&nbsp;EquipoB
          document.location.href="Rfases";
          alert('Se Reporto Partido con exito');
      }
      else{
          //Aqui se debe validar si toda la información esta completa si no si debe de permitir llenar lo que falta
          alert('El partido Ya Se Reporto con Exito');
          document.getElementById(btn).disabled= true;
      }
      
  }    

        </script>
        @extends('template')

        @section('content')
        
        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
                            <li><a href="Inicio">HOME</a></li>
              @if (Auth::check())
                  <?php $user=Auth::user();
                  ?>

                  @if($user->user_name==="Administrador22")
                      <li><a>ADMINISTRADOR</a>
                          <ul>
                              <li><a href="/CrearLiga">CREAR LIGA</a></li>
                              <li><a href="/CrearCopa">CREAR COPA</a></li>
                              <li><a href="/Divisiones">ASIGNAR EQUIPOS</a></li>
                              <li><a href="/EliminarEquiposPvsP">ELIMINAR EQUIPOS</a></li>
                              <li><a href="/ModificarLiga">MODIFICAR LIGA</a></li>
                              <li><a href="/ModificarCopa">MODIFICAR COPA</a></li>


                          </ul>
                      </li>

                  @endif
              @endif

              <li><a>DIVISIONES LIGA</a>
                <ul>
                <li><a href="#">PRIMERA DIVISIÓN</a></li>
                    @foreach($ligas as $liga)
                        <li><a href="EncontrarLigaPlay/{{$liga->id}}">{{$liga->name}}</a></li>

                    @endforeach

                </ul>
                </li>


                <li><a>COPA</a>
                <ul>
                <li><a href="Fase1PvsP">ELIMINATORIAS</a></li>
                    @foreach($copas as $copa)
                <li><a href="EncontrarCopaPlay/{{$copa->id}}">{{$copa->name}}</a></li>

                    @endforeach
                <li><a href="Fases">PRELIMINARES 1</a></li>
                </ul>
                </li>
              <li><a href="SalaTrofeo1vs1">SALA DE TROFEOS 1VS1</a></li>
              <li><a href="Ranking1VS1">RANKING</a></li>


        </div>
 
        <div id="menuCentral" style="background:url(/images/balon.png); background: no-repeat;" >              
           
         <div style="margin-top: 25px; margin-left: 250px;"><img src="images/Resultados.png" width="500"></div>
            <div id="equipoA"class="title" style="margin-left: 20px; margin-top: 10px; text-align: left; font-size: 48px;">AMERICA&nbsp;&nbsp; <img src="/images/Clausura/1.png" width="50"></div>
            <div id="contenedor" style="margin-left: 190px; margin-top: 40px;">
                
                    <div id="contenidos1">                            
                            <div id="columna11" ></div>
                            <div id="columna11"></div> 
                            <div id="columna11" >Goles</div>
                            <div id="columna11" >Tarjetas Amarillas</div>                            
                            <div id="columna11" >Tarjetas Rojas</div>  
                            <div id="columna11" >Asistencias</div>  
                     </div>
                    <div id="contenidos">                            
                        <div id="columna1" style="width:60px;"><img id="imgJugador" align="left"src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png" width="40"></div>
                        <div id="columna1" class="titleA" style="font-size: 30px;"><div id="jugador">werux</div> </div>
                            <div id="columna1" >
                                    <select> 
                                        <option class="dos" selected="selected">-</option> 
                                        <option class="uno">1</option> 
                                        <option class="dos">2</option> 
                                        <option class="uno">3</option> 
                                        <option class="dos">4</option> 
                                        <option class="uno">5</option> 
                                        <option class="dos">6</option> 
                                        <option class="uno">7</option> 
                                        <option class="dos">8</option> 
                                        <option class="uno">9</option> 
                                        <option class="dos">10</option> 
                                    </select>
                            </div>
                            <div id="columna1" >
                                    <select>
                                         <option class="dos" selected="selected">-</option> 
                                        <option class="uno">1</option> 
                                        <option class="dos">2</option>                                        
                                    </select>
                            </div>                            
                            <div id="columna1" >
                                 <select> 
                                        <option class="dos" selected="selected">-</option> 
                                        <option class="uno">1</option>                                                                            
                                </select>
                            </div>                                                    
                            <div id="columna1" >
                                 <select> 
                                         <option class="dos" selected="selected">-</option> 
                                        <option class="uno">1</option> 
                                        <option class="dos">2</option>       
                                        <option class="uno">3</option> 
                                        <option class="dos">4</option> 
                                        <option class="uno">5</option> 
                                        <option class="dos">6</option> 
                                        <option class="uno">7</option> 
                                        <option class="dos">8</option> 
                                        <option class="uno">9</option> 
                                        <option class="dos">10</option> 
                                </select>
                            </div> 
                     </div>
                    <div id="contenidos">                            
                            <div id="columna1" ></div>
                            <div id="columna1"></div> 
                            <div id="columna1" ></div>
                            <div id="columna1" ></div>                            
                            <div id="columna1" ></div>  
                            <div id="columna1" ><button id="boton4" type="button"  onclick="alert('Registro Existoso');">Reportar</button></div>  
                     </div>                
            </div>
              <div id="equipoB"class="title" style="margin-left: 20px; margin-top: 10px; text-align: left; font-size: 48px;">CRUZ AZUL&nbsp;&nbsp; <img src="/images/Clausura/2.png" width="50"></div>
            <div id="contenedor" style="margin-left: 190px; margin-top: 40px;">
                
                    <div id="contenidos1">                            
                            <div id="columna11" ></div>
                            <div id="columna11"></div> 
                            <div id="columna11" >Goles</div>
                            <div id="columna11" >Tarjetas Amarillas</div>                            
                            <div id="columna11" >Tarjetas Rojas</div>  
                            <div id="columna11" >Asistencias</div>  
                     </div>
                    <div id="contenidos">                            
                        <div id="columna1" style="width:60px;"><img id="imgJugador" align="left"src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png" width="40"></div>
                        <div id="columna1" class="titleA" style="font-size: 30px;"><div id="jugador">Rotciv26</div> </div>
                            <div id="columna1" >
                                    <select> 
                                        <option class="dos" selected="selected">-</option> 
                                        <option class="uno">1</option> 
                                        <option class="dos">2</option> 
                                        <option class="uno">3</option> 
                                        <option class="dos">4</option> 
                                        <option class="uno">5</option> 
                                        <option class="dos">6</option> 
                                        <option class="uno">7</option> 
                                        <option class="dos">8</option> 
                                        <option class="uno">9</option> 
                                        <option class="dos">10</option> 
                                    </select>
                            </div>
                            <div id="columna1" >
                                    <select>
                                         <option class="dos" selected="selected">-</option> 
                                        <option class="uno">1</option> 
                                        <option class="dos">2</option>                                        
                                    </select>
                            </div>                            
                            <div id="columna1" >
                                 <select> 
                                        <option class="dos" selected="selected">-</option> 
                                        <option class="uno">1</option>                                                                            
                                </select>
                            </div>                                                    
                            <div id="columna1" >
                                 <select> 
                                         <option class="dos" selected="selected">-</option> 
                                        <option class="uno">1</option> 
                                        <option class="dos">2</option>       
                                        <option class="uno">3</option> 
                                        <option class="dos">4</option> 
                                        <option class="uno">5</option> 
                                        <option class="dos">6</option> 
                                        <option class="uno">7</option> 
                                        <option class="dos">8</option> 
                                        <option class="uno">9</option> 
                                        <option class="dos">10</option> 
                                </select>
                            </div> 
                     </div>
                    <div id="contenidos">                            
                            <div id="columna1" ></div>
                            <div id="columna1"></div> 
                            <div id="columna1" ></div>
                            <div id="columna1" ></div>                            
                            <div id="columna1" ></div>  
                            <div id="columna1" ><button id="boton4" type="button"  onclick="alert('Registro Existoso');">Reportar</button></div>  
                     </div>
                    
           
                
          
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


