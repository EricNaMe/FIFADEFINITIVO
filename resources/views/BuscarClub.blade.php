@extends('template')

@section('content')
       
        
        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>HOME</a></li>
               
          </ul>
            
            
        </div>

        <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >


            <div style="width: 500px; height:80px;background-color: whitesmoke; position:relative; top:100px; left:200px; ">
              <form action="" name="formBuscar" method="post" class="form-horizontal" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">   
             <div class="form-group">
                <label class="col-sm-2 control-label">Buscar:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="BuscarInput" type="text" value="">
                </div>
            </div> 
                  <div class="container">
                <button  type="button" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
              </form>    
            </div>
            
            
            
            
         <div id="TablaPrimera" style="position: absolute; top:30%; left:10%;">
            <table>
                <thead>
                <tr>
                    <th>Número</th>
                    <th>Equipo</th>
                    <th>DT</th>
                    <th>Pts</th>
               
                </tr>
                </thead>
          

       
               
                

                <tr>
                    <td><div id="PosicionTabla">   1</div></td>
                    <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(/images/Clausura/1.png); background-size:cover;"></div><a href="clubes-pro">Nombre equipo</a></td>
                    <td>Manager</td>
                    <td>Puntos</td>
                    <td>ss</td>
                  

                  
                </tr>
            
            </table>
        </div>



            
        </div>
        
        

    <script>
@endsection


