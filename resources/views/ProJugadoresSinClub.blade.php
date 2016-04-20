@extends('template')

@section('content')

    <link rel="stylesheet" href="/css/Transferencias.css" type="text/css" media="screen">


<div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">
    <ul id="ListaMenuLateral">
      
      <li><a href="/Inicio">HOME</a></li>

        @if (Auth::check())
        <?php $user=Auth::user();
            ?>




        @if($user->user_name==="Administrador22")
     <li><a>ADMINISTRADOR</a>
          <ul>
              <li><a href="/ProCrearLiga">CREAR LIGA</a></li>
              <li><a href="/ProCrearCopa">CREAR COPA</a></li>
              <li><a href="/ModificarLigaPro">MODIFICAR LIGA</a></li>            
              <li><a href="/ModificarCopaPro">MODIFICAR COPA</a></li>
              <li><a href="/ModificarDatosLigaPro">MODIFICAR TABLA DE LIGA</a></li>
          </ul>
      </li>
            <script>
                alert("funciona admin")
            </script>
        @endif
        @endif
        <li><a>LIGAS VIGENTES</a>
       <ul>
           @foreach($ligas as $liga)
        <li><a href="/EncontrarLiga/{{$liga->id}}">{{$liga->name}}</a></li>

           @endforeach
        </ul>
        </li>
      <li><a>COPAS VIGENTES</a>
          <ul>
              @foreach($copas as $copa)
                  <li><a href="/EncontrarCopa/{{$copa->id}}">{{$copa->name}}</a></li>

              @endforeach
          </ul>
      </li>
        <li><a>CLUBES</a>
    <ul>
        <li><a href="/clubes-pro/crear">CREAR CLUB</a></li>
        <li><a href="/clubes-pro/buscar">BUSCAR CLUB</a></li>
        <li><a href="/clubes-pro/jugadoressinclub">JUGADORES SIN CLUB</a></li>
        </ul>
        </li>
         <li><a href="/Transferencias">DATOS Y ESTADISTICAS</a>    
    </ul>
    </div>

    <div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover; margin-left: -80px;" >

     

        <div class="myBox"style=" background-size: cover; position: absolute; width: 900px; height: 700px; margin-left: 200px; top: 100px;-webkit-border-radius: 20px 20px;-webkit-border-radius: 20px 20px;">
         
            </br>
            </br>
            </br>
            </br>

            <!--Tabla de datos de la base de datos-->


           
            
            
            
            
            <div id="contenedor" style="position:absolute;top:280px; left: 20px;">
                <div id="contenidos1">

                    <div id="columna21" >GAMER TAG</div>
                  
                    <div id="columna21" style="width: 150px;">ACCION</div>
                </div>
               
                 @foreach($UsuariosSinClub as $proTeam)
                 
                 

                 <div id="contenidos">
                    <div id="columna1" > <div style="width: 50px; height: 50px; position: absolute; margin-top: -10px;"><img src="https://avatar-ssl.xboxlive.com/avatar/{{$proTeam->gamertag}}/avatarpic-l.png" style="width: 50px;"/></div> <div class="title" style="color: navy;  line-height: normal; width: 200px; margin-left: 50px; ">{{$proTeam->user_name}}</div> </div>
                 
                    <div id="columna2" style="width: 150px;"><form action="/PerfilDetalles/{{$proTeam->id}}"><button type="submit" class="boton2 grey">Ver perfil</button></a></form></div>
                </div>        
                 
                 
                    
                    @endforeach
            
            </div>
            
            
            
            




        </div>
@endsection