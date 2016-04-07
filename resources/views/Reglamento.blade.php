@extends('template')

@section('content')


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/Reglamento.css" type="text/css" media="screen">

    <title>FIFA 2016</title>
</head>

<body>


<div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral" style="margin-top: 60%;">
        <li><a>REGLAS</a></li>
        <li><a href="/Inicio">HOME</a></li>

    </ul>


</div>


<div id="menuCentral" style="background:url(images/Reglamento.jpg); background-size: cover; background-repeat: no-repeat;" >

    <div class="title" style="margin-top: 4%; margin-left: 3%;">REGLAMENTO</div>
    <div class="myBox">

        <h2>FASE REGULAR DE LIGA CLUBES PRO:</h2>

        <ul>
            <li>Torneo a una Vuelta</li>
            <li>Califican los primeros Ocho de la tabla general a Liguilla.</li>
            <li>En todas las divisiones los últimos cuatro equipos descienden.</li>
            <li>Los primeros 3 lugares ascienden directamente a la siguiente división, la cuarta plaza de ascenso la Gana el Equipo que Avance más Lejos en la Liguilla de los lugares 4to, 5to, 6to, 7mo y 8vo.</li>
        </ul>

        <h2>LIGUILLA DE LIGA CLUBES PRO:</h2>

        <ul>
            <li>1er lugar vs 8vo lugar, 2do lugar vs 7mo lugar, 3er lugar vs 6to lugar y 4to lugar vs 5to lugar. (En todas las divisiones hay liguilla para sacar al campeón).</li>
            <li>El mejor posicionado en la tabla cierra de local.</li>
            <li>En caso de empate global califica el mejor posicionado en la tabla.</li>
        </ul>
        <br>
        <h2>HORARIO DE LOS PARTIDOS:</h2>
        <br>
        <ul>
            <li>Una Jornada para jugar Lunes ó Martes.</li>
            <li>Una Jornada para Jugar Miércoñes ó Jueves.</li>
            <li>Domingo se jugará Jornada Doble con Horarios Fijos de 10:30pm y 11pm hora de México</li>
            <li>Los Dt's se pondrán de acuerdo en el horario para jugar su partido.</li>
            <li>En caso de que no se llegue a un acuerdo por parte de los dos jugadores/Dts, EL HORARIO SERÁ IMPUESTO POR ALGUNO DE LOS ADMINISTRADORES tomando en cuenta los comentarios de los jugadores/Dts.</li>
        </ul>

        <h2>TOLERANCIA DE LOS PARTIDOS:</h2>

        <ul>
            <li>UNA VEZ PACTADO EL PARTIDO la Tolerancia es de 15 minutos de tolerancia y si no se presenta el rival, el partido se gana por default.</li>
            <li>Para Reportar un Default debe Comunicarse primero con un Administrador para Mostrarle Pruebas CLIPS DE VIDEO DE LA INVITACION DE JUEGO (Mínimo 2 Veces), y FOTO DE VESTIBULO, SIN ESTAS PRUEBAS NOSE ACEPTARA LA SOLICITUD DEL DEFAULT, El administrador tomará la decisión si se gana por default y en dado caso de salir rechazada su Solicitud del Default, se tendrá que jugar el partido</li>
        </ul>

        <h2>REGLAS DE JUEGO EN CLUBES PRO:</h2>

        <ul>
            <li>Any obligatorio, caso de no haber Any, el equipo afectado deberá salir al medio tiempo y exigir al equipo rival el uso de un Any, en caso de que nuevamente no se use un Any al entrar al segundo juego, el partido será ganado por el equipo afectado. SI NO HAY RECLAMACIÓN AL MEDIO TIEMPO, EL EQUIPO AFECTADO PIERDE EL DERECHO DE RECLAMAR CUALQUIER COSA.</li>

            <li>El número mínimo de jugadores para Jugar de 7, en caso de que no sean los jugadores suficientes, el equipo afectado deberá salir al medio tiempo y exigir que se usen 7 jugadores, si al entrar de nuevo, el equipo rival sigue sin tener 7 jugadores el partido será ganado por el equipo afectado. SI NO HAY RECLAMACIÓN AL MEDIO TIEMPO, EL EQUIPO AFECTADO PIERDE EL DERECHO DE RECLAMAR CUALQUIER COSA.</li>
            <li>Portero Obligatorio, esto Quiere Decir que el Jugador PRO del Any NO puede ser él PORTERO</li>

            <li>No se aceptan reclamaciones por errores de FIFA (penales no marcados, penales inventados, rojas injustas, etc). Cualquier gol es válido mientras el FIFA lo haya registrado, incluyendo un gol mientras el equipo rival está saliendo de la partida o un gol por estorbar al portero.</li>

            <li>Cada equipo tiene derecho a salir del partido UNA VEZ por desconexión de algún jugador siempre y cuando sea en los primeros 5 minutos del partido. Una vez pasados los 5 minutos de juego sólo pueden salir al medio tiempo. Si un equipo sale más de una vez o sale después de los primero 5 minutos del juego pierde por default (A menos que se muestren pruebas de que fue una desconexión de todos).</li>

            <li>NO SE PERMITE BUSCAR DESEMPATES YA QUE ESTOS AFECTAN DE MANERA DIRECTA A LOS DEMÁS EQUIPOS, LES PEDIMOS DE LA MANERA MÁS ATENTA QUE NO LO HAGAN, ESTAREMOS MONITOREANDO CONSTANTEMENTE Y EN CASO DE QUE HAYAN ARREGLADO UN DESEMPATE SE LES SANCIONARÁ ANULANDO EL RESULTADO Y QUITANDOLES OTROS 3 PUNTOS A AMBOS EQUIPOS</li>

        </ul>

        <h2>REGISTRO DE JUGADORES Y TRANSFERENCIAS PARA CLUBES PRO:</h2>

        <ul>
            <li>El número mínimo de Jugadores por Club es de 10</li>

            <li>El número máximo de jugadores por club es de 15.</li>

            <li>Se puede dar de alta un jugador NUEVO (Agente Libre) en cualquier momento del torneo siempre y cuando no haya jugado con ningún otro club, de otro modo deberá esperar a que comiencen las transferencias (a la mitad del torneo regular).</li>

            <li>Si un partido es jugado con alineación indebida (jugadores no registrados) y se presentan pruebas al final, el partido será ganado por DEFAULT por el equipo afectado.</li>

            <li>Las Transferencias se Abren a la mitad del Torneo en Fase Regular</li>           

        </ul>

        <h2>REPORTE DE PARTIDOS:</h2>

        <ul>
            <li>-El resultado de cada partido debe ser Reportado Antes del Tiempo Establecido por Los Administradores</li>

            <li>Partido NO REPORTADO se Pondrá como ANULADO</li>
        </ul>

        <h2>DISCIPLINA:</h2>

        <ul>
            <li>En caso de una ofensa directa hacía algún jugador del grupo, hacía la liga o administradores, habrá una sanción de tres partidos para el DT (No importa que jugador del equipo haya cometido la falta).</li>

            <li>Si el DT hace caso omiso y sigue jugando, los partidos que juegue serán dados como victoria al equipo rival.</li>

            <li>En caso de reincidir, el DT será sancionado otros 3 partidos y el equipo perderá tres puntos.</li>

            <li>En caso de que un equipo que va en el fondo de la tabla abandoné la competencia, sus jugadores no podrán participar con ningún otro club en el torneo vigente, además el equipo no podrá participar en la siguiente liga.</li>
            
            <li>Equipo que abandone la Competencia NO se le regresará el Pago de su Inscripción</li>

            <h2>PREMIOS PARA CLUBES PRO</h2>

            <ul>
                <li>-El Campeón de 1ra División se llevará $2000 pesos Mexicanos</li>

                <li>-El Campeón de 2da División se llevará $2000 pesos Mexicanos</li>
                <li>El club ganador de Rey de Reyes (Campeón de Copa Cardiacos vs Campeón de 1ra División) se hará acreedor a dos premios.</li>
            </ul>


            <h2>NOTA:</h2>
            <ul>
                <li>Para cualquier caso “especial” que no esté contemplado en el reglamento, la administración tomará las medidas que crea necesarias de acuerdo a las necesidades del grupo y de la liga.</li>
            </ul>

        </ul>


    </div>

</div>




</body>

@endsection
