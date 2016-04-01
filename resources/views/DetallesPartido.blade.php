@extends('template')

@section('content')


<div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
      <li><a href="Inicio">HOME</a></li>
     <li><a>ADMINISTRADOR</a>
          <ul>
              <li><a href="/ProCrearLiga">CREAR LIGA</a></li>
              <li><a href="/ProCrearCopa">CREAR COPA</a></li>
              <li><a href="/ModificarLigaPro">MODIFICAR LIGA</a></li>
              <li><a href="/ModificarCopaPro">MODIFICAR COPA</a></li>
          </ul>
      </li>
        <li><a>LIGAS VIGENTES</a>
       <ul>
           @foreach($ligas as $liga)
        <li><a href="EncontrarLiga/{{$liga->id}}">{{$liga->name}}</a></li>

           @endforeach
        </ul>
        </li>
      <li><a>COPAS VIGENTES</a>
          <ul>
              @foreach($copas as $copa1)
                  <li><a href="EncontrarCopa/{{$copa1->id}}">{{$copa1->name}}</a></li>

              @endforeach
          </ul>
      </li>
        <li><a>CLUBES</a>
    <ul>
        <li><a href="/clubes-pro/crear">CREAR CLUB</a></li>
         <li><a href="/clubes-pro/buscar">BUSCAR CLUB</a></li>
        </ul>
        </li>
         <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a> 
    
    </ul>


</div>

<div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover;" >

    <div>
        <ul id="MenuPerfil" style="width: 570px;">
            <li id="ListaPerfil"><a href="/clubes-pro">Tabla general</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Calendario</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Estadísticas</a></li>
            <li id="ListaPerfil"><a href="PerfilClubes">Campeones</a></li>

        </ul>

    </div>


    <div style="background-color: green; height: 150px; display:inline-block; width:150px; position: relative; top:20px; left:300px; background:url(/images/Clausura/4.png); background-size:cover;"></div>

    <span style="background-color: darkslategrey; height:60px; width: 180px; position:relative; display: inline-block; left:350px;"> <a style="padding-top:5px;font-size: 50px;color:white; font-family: sans-serif; font-weight: bold;">&nbsp;&nbsp;&nbsp;5 - 4</a></span>

    <div style="background-color: green; height: 150px; display:inline-block; width:150px; position: relative; top:20px; left:390px; background:url(/images/Clausura/5.png); background-size:cover;"></div>


    <span style="background-color: darkslategrey;  padding: 10px; position:relative; top:100px; display: inline-block; left:-200px;"> <a style="padding-top:5px;font-size: 30px;color:white; font-family: sans-serif; font-weight: bold;">Querétaro</a></span>

    <span style="background-color: darkslategrey; padding: 10px;  position:relative;top:100px; display: inline-block; left:40px;"> <a style="padding-top:5px;font-size: 30px;color:white; font-family: sans-serif; font-weight: bold;">Santos Laguna</a></span>




<div style="height: auto;position: relative;  top:140px; left:200px; width: 300px; background-color: whitesmoke;">
<ul style="padding-left: 0px;">
    <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif; background-color: #111111;color: white;font-weight: bold;"><a>POS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUGADOR</a></li>
    <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>MD</a><a style="margin-left: 80px;">Coche</a></li>
    <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>EI</a><a style="margin-left: 80px;">Coche</a></li>
    <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>DC</a><a style="margin-left: 80px;">Coche</a></li>

</ul>



</div>

    <div style="height: auto;position: relative; top:-108px; display: inline-block; left:670px; width: 300px; background-color: whitesmoke;">
        <ul style="padding-left: 0px;">
            <li style="list-style:none; margin-top: -16px; padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif; background-color: #111111;color: white;font-weight: bold;"><a>POS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;JUGADOR</a></li>
            <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>MD</a><a style="margin-left: 80px;">Coche</a></li>
            <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>EI</a><a style="margin-left: 80px;">Coche</a></li>
            <li style="list-style:none;  padding: 20px 25px;
    font-size: 16px;
    font-family: sans-serif;"><a>DC</a><a style="margin-left: 80px;">Coche</a></li>

        </ul>



    </div>



    </div>



</div>
@endsection


