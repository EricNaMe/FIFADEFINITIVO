@extends('template')

@section('content')
       
        
        <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>HOME</a>
               
          </ul>
            
            
        </div>

        @include('partial.navbar')

        
        <div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover;" >
                 
            
            <div id="Menu1vs1" style="background-color:gray; position:relative; height: 100px; width:900px; left:100px; top:100px;">
              
                
                <a href="#" class="myButton"><div style="width:30px; height: 30px; display:inline-block; background:url(images/calendar.png); background-size: cover;"></div>Calendario</a>
                
                
            </div>
            
            
            <div id="TablaPrimera" style="position: absolute; top:30%; left:10%;">
                
                
                <table>
                    <thead>
                    <tr>
                    <th>Posición</th>
                    <th>Equipo</th>
                    <th>Jugador</th>
                    <th>Pts</th>
                    <th>JJ</th>
                    <th>JG</th>
                    <th>JE</th>
                    <th>JP</th>
                    <th>GF</th>
                    <th>GC</th>
                    <th>DG</th>
                    </tr>
                    </thead>
                    
                    <tr>
                        <td><div id="PosicionTabla">1</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/17.png); background-size:cover;"></div>Pumas</td>
                        <td>Mex Sturmtiger</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        
                        
                    </tr>
                    
                           
                    <tr>
                      
                        <td><div id="PosicionTabla">2</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/16.png); background-size:cover;"></div>Tigres</td>
                        <td>Sturm</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                      
                        
                          
                        
                    </tr>
                    
                       <tr>
                           <td><div id="PosicionTabla">3</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/2.png); background-size:cover;"></div>América</td>
                        <td>CocheXbox</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                      
                    </tr>
                    
                     <tr>
                         <td><div id="PosicionTabla">4</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/10.png); background-size:cover;"></div>Toluca</td>
                        <td>PedritoXbx</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                      
                        
                    </tr>
                    
                        <tr>
                            <td><div id="PosicionTabla">5</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/18.png); background-size:cover;"></div>Querétaro</td>
                        <td>Fulano39</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                      
                        
                    </tr>
                    
                         <tr>
                             <td><div id="PosicionTabla">6</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/14.png); background-size:cover;"></div>Santos</td>
                        <td>Castor98</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                     
                        
                    </tr>
                    
                    <tr>
                        <td><div id="PosicionTabla">7</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/12.png); background-size:cover;"></div>Guadalajara</td>
                        <td>Ardilla989</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                     
                        
                    </tr>
                    
                    
                       <tr>
                           <td><div id="PosicionTabla">8</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/9.png); background-size:cover;"></div>Cruz Azul</td>
                        <td>Halcon88</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                     
                     
                        
                    </tr>
                    
                       <tr>
                           <td><div id="PosicionTabla">9</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/1.png); background-size:cover;"></div>Chiapas</td>
                        <td>Marmota87</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                     
                        
                    </tr>
                    
                       <tr>
                           <td><div id="PosicionTabla">10</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/7.png); background-size:cover;"></div>Monterrey</td>
                        <td>Gato77</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                
                        
                    </tr>
                    
                       <tr>
                           <td><div id="PosicionTabla">11</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/15.png); background-size:cover;"></div>Veracruz</td>
                        <td>Reynoso55</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                       
                    
                        
                    </tr>
                    
                       <tr>
                           <td><div id="PosicionTabla">12</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/17.png); background-size:cover;"></div>Pachuca</td>
                        <td>Serb88</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                  
                        
                    </tr>
                    
                       <tr>
                           <td><div id="PosicionTabla">13</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/3.png); background-size:cover;"></div>Puebla</td>
                        <td>Marini77</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                     
                    
                        
                    </tr>
                    
                          <tr>
                        <td><div id="PosicionTabla">14</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/4.png); background-size:cover;"></div>Atlas</td>
                        <td>Costas66</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                  
                        
                    </tr>
                    
                          <tr>
                        <td><div id="PosicionTabla">15</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/11.png); background-size:cover;"></div>Dorados</td>
                        <td>Mari77</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                       
                      
                        
                    </tr>
                    
                          <tr>
                              <td><div id="PosicionTabla">16</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/6.png); background-size:cover;"></div>Tijuana</td>
                        <td>Marini77</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        
                       
                        
                    </tr>
                    
                          <tr>
                        <td><div id="PosicionTabla">17</div></td>  
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/8.png); background-size:cover;"></div>León</td>
                        <td>Pizzi77</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                    
                       
                        
                    </tr>
                    
                          <tr>
                        <td><div id="PosicionTabla">18</div></td>  
                      
                        <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(images/Clausura/13.png); background-size:cover;"></div>Morelia</td>
                        <td>Meza77</td>  
                        <td>0</td>  
                        <td>0</td>
                        <td>0</td> 
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        <td>0</td>  
                        
                      
                        
                    </tr>
                    
                    
                    
                </table>
                
                
                
                
            </div>
            
            
            
            
            
            
        </div>

@endsection