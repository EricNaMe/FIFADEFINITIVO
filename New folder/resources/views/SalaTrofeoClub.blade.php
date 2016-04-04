{{--{{$proTeam->load('users')}}
{{dd()}}--}}

  
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
    <link rel="stylesheet" href="/css/SalaPerfil.css" type="text/css" media="screen">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
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
                <li><a href="/CrearClub">CREAR CLUB</a></li>


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


<!-- inicio menu club -->



<div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover;">

    <div>
        <ul id="MenuPerfil" style="width: 494px;">
            <li id="ListaPerfil"><a href="#">Equipo</a></li>
            <li id="ListaPerfil"><a class="active" href="/PlantillaPro/{{$proTeam->id}}">Plantilla</a></li>
            <li id="ListaPerfil"><a href="#">Estadísticas</a></li>
            <li id="ListaPerfil"><a href="#">Sala de trofeos</a></li>
        </ul>

    </div>
     <div style="background-color: white; width: 500px; height: 100px; position: relative; left: 300px;">

        <div style="background:url(/Imagenes/ALKA_SUPERLIGA_DINAMARCA/AALBORG_BK-LOGO.png); background-size:80px ; background-repeat: no-repeat; display: inline-block; position:relative; left:10px;top:10px;width:90px; height: 80px;"></div>
        <span style="display: inline-block;position: relative;top:-40px;left:20px;font-size: 20px;font-family: sans-serif;"><a>Aldebaran FC</a></span>
        <span style="color:gray;display:inline-block;  width: 400px; position: relative;top:-40px;left:110px;font-size: 20px;font-family: sans-serif;"><a>"{{Auth::User()->quote}}"</a></span>
        <div style="margin-top: -105px; margin-left: 280px; width: 180px;" class="letras">
        <img src="/images/guanteP.png" width="20" height="20">
        <img src="/images/star.png" width="20" height="20">
        <img src="/images/star.png" width="20" height="20">
        <img src="/images/balonG.png" width="20" height="20">
        <img src="/images/medallAsi.png" width="20" height="20">                   
        </div>
    </div>


   <div class="myBox" style="margin-top: 5px; margin-left: 135px;" >
       <div class="titleA" style="font-size: 35px;">NOMENCLATURA DE TROFEOS</div>
       <div width="150" style="margin-top: 20px;"><a class="letras">Campeón de div. Clubes&nbsp&nbsp</a><img src="/images/star.png" width="50" height="50"></div>
       <div width="150" style="margin-top: 30px;"><a class="letras">Líder de Goleo   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a><img src="/images/balonG.png" width="50" height="50"></div>
       <div width="150" style="margin-top: 30px;"><a class="letras">Líder de Asistencias  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a><img src="/images/medallAsi.png" width="50" height="50"></div>
       <div width="150" style="margin-top: 30px;"><a class="letras">Portero Invicto  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a><img src="/images/guanteP.png" width="50" height="50"></div>             
   </div> 
   
</div>




</div>


</body>

<script>

    $(document).ready(function () {
        $('#ListaMenuLateral > li > a').click(function () {
            if ($(this).attr('class') != 'active') {
                $('#ListaMenuLateral li ul').slideUp();
                $(this).next().slideToggle();
                $('#ListaMenuLateral li a').removeClass('active');
                $(this).addClass('active');
            }
        });
    });
</script>
</html>


