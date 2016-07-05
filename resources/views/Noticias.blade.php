@extends('template')

@section('content')


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/css/Noticias.css" type="text/css" media="screen">
        <link rel="stylesheet" href="/css/MenuPrincipalCSS3.css" type="text/css" media="screen">
        <title>FIFA 2016</title>
    </head>

    <body>


        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

            <ul id="ListaMenuLateral">
                <li><a>NOTICIAS</a></li>
                <li><a href="/Inicio">HOME</a></li>

            </ul>


        </div>




    </div>
    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;" >
        <div class="row">
            <div style="height: 100px;"  class="col-sm-6 col-lg-offset-4">
                <div class="title" style="margin-left: -30px;">NOTICIAS</div>
            </div>
            <div class="col-sm-7 col-lg-offset-4"><a style="text-decoration: none; color:black; font-size: 20px; " title="FB" href="https://www.facebook.com/groups/318895001640813/">Síguenos también por:<img src="/images/Facebook.png" alt="FB" width="35" /></a></div>
        </div>
        
                    @if (Auth::check())
                        <?php $user=Auth::user();
                        ?>
                        @if($user->user_name==="Administrador22")
                            <form method="post" name="message" action="CrearNoticia" enctype="multipart/form-data" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="file"  name="picture"  value=""class="boton" style="background: url(/images/boton_img.png); background-size: 100%;  background-repeat:no-repeat;">
                                <input name="submitmsg" type="submit"  id="submitmsg" class="boton" value="Envía"/>
                                <input type="text" name="mensajeInput" id="mensajeInput" value="" style="width: 770px; margin-left: 10px; ">
                            </form>
                            <form method="post" name="message" action="borrarNoticias">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input name="submitmsg" type="submit"  id="submitmsg" class="boton" value="BorrarNoticias"/>
                            </form>
                        @endif
                    @endif
                    
        <div class="col-sm-12" style="  max-height: 750px;">
             @foreach($Noticias->reverse() as $noticia)
            <div class="row">
                <div>
                    <div class="col-sm-7 col-sm-offset-2" style="background-color: white; height:400px;">
                        <img style="width:100%; height:100%;"  src="{{$noticia->getImageUrl()}}" alt="" >
                    </div>
                </div>    
            </div>        
            <div style="padding-bottom: 50px;" class="row">

                <div class="col-sm-7 col-sm-offset-2" style="height:100px; background-color: whitesmoke; ">
                    <div> <h2 class="text-center"><img style="width:50px;" src="/images/Admin.png"/>{{$noticia->message}}</h2></div>
                </div>

            </div>
             @endforeach
  
    </div>    




</body>
</html>
@endsection