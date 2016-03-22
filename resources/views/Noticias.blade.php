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

</div>
<div id="menuCentral" style="background:url(/images/middleenu.jpeg); background-size: cover;" >
    <table width="950px"border="0" style="margin-left: 0px; position:relative;left:-300px;margin-top: 25px;">
        <tr style="width: 400px; height: 150px">
            <td rowspan="4">
                <article class="Articulo2" style="left:300px; position: relative;">
                    <content>
                        <div id="wrapper2" width="450" >
                            <div id="menu">
                                <p class="welcome">NOTICIAS<b></b></p>
                                <div style="clear:both"></div>
                            </div>

                            <div id="boxUser">
                                <article class="Articulo3" style="left:300px; "><img style="width:50px;" src="/images/Admin.png"/> Inicio de Torneo proxima semana Atentos todos!!!!!</article>  <br>
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
            </td>
            <td width="40px" height="20px"></td>
            <td width="350px"  class="title" style="text-align: center; background: url(/images/Noticias.png); background-repeat: no-repeat; background-size: contain; background-position: center;">NOTICIAS</td>

        </tr>

        <tr height="15px"><td ></td><td class="title3">"Bienvenido a la sección de noticias, te recordamos que esta sección es para hacer señalamientos de Eventos que se relacionan con la página los cuales tambien los puedes ver en el Grupo de <a title="FB" href="https://www.facebook.com/groups/318895001640813/"><img src="/images/Facebook.png" alt="FB" width="35" /></a>"</td></tr>
        <tr class="title3" ><td ></td><td>

                <article class="Articulo2">
                    <content>
                        <div id="wrapper" style="overflow-y: scroll; height:300px;" width="350">
                            <div id="menu">
                                <p class="welcome">USUARIOS NUEVOS EN www.torneoscardiacos.com<b></b></p>
                                <div style="clear:both"></div>
                            </div>

                            @foreach($users as $user)

                            <div id="boxUser">

                                <article class="Articulo3"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/{{$user->gamertag}}/avatarpic-l.png;"/> <a>{{$user->user_name}}</a> Se ha unido a la comunidad</article>

                            </div>
                                @endforeach

                        </div>

                    </content>
                </article>

            </td></tr>
    </table>
</div>




</body>
</html>