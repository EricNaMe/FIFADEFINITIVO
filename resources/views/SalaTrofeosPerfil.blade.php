@extends('template')

@section('content')

    
    <link rel="stylesheet" href="/css/SalaPerfil.css" type="text/css" media="screen">
    <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>


<body style="background-color:darkslategray; background-size: cover;">


<div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a href="/Inicio">HOME</a></li>

    </ul>


</div>


<div id="menuCentral" style="background-color:darkslategray; background-size: cover;" >
    <style>
     #MenuPerfil {
            list-style-type: none;
            margin-top: 40px;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            width: 365px;
            margin-left: 300px;
        }

        #ListaPerfil{
            float: left;
        }

        #ListaPerfil a {
            display: inline-block;
            color: white;
            text-align: center;
            padding: 20px 25px;
            text-decoration: none;
            font-family: sans-serif;
            font-weight: bold;
        }

        #ListaPerfil a:hover {
            background-color: #111;
        }

        #ListaDatosPerfil{
            list-style: none;
            padding-left: 0px;
        }

        #ListaDatosPerfil li{
            border-bottom:groove;
            padding: 11px 13px;
            font-size: 16px;
            font-family: sans-serif;
        }
        #ListaPerfil{

        }

    </style>
<div>
    <ul id="MenuPerfil" style="width: 160px;">            
        <li id="ListaPerfil"><a href="">Sala de trofeo</a></li>
    </ul>

</div>

    <div style="background-color: white; width: 500px; height: 100px; position: relative; left: 300px;">

        <div style="background:url(https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatarpic-l.png); background-size:90px 80px;background-color:  #0000C2;display: inline-block; position:relative; left:10px;top:10px;width:90px; height: 80px;"></div>
        <span style="display: inline-block;position: relative;top:-40px;left:20px;font-size: 20px;font-family: sans-serif;"><a>{{Auth::User()->gamertag}}</a></span>
        <span style="color:gray;display:inline-block;  width: 400px; position: relative;top:-40px;left:110px;font-size: 20px;font-family: sans-serif;"><a>"{{Auth::User()->quote}}"</a></span>
        <div style="margin-top: -105px; margin-left: 280px; width: 180px;" class="letras">              
                
        </div>
    </div>
    
    <div style="background-color: black; border: 3px solid white;  width: 200px; height: 300px; margin-left: 40px; margin-top: 80px;"><img src="https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatar-body.png" style="margin-left: 25px;"></div>

    <!-- Comienza el banner de trofeos-->
    <div style="background: url(/images/banner1.jpg); height: 160px; background-repeat: no-repeat; background-size: contain; inline-block; position:relative; left:260px; top:-300px;">
        <div id="logoE" style="background: url(/images/Clausura/2.png); height: 160px; background-repeat: no-repeat; background-size: contain; inline-block; position:relative; width: 70px; top: 80px; left: 250px;"></div> 
        <div id="tipoCam"style=" color: #511414;  -webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 29pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-150px; left: 250px;">Campeón Portería Invatida <div style="margin-top: -45px; margin-right: -650px;"><img src="/images/guanteP.png" width="50" height="50"></div></div> 
        <div id="nomEqui"style=" color: #511414; -webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 26pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-150px; left: 350px;">Aldebaran FC</div> 
        <div id="Temporada" style=" color: #511414;-webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 22pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-195px; left: 535px;">Temporada 2</div>                       
    </div>  
    </br></br></br></br></br>
    
     <div style="background: url(/images/banner1.jpg); height: 160px; background-repeat: no-repeat; background-size: contain; inline-block; position:relative; left:260px; top:-300px;">
        <div id="logoE" style="background: url(/images/Clausura/2.png); height: 160px; background-repeat: no-repeat; background-size: contain; inline-block; position:relative; width: 70px; top: 80px; left: 250px;"></div> 
        <div id="tipoCam"style=" color: #511414;  -webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 29pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-150px; left: 250px;">Campeón de Goleo <div style="margin-top: -45px; margin-right: -650px;"><img src="/images/balonG.png" width="50" height="50"></div></div> 
        <div id="nomEqui"style=" color: #511414; -webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 26pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-150px; left: 350px;">Aldebaran FC</div> 
        <div id="Temporada" style=" color: #511414;-webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 22pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-195px; left: 535px;">Temporada 1</div>                       
    </div> 
     </br></br></br></br></br>
    
     <div style="background: url(/images/banner1.jpg); height: 160px; background-repeat: no-repeat; background-size: contain; inline-block; position:relative; left:260px; top:-300px;">
        <div id="logoE" style="background: url(https://avatar-ssl.xboxlive.com/avatar/{{Auth::User()->gamertag}}/avatarpic-l.png); height: 160px; background-repeat: no-repeat; background-size: contain; inline-block; position:relative; width: 70px; top: 80px; left: 250px;"></div> 
        <div id="tipoCam"style=" color: #511414;  -webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 29pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-150px; left: 250px;">Campeón de División 1VS1 <div style="margin-top: -45px; margin-right: -650px;"><img src="/images/star2.png" width="50" height="50"></div></div> 
        <div id="nomEqui"style=" color: #511414; -webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 26pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-150px; left: 350px;">cochexbox123</div> 
        <div id="Temporada" style=" color: #511414;-webkit-text-stroke: .5px white; font-weight: bolder; text-align: center; font-family: Tw Cen MT;font-size: 22pt; font-style:italic; height:80px; width: 220px; inline-block; white-space:nowrap; position:relative; top:-195px; left: 535px;">División 1</div>                       
    </div> 
    
     <!-- Comienza nomenclatura-->
    <div class="myBox" style="margin-top: 5px; margin-left: 200px;" >
       <div class="titleA">NOMENCLATURA DE TROFEOS</div>
       <div width="150" style="margin-top: 20px;"><a class="letras">Campeón de div. Clubes&nbsp&nbsp</a><img src="/images/star.png" width="50" height="50"></div>
	   <div width="150" style="margin-top: 20px;"><a class="letras">Campeón de Copa CP&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a><img src="/images/starCP.png" width="50" height="50"></div>
       <div width="150" style="margin-top: 30px;"><a class="letras">Líder de Goleo   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a><img src="/images/balonG.png" width="50" height="50"></div>
       <div width="150" style="margin-top: 30px;"><a class="letras">Líder de Asistencias  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a><img src="/images/medallAsi.png" width="50" height="50"></div>
       <div width="150" style="margin-top: 30px;"><a class="letras">Portero Invicto  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a><img src="/images/guanteP.png" width="50" height="50"></div>
       <div width="150" style="margin-top: 30px;"><a class="letras">Rey de Reyes  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a><img src="/images/reyCP.png"  height="50"></div>
       <div width="150" style="margin-top: 20px;"><a class="letras">Campeón de div. 1VS1&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a><img src="/images/star2.png" width="50" height="50"></div>
       <div width="150" style="margin-top: 20px;"><a class="letras">Campeón de Copa&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a><img src="/images/star3.png" width="50" height="50"></div>
	          
   
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

</script>
</html>

