<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/MenuPrincipalCSS3.css" type="text/css" media="screen">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
       
        
        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>CLUBES PRO</a>
               
                <li><a>TORNEOS VIGENTES</a>
              <!--  <ul>
                <li><a>PRIMERA DIVISIÓN</a></li>
                <li><a>SEGUNDA DIVISIÓN A</a></li>
                <li><a>SEGUNDA DIVISIÓN B</a></li>
                <li><a>TERCERA DIVISIÓN A</a></li>
                <li><a>TERCERA DIVISIÓN B</a></li>
              
                </ul>-->
                </li>
                
                
                <li><a>CLUBES</a>
            <ul>
                <li><a>BUSCAR CLUB</a></li>
                <li><a href="CrearClub">CREAR CLUB</a></li>
            
              
                </ul>
                </li>
                
                <li><a>JUGADORES</a>
             
                </li>
                
                 <li><a>TRANSFERENCIAS</a>
             
                </li>
                
                 <li><a>RANKING POR CLUBES</a>
             
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
        
        <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >
                 
            <div style="width: 700px; height: 500px; position:relative;top:100px;left:200px; background-color: whitesmoke;">

    <div class="container">
        <h2>Entrar a equipo</h2>
        <form action="" name="FormaAlta" method="post" class="form-horizontal" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="InputIdEditar" value="{{Auth::User()->id}}"/>
            <input type="hidden" name="IdClub" value="{{$club->id}}"/>

            <div class="form-group">
                <label class="col-sm-2 control-label">Usuario:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="UsuarioInput" disabled type="text" value="{{Auth::User()->user_name}}">
                </div>
            </div>
            
            
               <div class="form-group">
                <label class="col-sm-2 control-label">Equipo:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="UsuarioInput" disabled type="text" value="{{$club->name}}">
                </div>
            </div>

            <div class="form-group">
                <label for="disabledSelect" class="col-sm-2 control-label">Posición</label>
                <div class="col-sm-5">
                    <select name="PosicionSelect" id="PosicionSelect"  class="form-control">
                        <option value="PO">PO</option>
                        <option value="DFC">DFC</option>
                        <option value="LTI">LTI</option>
                        <option value="LTD">LTD</option>
                        <option value="MCD">MCD</option>
                        <option value="MC">MC</option>
                        <option value="MI">MI</option>
                        <option value="MD">MD</option>
                        <option value="MCO">MCO</option>
                        <option value="EI">EI</option>
                        <option value="ED">ED</option>
                        <option value="DI">DI</option>
                        <option value="DD">DD</option>
                        <option value="DC">DC</option>
                    </select>
                </div>
            </div>

           

           



          

         

            <div class="container">
                <button  type="button" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>






        </form>
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


