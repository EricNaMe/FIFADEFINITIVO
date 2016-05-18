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
        <link rel="stylesheet" href="/css/Ranking.css" type="text/css" media="screen">
        <script src="/js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body >


        <div id="menuLateral" style="background: url(/images/leftMenu.jpeg); background-size: cover;">

            <ul id="ListaMenuLateral">
                <ul id="ListaMenuLateral" style="margin-top: 60%">
                    <li><a href="Inicio">HOME</a></li>
                    <li><a href="Transferencias">TRANSFERENCIAS</a>
                    </li>
                    <li><a href="RankingCP">RANKING CLUBES PRO</a>
                    </li>
                    <li><a href="Equipo_CP">EQUIPO DE LA SEMANA</a>
                    </li>
                    <li><a href="Equipo_CP">EQUIPO DE LA TEMPORADA</a>
                    </li>
                    <li><a href="SalaTrofeosCP">SALA DE TROFEOS</a>
                    </li>

                </ul>


        </div>



        <div id="menuCentral" >

            <div>

                <h1 class="title">RANKINGS CLUBES PRO</h1>
            </div>
            </br>

            <div style="background-color: crimson; height:5px; position: relative;" class="banner"></div>
            <div style="background-color: transparent; height:50px; position: relative;"></div>




            <table>
                <tr>
                    <td>
                        <div class="datagrid" style="width: 470px; height: 1050px; margin-left: 25px;"><table border="0">
                                <thead><tr><th colspan="2" style="text-align: center;">Ranking de Clubes</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th style="text-align: center;"><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach($UsuariosMayorPuntaje as $MejorJugador)
                                    <tr class="alt"><td>{{$i}}</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/{{$MejorJugador->gamertag}}/avatarpic-l.png;"/></td><td style="text-align: center;">{{$MejorJugador->user_name}}</td><td style="text-align: center;">{{$MejorJugador->pro_points}}</td></tr>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </td>
                    <td width="25"></td>
                    <td >
                        <div style="width: 500px; height: 500px; margin-left: -100px; margin-top: -540px;"><table border="0">
                                <img src="/images/stars.png" style="text-align: center; margin-left: -80px; margin-top: 50px;">

                            </table>

                        </div>
                    </td>
                </tr>

            </table>
            <div style="background-color: transparent; height:80px; position: relative;"></div>
            <table >
                <tr>
                    <td style="width: 500px;">
                        <div class="datagrid" style="width: 400px; max-height: 600px; margin-left: 25px""><table border="0">
                                <thead><tr><th colspan="2" style="text-align: center;">Delanteros</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                                <tbody style="">
                                    <?php $j = 1; ?>
                                    @foreach($UsuariosGoleadores as $UsuarioGoleador)
                                    <tr><td style="width: 10px;">{{$j}}</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/{{$UsuarioGoleador->gamertag}}/avatarpic-l.png;"/></td><td style="text-align: center;">{{$UsuarioGoleador->user_name}}</td><td>{{$UsuarioGoleador->goals}}</td></tr>
                                    <?php $j++; ?>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </td>
                    <td width="45"></td>
                    <td>
                        <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px"><table border="0">
                                <thead><tr><th colspan="2" style="text-align: center;">Rank mejor jugador</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                                <tbody>
                                    <?php $k = 1; ?>
                                    @foreach($UsuariosMejoresJugadores as $UsuarioMejorJugador)
                                    <tr><td style="width: 10px;">{{$k}}</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/{{$UsuarioMejorJugador->gamertag}}/avatarpic-l.png;"/></td><td style="text-align: center;">{{$UsuarioMejorJugador->user_name}}</td><td>{{$UsuarioMejorJugador->best_player}}</td></tr>
                                    <?php $k++; ?>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </td>
                </tr>

            </table>

            <div style="background-color: transparent; height:80px; position: relative;"></div>


            <div class="datagrid" style="width: 400px; max-height: 600px; margin-left: 25px">
                <table border="0">

                    <thead><tr><th colspan="2" style="text-align: center;">Rank Porteros</th>
                            <th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th>
                    <th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                    <tbody>
                        <?php $l = 1; ?>
                        @foreach($UsuariosMejoresPorteros as $UsuarioMejorPortero)
                        <tr><td style="width: 10px;">{{$l}}</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/{{$UsuarioMejorPortero->gamertag}}/avatarpic-l.png;"/></td><td style="text-align: center;">{{$UsuarioMejorPortero->user_name}}</td><td>{{$UsuarioMejorPortero->gk_unbeaten}}</td></tr>
                                <?php $l++; ?>
                        @endforeach
                    </tbody>
                </table>


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


@endsection
