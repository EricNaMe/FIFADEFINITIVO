@extends('template')

@section('content')

    <link rel="stylesheet" href="/css/SalaTrofeosCP.css" type="text/css" media="screen">

    <script>
        function muestra(star){

            obj = document.getElementById(star);
            obj.style.display = "block";

        }

        function ocultar(star){
            obj = document.getElementById(star);
            obj.style.display = "none";

        }
        function selTrofeo(trofeo, idTrofeo)
        {
            trofeo = document.getElementById(trofeo).textContent;

            imagen = document.getElementById(idTrofeo);
            switch (trofeo) {
                case "1ra":

                    imagen.src="/images/trofeoP.png";
                    break;
                case "2da":
                    imagen.src="/images/trofeoP2.png";
                    break;
                case "3ra":
                    imagen.src="/images/trofeoP3.png";
                    break;

                case "4ta":
                    imagen.src="/images/trofeoP4.png";
                    break;

                default:
                    imagen.src="/images/trofeoP.png";
                    break;
            }
        }

    </script>


    <div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

        <ul id="ListaMenuLateral" style="margin-top: 60%">
        <li><a href="Inicio">HOME</a></li>
            <li><a href="Transferencias">TRANSFERENCIAS</a>
            </li>
             <li><a href="RankingCP">RANKING CLUBES PRO</a>
            </li>
            <li><a href="Equipo_CP">EQUIPO DE LA SEMANA</a>
            </li>
            <li><a href="Equipo_CPTemp">EQUIPO DE LA TEMPORADA</a>
            </li>
            <li><a href="#">SALA DE TROFEOS</a>
            </li>
        </ul>


    </div>

    <div id="menuCentral" style="background:url(/images/middleMenu.jpeg); background-size: cover; margin-left: -80px;" >

        <div>
            <ul id="MenuPerfil">
                <li id="ListaPerfil"><a href="SalaTrofeosCP">Campeón</a></li>
                <li id="ListaPerfil"><a href="#">Líder de Goleo</a></li>
                <li id="ListaPerfil"><a href="SalaTrofeosCPAsi">Líder de Asistencias</a></li>
                <li id="ListaPerfil"><a href="SalaTrofeosCPPor">Portero Invicto</a></li>
                <li id="ListaPerfil"><a href="SalaTrofeosCPRey">&gt;</a></li>
            </ul>

        </div>
        <div class="myBox" style="background-image: url(/images/canchaF.png); background-size: cover; position: absolute; width: 780px; height: 600px; margin-left: 210px; top: 100px;-webkit-border-radius: 20px 20px;-webkit-border-radius: 20px 20px;">
            <div onmouseover="muestra('star');" onmouseout="ocultar('star');" class="cuadro2" style="margin-left: 30px; margin-top: 70px;">
                <div style="margin-top: -45px; margin-left: -25px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="https://avatar.xboxlive.com/avatar/werux/avatar-body.png"></div>
                <div style="width: 30px; margin-top: -242px; margin-left: 130px;">
                    <span class="Info">TEMPORADA</span>
                    <br></br>
                    <span class="Info">DIVISION</span>
                    <br></br>
                    <span class="Info">NOMBRE</span>

                </div>
                <div style="width: 300px; margin-top: -125px; margin-left: 300px;">
                    <span id="temp" class="Info2">4ta</span>
                    <br></br>
                    <span id="divi" class="Info2">1ra</span>
                    <br></br>
                    <span id="nomb"class="Info2">werux</span>

                </div>
                <img id="star" src="/images/guanteP.png" style="display: none;margin-top: 15px; margin-left: 470px; height: 80px;">
                <img id="trofeoImg" src="" style="margin-top: -150px; margin-left: 590px; height: 150px">
                <script>selTrofeo('divi', 'trofeoImg');</script>
            </div>
            <br ></br> <br ></br>
            <!--seccion que se debe repetir de aqui para abajo se borra solo es para presentación-->
            <div onmouseover="muestra('star2');" onmouseout="ocultar('star2');" class="cuadro2" style="margin-left: 30px; margin-top: 70px;">
                <div style="margin-top: -45px; margin-left: -25px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="https://avatar.xboxlive.com/avatar/rotciv86/avatar-body.png"></div>
                <div style="width: 30px; margin-top: -242px; margin-left: 130px;">
                    <span class="Info">TEMPORADA</span>
                    <br></br>
                    <span class="Info">DIVISION</span>
                    <br></br>
                    <span class="Info">NOMBRE</span>

                </div>
                <div style="width: 300px; margin-top: -125px; margin-left: 300px;">
                    <span id="temp2" class="Info2">4ta</span>
                    <br></br>
                    <span id="divi2" class="Info2">3ra</span>
                    <br></br>
                    <span id="nomb2"class="Info2">rotciv86</span>

                </div>
                <img id="star2" src="/images/guanteP.png" style="display: none;margin-top: 15px; margin-left: 470px; height: 80px;">
                <img id="trofeoImg2" src="" style="margin-top: -150px; margin-left: 590px; height: 150px">
                <script>selTrofeo('divi2', 'trofeoImg2');</script>
            </div>
            <br ></br> <br ></br>
            <div onmouseover="muestra('star3');" onmouseout="ocultar('star3');" class="cuadro2" style="margin-left: 30px; margin-top: 70px;">
                <div style="margin-top: -45px; margin-left: -25px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="https://avatar.xboxlive.com/avatar/cochexbox123/avatar-body.png"></div>
                <div style="width: 30px; margin-top: -242px; margin-left: 130px;">
                    <span class="Info">TEMPORADA</span>
                    <br></br>
                    <span class="Info">DIVISION</span>
                    <br></br>
                    <span class="Info">NOMBRE</span>

                </div>
                <div style="width: 300px; margin-top: -125px; margin-left: 300px;">
                    <span id="temp3" class="Info2">5ta</span>
                    <br></br>
                    <span id="divi3" class="Info2">2da</span>
                    <br></br>
                    <span id="nomb3"class="Info2">cochexbox123</span>

                </div>
                <img id="star3" src="/images/guanteP.png" style="display: none;margin-top: 15px;margin-left: 470px; height: 80px;">
                <img id="trofeoImg3" src="" style="margin-top: -150px; margin-left: 590px; height: 150px">
                <script>selTrofeo('divi3', 'trofeoImg3');</script>
            </div>
            <br ></br> <br ></br>
            <div onmouseover="muestra('star4');" onmouseout="ocultar('star4');" class="cuadro2" style="margin-left: 30px; margin-top: 70px;">
                <div style="margin-top: -45px; margin-left: -25px;display: inline-block; background-size:45px 85px;background-repeat: no-repeat;"><img src="https://avatar.xboxlive.com/avatar/werux/avatar-body.png"></div>
                <div style="width: 30px; margin-top: -242px; margin-left: 130px;">
                    <span class="Info">TEMPORADA</span>
                    <br></br>
                    <span class="Info">DIVISION</span>
                    <br></br>
                    <span class="Info">NOMBRE</span>

                </div>
                <div style="width: 300px; margin-top: -125px; margin-left: 300px;">
                    <span id="temp4" class="Info2">6ta</span>
                    <br></br>
                    <span id="divi4" class="Info2">4ta</span>
                    <br></br>
                    <span id="nomb4"class="Info2">werux</span>

                </div>
                <img id="star4" src="/images/guanteP.png" style="display: none;margin-top: 15px; margin-left: 470px; height: 80px;">
                <img id="trofeoImg4" src="" style="margin-top: -150px; margin-left: 590px; height: 150px">
                <script>selTrofeo('divi4', 'trofeoImg4');</script>
            </div>
            <br ></br> <br ></br>

        </div>
@endsection

