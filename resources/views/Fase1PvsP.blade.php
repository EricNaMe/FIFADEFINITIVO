@extends('template')

@section('content')
    <link rel="stylesheet" href="/css/1VS1Fase1.css" type="text/css" media="screen">
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
@endsection