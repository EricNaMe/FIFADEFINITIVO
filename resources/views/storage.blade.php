@extends('template')

@section('content')
        
        <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>HOME</a></li>
               
          </ul>
            
            
        </div>
     
     
        
        
            
        <div id="menuSuperior" style="background:url(images/topMenu.jpeg); background-size: cover; ">
        
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
                <li id="LoginMenu"><a href="/auth/login" >LOGIN</a>


                    <ul id="SubMenu">
                        <li style="font-size: 12px; "><a href="/auth/login" >Iniciar Sesión2</a></li>
                        <li style="font-size: 12px; margin-left: 5px; "><a href="/auth/register" >Registrarse</a></li>

                    </ul>
                </li>
                @endif
                 
            </ul>
        
        
        </div>
        
        <div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover;" >

            
            
             
<div class="container">
 
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
      <div class="panel-heading">Agregar archivos</div>
        <div class="panel-body">
          <form method="POST" action="" accept-charset="UTF-8" enctype="multipart/form-data">
            
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            <div class="form-group">
              <label class="col-md-4 control-label">Nuevo Archivo</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="file" >
              </div>
            </div>
 
            <div class="form-group">
              <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
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

    $(document).ready(function () {
        $('#ListaMenuSuperior > li > a').click(function(){
            if ($(this).attr('class') != 'active'){
                $('#ListaMenuSuperior li ul').slideUp();
                $(this).next().slideToggle();
                $('#ListaMenuSuperior li a').removeClass('active');
                $(this).addClass('active');
            }
        });
    });



    </script>
@endsection
 

