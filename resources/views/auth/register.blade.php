

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
    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
     <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <title></title>
</head>
<body>


<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a>HOME</a>

    </ul>


</div>





<div id="menuSuperior" style="background:url(/images/topMenu.jpeg); background-size: cover; ">

    <ul id="ListaMenuSuperior" style="margin-left: 400px;">
        <li><a href="/CLUBESPRO">CLUBES PRO</a></li>
        <li><a href="/PVSP">1 VS 1</a></li>
        <li><a href="/Reglamento">REGLAMENTO</a></li>
        <li><a href="/Clips">CLIPS</a></li>
        <li><a href="/Noticias">NOTICIAS</a></li>
        @if (Auth::check())
            <li id="LoginMenu"><a href="#" ><div id="LogoEquipo" style=" background:url(https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatarpic-l.png); background-size:cover;"></div>{{Auth::User()->user_name}}</a>
                <ul id="SubMenu">

                    <li style="font-size: 12px; "><a href="/Perfil" >Ver Perfil</a></li>
                    <li style="font-size: 12px; "><a href="/EditarPerfil" >Editar Perfil</a></li>
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

    <div style=" font-size:16px;background-color: whitesmoke; border-radius:10px;position: relative; top:200px; width: 700px; height: 400px; left: 200px; ">
        <!--==============================header=================================-->
         <div class="container">
        <!--==============================content================================-->
        <h3 style="font-family: sans-serif;"><strong> Registro</strong></h3>
        <form id="contact-form"  action="/auth/register" enctype="multipart/form-data" method="post" >
            {!! csrf_field() !!}
            <fieldset>
          
              
                
                
             <div class="form-group">
                <label class="col-sm-2 control-label">Usuario:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="name" type="text" value="">
                </div>
            </div>
                   <br></br>
                  <div class="form-group">
                <label class="col-sm-2 control-label">Correo electrónico:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="email" type="text" value="">
                </div>
            </div>
                   <br></br>
                      <div class="form-group">
                <label class="col-sm-2 control-label">Contraseña:</label>
                <div class="col-sm-5">
                    <input class="form-control" name="password" type="password" value="">
                </div>
            </div>
                   <br></br>
                      <div class="form-group">
                <label class="col-sm-2 control-label">Confirma contraseña:</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" name="password_confirmation" value="">
                </div>
            </div>

              <!--  
                
                <label>
                    <span style="font-size:16px; font-weight: bold;  font-family: sans-serif;margin-left: 148px;" class="name-input">Nombre:</span>
                    <input name="name" value="" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" />
                </label>
                <br></br>
                <label>
                    <span style=" font-size:16px; font-weight: bold;  font-family: sans-serif; margin-left: 165px;" class="name-input">Email:</span>
                    <input name="email" value="" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" />
                </label>
                <br></br>
                <label>
                    <span style=" font-size:16px; font-weight: bold; font-family: sans-serif;margin-left: 120px;" class="name-input">Contraseña:</span>
                    <input type="password" name="password" value="" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" />
                </label>
                <br></br>
                <label>
                    <span style="margin-left: 48px; font-family: sans-serif; font-weight: bold;"class="name-input">Confirma contraseña:</span>
                    <input type="password" name="password_confirmation" value="" onBlur="if(this.value=='') this.value=''" onFocus="if(this.value =='' ) this.value=''" />
                </label>
-->
            </fieldset>
             <div style="left:450px; position: relative;" class="container">
                <button  type="button" class="btn btn-primary">Reset</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
          
        </form>
    </div>


        @if ($errors->has())
            <div style="    width: 500px;
    display: inline-block;
    left: 500px;
    top: 200px;
    position: relative;"class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
        @endif
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


</html>















<!--==============================content================================-->





