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
        <li><a href="/Inicio">HOME</a></li>

        <li><a>TORNEOS VIGENTES</a>

        </li>


        <li><a>CLUBES</a>
            <ul>
                <li><a>BUSCAR CLUB</a></li>
                <li><a href="CrearClub">CREAR CLUB</a></li>


            </ul>
        </li>



        </li>

        <li href="Transferencias"><a>TRANSFERENCIAS</a>

        </li>

        <li><a href="#">RANKING POR CLUBES</a></li>

        <li><a href="SalaTrofeosCP">SALA DE TROFEOS</a></li>
        <li><a href="Equipo_CP">EQUIPO DE LA SEMANA</a></li>



    </ul>


</div>



<div id="menuCentral" >

    <div>

        <h1 class="title">RANKINGS Clubes PRO</h1>
    </div>
    <div style="background-color: crimson; height:5px; position: relative;" class="banner"></div>
    <div style="background-color: transparent; height:50px; position: relative;"></div>




    <table>
        <tr>
            <td>
                <div class="datagrid" style="width: 470px; height: 1050px; margin-left: 25px;"><table border="0">
                        <thead><tr><th colspan="2" style="text-align: center;">Ranking de Clubes</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th style="text-align: center;"><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                        <tbody><tr><td style="width: 10px;">1er</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;" >cochexbox123</td><td style="text-align: center;">Pts. 120</td></tr>
                        <tr class="alt"><td>2do</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td style="text-align: center;">Pts. 115</td></tr>
                        <tr><td>3er</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td style="text-align: center;">Pts. 105</td></tr>
                        <tr class="alt"><td>4to</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td style="text-align: center;">Pts. 95</td></tr>
                        <tr><td>5to</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td style="text-align: center;">Pts. 89</td></tr>
                        <tr><td style="width: 10px;">6to</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td style="text-align: center;">Pts. 120</td></tr>
                        <tr class="alt"><td>7mo</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td style="text-align: center;">Pts. 115</td></tr>
                        <tr><td>8vo</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td style="text-align: center;">Pts. 105</td></tr>
                        <tr class="alt"><td>9no</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td style="text-align: center;">Pts. 95</td></tr>
                        <tr><td>10mo</td><td style="text-align: center;"><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td style="text-align: center;"    >Pts. 89</td></tr>
                        </tbody>
                    </table>

                </div>

            </td>
            <td width="25"></td>
            <td >
                <div style="width: 500px; height: 500px; margin-left: 0px; margin-top: -540px;"><table border="0">
                        <img src="/images/stars.png" style="text-align: center; margin-left: 80px; margin-top: 50px;">

                    </table>

                </div>
            </td>
        </tr>

    </table>
    <div style="background-color: transparent; height:80px; position: relative;"></div>
    <table>
        <tr>
            <td>
                <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px""><table border="0">
                    <thead><tr><th colspan="2" style="text-align: center;">Delanteros</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                    <tbody><tr><td style="width: 10px;">1er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td>Pts. 120</td></tr>
                    <tr class="alt"><td>2do</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td>Pts. 115</td></tr>
                    <tr><td>3er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td>Pts. 105</td></tr>
                    <tr class="alt"><td>4to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td>Pts. 95</td></tr>
                    <tr><td>5to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td>Pts. 89</td></tr>
                    </tbody>
                </table>

</div>

</td>
<td width="45"></td>
<td>
    <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px"><table border="0">
            <thead><tr><th colspan="2" style="text-align: center;">Defensas</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
            <tbody><tr><td style="width: 10px;">1er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td>Pts. 120</td></tr>
            <tr class="alt"><td>2do</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td>Pts. 115</td></tr>
            <tr><td>3er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td>Pts. 105</td></tr>
            <tr class="alt"><td>4to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td>Pts. 95</td></tr>
            <tr><td>5to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td>Pts. 89</td></tr>
            </tbody>
        </table>

    </div>
</td>
</tr>

</table>
<div style="background-color: transparent; height:80px; position: relative;"></div>
<table>
    <tr>
        <td>
            <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px""><table border="0">
                <thead><tr><th colspan="2" style="text-align: center;">Medios Ofensivos</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                <tbody><tr><td style="width: 10px;">1er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td>Pts. 120</td></tr>
                <tr class="alt"><td>2do</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td>Pts. 115</td></tr>
                <tr><td>3er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td>Pts. 105</td></tr>
                <tr class="alt"><td>4to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td>Pts. 95</td></tr>
                <tr><td>5to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td>Pts. 89</td></tr>
                </tbody>
            </table>

            </div>

        </td>
        <td width="45"></td>
        <td>
            <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px"><table border="0">
                    <thead><tr><th colspan="2" style="text-align: center;">Medios Defensivos</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                    <tbody><tr><td style="width: 10px;">1er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td>Pts. 120</td></tr>
                    <tr class="alt"><td>2do</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td>Pts. 115</td></tr>
                    <tr><td>3er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td>Pts. 105</td></tr>
                    <tr class="alt"><td>4to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td>Pts. 95</td></tr>
                    <tr><td>5to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td>Pts. 89</td></tr>
                    </tbody>
                </table>

            </div>
        </td>
    </tr>

</table>
<div style="background-color: transparent; height:80px; position: relative;"></div>
<table>
    <tr>
        <td>
            <div class="datagrid" style="width: 400px; height: 600px; margin-left: 25px""><table border="0">
                <thead><tr><th colspan="2" style="text-align: center;">Porteros</th><th style="text-align: left;"><h1 style="text-align: center;">☆</h1></th><th><img alt="Imagen" src="/images/xbox.png" height="50" width="50" /></th></tr></thead>
                <tbody><tr><td style="width: 10px;">1er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/cochexbox123/avatarpic-l.png;"/></td><td style="text-align: center;">cochexbox123</td><td>Pts. 120</td></tr>
                <tr class="alt"><td>2do</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/werux/avatarpic-l.png;"/></td><td style="text-align: center;">Werux</td><td>Pts. 115</td></tr>
                <tr><td>3er</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/kelly%20uchiha/avatarpic-l.png;"/></td><td style="text-align: center;">kelly uchiha</td><td>Pts. 105</td></tr>
                <tr class="alt"><td>4to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/ealtamirano91/avatarpic-l.png;"/></td><td style="text-align: center;">ealtamirano91</td><td>Pts. 95</td></tr>
                <tr><td>5to</td><td><img style="width:50px; height:50px;" src="https://avatar-ssl.xboxlive.com/avatar/Rotciv26/avatarpic-l.png;"/></td><td style="text-align: center;">Rotciv26</td><td>Pts. 89</td></tr>
                </tbody>
            </table>

            </div>

        </td>
</table>



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
</script>
</html>


@endsection
