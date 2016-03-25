@extends('template')

@section('content')


<div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a>1 VS 1</a>

        <li><a>DIVISIONES LIGA</a>
            <ul>
                <li><a href="#">PRIMERA DIVISIÓN</a></li>
                <li><a>SEGUNDA DIVISIÓN A</a></li>
                <li><a>SEGUNDA DIVISIÓN B</a></li>
                <li><a>TERCERA DIVISIÓN A</a></li>
                <li><a>TERCERA DIVISIÓN B</a></li>

            </ul>
        </li>


        <li><a>COPA</a>
            <ul>
                <li><a href="Fase1PvsP">FASE 1</a></li>
                <li><a>FASE 2</a></li>
                <li><a>FASE 3</a></li>

            </ul>
        </li>
        <li><a href="#">SALA DE TROFEOS 1VS1</a></li>
        <li><a href="Ranking1VS1">RANKING</a></li>
        <li><a>ADMINISTRADOR</a>
            <ul>
                <li><a>CREAR TORNEO</a></li>
                <li><a>CREAR COPA</a></li>


            </ul>
        </li>
        <li><a href="Inicio">HOME</a></li>

    </ul>


</div>


@include('partial.navbar')

<div id="menuCentral" style="background:url(images/middleMenu.jpeg); background-size: cover;" >


    <!-- <div id="Menu1vs1" style="background-color:gray; position:relative; height: 100px; width:900px; left:100px; top:100px;">


         <a href="#" class="myButton"><div style="width:30px; height: 30px; display:inline-block; background:url(images/calendar.png); background-size: cover;"></div>Calendario</a>


     </div>-->

    <div>
        <ul id="MenuPerfil" style="width: 420px;">
            <li id="ListaPerfil"><a href="PVSP">Tabla general</a></li>
            <li id="ListaPerfil"><a class="active" href="#">Calendario</a></li>

            <li id="ListaPerfil"><a href="#">Campeón</a></li>

        </ul>

    </div>

    <select style="position:relative; left:850px;top:30px; ">
        <option>Jornada 1</option>
    </select>


    <div id="TablaPrimera" style=" width:500px;position: absolute; top:18%; left:19%;">


        <table>
            <thead>
            <tr>

                <th>Local</th>
                <th>Marcador</th>
                <th>Visitante</th>


            </tr>
            </thead>

            <thead>
            <tr>


                <th colspan="4" style="background-color: darkslategrey;">JORNADA 1, 18 DE FEBRERO DE 2016, 18:00</th>

            </tr>
            </thead>


            <tr>
                <td style=""><a>América</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/1.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">3</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">2</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/2.png); background-size:cover;"></div>Cruz Azul</td>



            </tr>

            <tr>
                <td style=""><a>Toluca</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/3.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">2</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">1</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/4.png); background-size:cover;"></div>Querétaro</td>



            </tr>

            <tr>
                <td style=""><a>Santos Laguna</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/5.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">1</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">3</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/6.png); background-size:cover;"></div>Dorados</td>



            </tr>

            <tr>
                <td style=""><a>Pachuca</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/7.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">0</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">1</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/8.png); background-size:cover;"></div>Puebla</td>



            </tr>

            <tr>
                <td style=""><a>Pumas</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/9.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">2</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">2</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/10.png); background-size:cover;"></div>Tigres UANL</td>



            </tr>

            <tr>
                <td style=""><a>Chiapas</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/11.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">3</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">3</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/12.png); background-size:cover;"></div>Atlas</td>



            </tr>

            <tr>
                <td style=""><a>Chivas</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/13.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">0</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">3</div></td>
                <td style=""><div id="LogoEquipo" style="float:left; background:url(images/Clausura/14.png); background-size:cover;"></div>Tijuana</td>



            </tr>

            <tr>
                <td style=""><a>León</a><div id="LogoEquipo" style="float:right; background:url(images/Clausura/15.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">2</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">1</div></td>
                <td style=""><div id="LogoEquipo" style="  float:left; background:url(images/Clausura/16.png); background-size:cover;"></div>Monterrey</td>



            </tr>
            <tr>
                <td style=""><a >Veracruz</a><div id="LogoEquipo" style="float:right; float:right;background:url(images/Clausura/17.png); background-size:cover;"></div></td>
                <td><div style="display:inline-block;left:-10px;" id="PosicionTabla">0</div>-<div id="PosicionTabla" style="display:inline-block;left:10px;">1</div></td>
                <td style=""><div id="LogoEquipo" style=" float:left; background:url(images/Clausura/18.png); background-size:cover;"></div>Morelia</td>

            </tr>

        </table>

    </div>
</div>
@endsection