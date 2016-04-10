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
<div id="menuCentral" style="background:url(/images/middleenu.jpeg); background-size: cover;" >
    <div style="margin-top: 30px;margin-left: -150px;  text-align: center; background: url(/images/Noticias.png); background-repeat: no-repeat; background-position: center; background-size: contain; height: 180px"><div class="title" style="line-height: 200px;">NOTICIAS</div></div>
    <div class="title3" style="margin-left: 10px; margin-top: 10px;" >"Bienvenido a la sección de noticias, te recordamos que esta sección es para hacer señalamientos de Eventos que se relacionan con la página los cuales tambien los puedes ver en el Grupo de <a title="FB" href="https://www.facebook.com/groups/318895001640813/"><img src="/images/Facebook.png" alt="FB" width="35" /></a>"</div>
    <div style="  position: relative; width: 900px; top: 20px; left: 50px;">
        <article class="Articulo2" style="left:35px; width: 800px;">
            <content>
                <div id="wrapper2" style="">
                    <div style="height: 50px; margin-top: 20px; margin-left: 25px;">
                        <h1 class="title2" style=" position: relative; top:0px; ">News!!!</h1>
                        <div style="clear:both"></div>
                    </div>



                    <div id="boxUser" style="position: relative; left: 0px;">
                        @foreach($Noticias->reverse() as $noticia)

                        <article class="Articulo3" style="left: 30px; ">
                            <!--Este Div es para los comentarios en texto-->
                            <div><img style="width:50px; margin-left: 10px;" src="/images/Admin.png"/><div id="textNews" style="position: relative; left: 60px; top: -30px;">{{$noticia->message}}</div></div></br>
                            <!--Este Dvi es para los comentarios en imagen-->

                            <img  src="{{$noticia->getImageUrl()}}"style="max-height:400px; max-width:750px;" alt="" >


                        @endforeach






                        </article>


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
                        @endif
                    @endif

                </div>

            </content>
        </article>

    </div>

</div>




</body>
</html>
@endsection