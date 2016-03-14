<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/MenuPrincipalCSS3.css" type="text/css" media="screen">
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
       
        
        <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">
            
          <ul id="ListaMenuLateral">
              <li><a>HOME</a></li>
               
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
        
        <div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover;" >


            <article style="background-color: whitesmoke;  width: 400px; position: relative; top:100px; left:100px; border-radius: 10px; " class="Articulo2" >
                <content>
                    <div id="wrapper" ">
                        <div style="padding:10px; font-size: 20px; text-align: center; font-family: sans-serif; font-weight: bold;" id="menu">
                            <p class="welcome">USUARIOS NUEVOS EN www.torneoscardiacos.com<b></b></p>
                            <div style="clear:both"></div>
                        </div>
                        <div style="background-color:whitesmoke;overflow-y: scroll; border-radius:10px; height: 300px;">
                        @foreach($users as $user)

                            <div  style=" background-color: white; padding: 10px;margin: 10px;" id="boxUser">

                                <article class="Articulo3"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/{{$user->gamertag}}/avatarpic-l.png;"/> <a style="font-weight: bold; font-family: sans-serif;">{{$user->user_name}}</a> <a style="font-family: sans-serif;">Se ha unido a la comunidad<a/></article>

                            </div>
                        @endforeach
                        
                        </div>
                        <div style="background-color: whitesmoke; height: 30px; border-radius: 10px;"></div>
                    </div>

                </content>
            </article>



            <div style="height: 400px; border-radius: 10px; width: 300px; top:-300px; background-color: whitesmoke; left: 700px; position: relative;">

                <div style="left:20px;overflow-y: scroll; position:relative; top:20px;height: 300px; width: 260px;background-color: white;">

                    @foreach($comment as $commen)


                        <div class="dialogbox">
                            <div class="body">
                            <!--    <span class="tip tip-right"></span>-->
                                 <div style=" font-weight: bold; font-family: sans-serif; color:gray; height:20px; width:200px;"><a style="font-size:10px;">{{$commen->created_at}}</a><a style="float:right;margin-right:30px; ">{{$commen->user->user_name}}</a></div>
                              
                                <div style="word-break:break-all;" class="message">
                                    <span><p style="word-break:break-all;width:110px; font-family: sans-serif;font-weight: bold;">{{$commen->message}}</p></span>
                                </div>
                                 
                                <div style="position:relative; top:-40px; left:130px; 
                                     display: inline-block;background-color: pink; width:60px; height: 60px;">
                                    <div  style="width:60px; height: 60px; background:url(https://avatar-ssl.xboxlive.com/avatar/{{$commen->user->gamertag}}/avatarpic-l.png); background-size:cover;">
                                </div>
                                      
                                </div>
                                
                               
                            </div>
                        </div>
                    @endforeach
                </div>

         
                
                <form action="" method="POST" role="form">
                    <div style="top:20px;position: relative;" class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <label style="font-family: sans-serif; font-weight: bold;" for="comment">Comentario:</label>
                        <INPUT class="form-control" name="comentarioTexto" value="" id="comment"/>
                        @if(Auth::check())
                        <input type="hidden" name="InputId" value="{{Auth::User()->id}}"/>
                        
                        <button style="position: relative;left:220px; top:20px;" type="submit" class="btn btn-primary">Enviar</button>

                        <div style="background-color:red;font-weight:bold;display: none; font-family:sans-serif; text-align: center;height:60px; width:300px;"><a>Debes iniciar sesión</a></div>

                        @else
                        <div style="background-color:red; border-radius:10px;font-weight:bold; font-family:sans-serif; text-align: center;height:60px; width:300px;"><a>Debes iniciar sesión</a></div>

                        @endif
                    </div>

                </form>

            </div>

            
                   <form action="roundRobin" method="POST" role="form">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <? php
                    
                    $Array[]="Pedro1";
                    $Array[]="Pedro2";
                    $Array[]="Pedro3";
                    $Array[]="Pedro4";
                    
                    
                    ?>
                <button type="submit" class="btn btn-primary">Enviar</button>
                </form>


            
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

