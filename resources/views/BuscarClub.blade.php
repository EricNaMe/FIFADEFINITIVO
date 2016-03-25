@extends('template')

@section('content')
       
        
        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>HOME</a></li>
               
          </ul>
            
            
        </div>
     
     
        
        
        
            
        <div id="menuSuperior" style="background:url(/images/topMenu.jpeg); background-size: cover; ">
        
            <ul id="ListaMenuSuperior">
                <li><a href="CLUBESPRO">CLUBES PRO</a></li>
                <li><a href="PVSP">1 VS 1</a></li>
                <li><a>REGLAMENTO</a></li>
                <li><a>SALA DE TROFEOS</a></li>
                <li><a>NOTICIAS</a></li>
                @if (Auth::check())
               <li id="LoginMenu"><a href="#" ><div id="LogoEquipo" style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatarpic-l.png); background-size:cover;"></div>{{Auth::User()->usuario}}</a>
                    <ul id="SubMenu">

                        <li style="font-size: 12px; "><a href="Perfil" >Ver Perfil</a></li>
                        <li style="font-size: 12px; "><a href="EditarPerfil" >Editar Perfil</a></li>
                        <li style="font-size: 12px; "><a href="/auth/logout" >Cerrar sesión</a></li>


                    </ul>
                </li>
                @else
                <li id="LoginMenu"><a href="/auth/login" >LOGIN11</a>


                    <ul id="SubMenu">
                        <li style="font-size: 12px; "><a href="/auth/login" >Iniciar Sesión2</a></li>
                        <li style="font-size: 12px; margin-left: 5px; "><a href="/auth/register" >Registrarse</a></li>

                    </ul>
                </li>
                @endif
                 
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
                    <td style="text-align:left;"><div id="LogoEquipo" style=" background:url(/images/Clausura/1.png); background-size:cover;"></div><a href="ClubDetalles">Nombre equipo</a></td>
                    <td>Manager</td>
                    <td>Puntos</td>
                    <td>ss</td>
                  

                  
                </tr>
            
            </table>
        </div>



            
        </div>
        
        

    <script>
@endsection


