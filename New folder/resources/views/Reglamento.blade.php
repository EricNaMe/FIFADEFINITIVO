@extends('template')

@section('content')


<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/Reglamento.css" type="text/css" media="screen">

    <title>FIFA 2016</title>
</head>

<body>


<div id="menuLateral" style="background: url(images/leftMenu.jpeg); background-size: cover;">

    <ul id="ListaMenuLateral">
        <li><a>REGLAS</a></li>
        <li><a href="/Inicio">HOME</a></li>

    </ul>


</div>


<div id="menuCentral" style="background:url(images/Reglamento.jpg); background-size: cover; background-repeat: no-repeat;" >

    <div class="title" style="margin-top: 4%; margin-left: 3%;">REGLAMENTO</div>
    <div class="myBox">

        <h2>FASE REGULAR DE LIGA CLUBES PRO:</h2>

        <ul>
            <li>3 Puntos por victoria.</li>
            <li>1 Punto por empate.</li>
            <li>0 Puntos por derrota.</li>
            <li>14 equipos participantes en primera división y 14 equipos participantes en segunda división.</li>
            <li>26 jornadas (Torneo a dos vueltas)</li>
            <li>Califican los primeros ocho de la tabla general a Liguilla.</li>
            <li>En primera división los últimos cuatro equipos descienden.</li>
            <li>En segunda división los primeros tres lugares ascienden directamente a primera división, la cuarta plaza de ascenso se                           juega entre los lugares 4to, 5to, 6to, 7mo y 8vo.</li>
        </ul>

        <h2>LIGUILLA DE LIGA CLUBES PRO:</h2>

        <ul>
            <li>1er lugar vs 8vo lugar, 2do lugar vs 7mo lugar, 3er lugar vs 6to lugar y 4to lugar vs 5to lugar. (Sólo en primera división).                 </li>
            <li>El mejor posicionado en la tabla cierra de local.</li>
            <li>En caso de empate global califica el mejor posicionado en la tabla.</li>
        </ul>
        <br>
        <h2>HORARIO DE LOS PARTIDOS:</h2>
        <br>
        <ul>
            <li>Se dará un plazo de dos días para jugar cada Jornada de Lunes a Jueves.</li>
            <li>De Viernes a Domingo se jugarán dos jornadas.</li>
            <li>Los dos jugadores (Dts en el caso de Clubes Pro) se pondrán de acuerdo en el horario para jugar su partido.</li>
            <li>En caso de que no se llegue a un acuerdo por parte de los dos jugadores/Dts, EL HORARIO SERÁ IMPUESTO POR ALGUNO DE LOS                           ADMINISTRADORES tomando en cuenta los comentarios de los jugadores/Dts.</li>

        </ul>

        <h2>TOLERANCIA DE LOS PARTIDOS:</h2>

        <ul>
            <li>UNA VEZ PACTADO EL PARTIDO se tienen 20 minutos de tolerancia y al no presentarse el rival, el partido se gana por                           default. NO SE ADMITEN RECLAMOS DE QUE AÚN QUEDA TIEMPO PARA JUGAR EL PARTIDO.</li>
        </ul>

        <h2>REGLAS DE JUEGO EN CLUBES PRO:</h2>

        <ul>
            <li>Any obligatorio, caso de no haber Any, el equipo afectado deberá salir al medio tiempo y exigir al equipo rival el uso de                         un Any, en caso de que nuevamente no se use un Any al entrar al segundo juego, el partido será ganado por el equipo                               afectado. SI NO HAY RECLAMACIÓN AL MEDIO TIEMPO, EL EQUIPO AFECTADO PIERDE EL DERECHO DE RECLAMAR CUALQUIER COSA.</li>

            <li>El número mínimo de jugadores será de 6 incluyendo al Any, en caso de que no sean los jugadores suficientes, el equipo                           afectado deberá salir al medio tiempo y exigir que se usen 6 jugadores, si al entrar de nuevo, el equipo rival sigue sin                         tener 6 jugadores el partido será ganado por el equipo afectado. SI NO HAY RECLAMACIÓN AL MEDIO TIEMPO, EL EQUIPO                                 AFECTADO PIERDE EL DERECHO DE RECLAMAR CUALQUIER COSA.</li>
            <li>Portero no obligatorio.</li>

            <li>No se aceptan reclamaciones por errores de FIFA (penales no marcados, penales inventados, rojas injustas, etc). Cualquier                         gol es válido mientras el FIFA lo haya registrado, incluyendo un gol mientras el equipo rival está saliendo de la partida                         o un gol por estorbar al portero.</li>

            <li>Cada equipo tiene derecho a salir del partido UNA VEZ por desconexión de algún jugador siempre y cuando sea en los                               primeros 10 minutos del partido. Una vez pasados los 10 minutos de juego sólo pueden salir al medio tiempo. Si un equipo                         sale más de una vez o sale después de los primero 10 minutos del juego pierde por default (A menos que se muestren                               pruebas de que fue una desconexión de todos).</li>

            <li>NO SE PERMITE BUSCAR DESEMPATES YA QUE ESTOS AFECTAN DE MANERA DIRECTA A LOS DEMÁS EQUIPOS, LES PEDIMOS DE LA MANERA MÁS                         ATENTA QUE NO LO HAGAN, ESTAREMOS MONITOREANDO CONSTANTEMENTE Y EN CASO DE QUE HAYAN ARREGLADO UN DESEMPATE SE LES                               SANCIONARÁ ANULANDO EL RESULTADO Y QUITANDOLES OTROS 3 PUNTOS A AMBOS EQUIPOS.</li>

        </ul>

        <h2>REGISTRO DE JUGADORES Y TRANSFERENCIAS PARA CLUBES PRO:</h2>

        <ul>
            <li>El número máximo de jugadores por club es de 15.</li>

            <li>El DT de cada equipo es responsable de enviar la lista de sus jugadores a los administradores a más tardar un día antes                           de comenzar la liga.</li>

            <li>Se puede dar de alta un jugador NUEVO en cualquier momento del torneo siempre y cuando no haya jugado con ningún otro                             club, de otro modo deberá esperar a que comiencen las transferencias (a la mitad del torneo regular). Es responsabilidad                         del DT de cada club informar a los administradores de su nueva adquisición para que la plantilla de su equipo se                                 actualice antes de que juegue un solo partido.</li>

            <li>Si un partido es jugado con alineación indebida (jugadores no registrados) y se presentan pruebas al final, el partido                           será ganado por el equipo afectado.</li>

            <li>Las transferencias sólo pueden hacerse al término de la jornada 9 y antes de la jornada 10 (a la mitad del torneo en fase                         regular). Es responsabilidad del DT informar a los administradores de cualquier transferencia para actualizar el registro de                     la plantilla antes de que el transferido juegue algún partido.</li>

            <li>NO SE PERMITE BUSCAR DESEMPATES YA QUE ESTOS AFECTAN DE MANERA DIRECTA A LOS DEMÁS EQUIPOS, LES PEDIMOS DE LA MANERA MÁS                         ATENTA QUE NO LO HAGAN, ESTAREMOS MONITOREANDO CONSTANTEMENTE Y EN CASO DE QUE HAYAN ARREGLADO UN DESEMPATE SE LES                               SANCIONARÁ ANULANDO EL RESULTADO Y QUITANDOLES OTROS 3 PUNTOS A AMBOS EQUIPOS.</li>

        </ul>

        <h2>REPORTE DE PARTIDOS:</h2>

        <ul>
            <li>El resultado de cada partido debe ser publicado en el grupo de Whatsapp de los DTs, además es necesario mandar una foto a                         los administradores de la alineación antes de comenzar el partido (vestíbulo) y dos fotos más, una de asistencias y una                           de los goles, EN CASO DE NO TENER ESTAS TRES FOTOS SÓLO SE HARÁ VÁLIDO EL RESULTADO PERO NO LOS GOLES NI LAS                                     ASISTENCIAS</li>

            <li>En lugar de las dos fotos de goles y asistencia pueden pasarme un clip de video que contenga ambos datos, la foto de                             alineación del vestíbulo es OBLIGATORIA.</li>
        </ul>

        <h2>DISCIPLINA:</h2>

        <ul>
            <li>En caso de una ofensa directa hacía algún jugador del grupo, hacía la liga o administradores, habrá una sanción de tres                           partidos para el DT (No importa que jugador del equipo haya cometido la falta).</li>

            <li>Si el DT hace caso omiso y sigue jugando, los partidos que juegue serán dados como victoria al equipo rival.</li>

            <li>En caso de reincidir, el DT será sancionado otros 3 partidos y el equipo perderá tres puntos.</li>

            <li>En caso de que un equipo que va en el fondo de la tabla abandone la competencia, sus jugadores no podrán participar con                           ningún otro club en el torneo vigente, además el equipo no podrá participar en la siguiente liga.</li>


            *PREMIOS PARA CLUBES PRO(Sólo aplica en PRIMERA DIVISIÓN):

            <ul>
                <li>El club ganador de la liga se hará acreedor a dos juegos nuevos.</li>

                <li>El goleador del torneo se hará acreedor a un premio especial cuyo valor rondará a los 200 pesos. (Los únicos goles que                           cuentan son los de la temporada regular).</li>
                <li>El jugador con más asistencias se hará acreedor a un premio especial cuyo valor rondará a los 200 pesos. (Las únicas                             asistencias que cuentan son las de la temporada regular). </li>
            </ul>


            *NOTA:
            <ul>
                <li>Para cualquier caso “especial” que no esté contemplado en el reglamento, la administración tomará las medidas que crea                           necesarias de acuerdo a las necesidades del grupo y de la liga. Así como cualquier queja o sugerencia será recibida por medio del grupo de facebook con los coordinadores.</li>
            </ul>

        </ul>


    </div>

</div>




</body>

@endsection
