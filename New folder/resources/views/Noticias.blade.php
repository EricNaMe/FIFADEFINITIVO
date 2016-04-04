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
    <div style="margin-top: 40px;margin-left: -150px;  text-align: center; background: url(/images/Noticias.png); background-repeat: no-repeat; background-position: center; background-size: contain; height: 180px"><div class="title" style="line-height: 200px;">NOTICIAS</div></div>
    <div class="title3" style="margin-left: 10px; margin-top: 10px;" >"Bienvenido a la sección de noticias, te recordamos que esta sección es para hacer señalamientos de Eventos que se relacionan con la página los cuales tambien los puedes ver en el Grupo de <a title="FB" href="https://www.facebook.com/groups/318895001640813/"><img src="/images/Facebook.png" alt="FB" width="35" /></a>"</div>
    <div style="margin-top: -40px;">
        <article class="Articulo2" style="left:20px; position: relative;">
            <content>
                <div id="wrapper2" width="850" >
                    <div style="height: 50px; margin-top: -20px; margin-left: 10px;">
                        <p class="titleA" style="margin-left: 20px:">News!!!<b></b></p>
                        <div style="clear:both"></div>
                    </div>

                    <div id="boxUser" style="margin-top: 10px;">
                        <article class="Articulo3" style="left: 30px; "><img style="width:50px;" src="/images/Admin.png"/> Inicio de Torneo proxima semana Atentos todos!!!!!</article>  <br>
                        <img src="/images/Test.jpg" width="400"><br>
                        Atención con las Fechas!!!!<br>

                    </div>
                    <form name="message" action="">
                        <input name="postback" type="submit" id="postback" value=""class="boton" style="background: url(/images/boton_img.png); background-size: 100%;  background-repeat:no-repeat;">
                        <input name="submitmsg" type="submit"  id="submitmsg" class="boton" value="Envía"/>

                    </form>

                </div>

            </content>
        </article>

    </div>

</div>




</body>
</html>
@endsection