@extends('template')

@section('content')

    <link rel="stylesheet" href="/css/Transferencias.css" type="text/css" media="screen">



    <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral">
            <li><a>CLUBES PRO</a>

            <li><a href="/Inicio">HOME</a>
                <!--  <ul>
                  <li><a>PRIMERA DIVISIÓN</a></li>
                  <li><a>SEGUNDA DIVISIÓN A</a></li>
                  <li><a>SEGUNDA DIVISIÓN B</a></li>
                  <li><a>TERCERA DIVISIÓN A</a></li>
                  <li><a>TERCERA DIVISIÓN B</a></li>

                  </ul>-->
            </li>


            <li><a href="/clubes-pro">CLUBES</a>

            </li>





            <li><a href="Transferencias">TRANSFERENCIAS</a>

            </li>

            <li><a href="RankingCP">RANKING POR CLUBES</a>

            <li><a href="SalaTrofeosCP">SALA DE TROFEOS</a></li>
            <li><a href="Equipo_CP">EQUIPO DE LA SEMANA</a></li>

            </li>



        </ul>


    </div>

    <div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover; margin-left: -80px;" >
            
             <div>
                        <ul id="MenuPerfil">
                            <li id="ListaPerfil"><a class="active" href="Transferencias">DATOS</a></li>
                            <li id="ListaPerfil"><a href="#">EQUIPOS</a></li>  
                             <li id="ListaPerfil"><a href="TransferenciasBuscarJ">JUGADOR</a></li>
                        </ul>

                    </div>

            <div class="myBox"style=" background-size: cover; position: absolute; width: 900px; height: 700px; margin-left: 200px; top: 100px;-webkit-border-radius: 20px 20px;-webkit-border-radius: 20px 20px;">            
                <form id="formEquipo" class="container subcontainer light-grey">
                    <h2>Buscar Equipo</h2>
                    <p>      
                    <label>Ingresa Club</label>
                    <input class="input1 border1" type="text"></p>
                    <p>  
                        <button class="boton grey" type="button">Genera Resultados</button>
                </form>
                </br>
                </br>
                </br>
                </br>

                <!--Tabla de datos de la base de datos-->
                
                
                    <div id="contenedor" style="position:relative;">
                         <div id="contenidos1">                            
                            
                            <div id="columna21" style="text-align: center">CLUB</div>
                            <div id="columna21" style="width: 150px;">ACCION</div>
                        </div>
                        <div id="contenidos">                            
                            <div id="columna1" style="width: 60px;"><img src="Imagenes/MLS/CHICAGO_FIRE-LOGO.png" style="width: 50px;"> <div class="title">ALDEBARAN FC</div></div>
                            
                            <div id="columna2" style="width: 150px;"><button type="button" class="boton2 grey">Solicitar Ingreso</button></div>
                        </div>
                        <div id="contenidos">
                            <div id="columna1" style="width: 60px;"><img src="Imagenes/MLS/NEW_ENGLAND_REVOLUTION-LOGO.png" style="width: 50px;"><div  class="title">PANADEROS FC</div> </div>
                            
                            <div id="columna2" style="width: 150px;"><button type="button" class="boton2 grey">Solicitar Ingreso</button></div>
                        </div>
                    </div>
                
 
                
                
            </div>
@endsection
