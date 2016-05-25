<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');




});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('storage2', 'FrontController@storage');
Route::post('storage2', 'StorageController@save');


Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::get('/','FrontController@Inicio');
Route::get('Inicio','FrontController@Inicio');
Route::get('PvsPCalendario','FrontController@PvsPCalendario');
Route::get('ProCrearLiga','FrontController@ProCrearLiga');
Route::get('PerfilNoAutenticado','FrontController@PerfilNoAutenticado');
Route::get('Perfil','FrontController@Perfil');
Route::get('ProCalendario','FrontController@ProCalendario');
Route::get('DetallesPartido','FrontController@DetallesPartido');
Route::get('ProCrearCopa','FrontController@ProCrearCopa');
Route::get('AgregarClubProLiga','FrontController@AgregarClubProLiga');
Route::get('AgregarClubProCopa','FrontController@AgregarClubProCopa');
Route::get('Clips','FrontController@Clips');
Route::get('Fase1PvsP','FrontController@Fase1PvsP');
Route::get('Fases','FrontController@Fases');
Route::get('Rfases','FrontController@Rfases');
Route::get('PerfilDetalles','FrontController@PerfilDetalles');
Route::get('Ranking1VS1','FrontController@Ranking1VS1');
Route::get('RankingCP','FrontController@RankingCP');
Route::get('Reglamento','FrontController@Reglamento');
Route::get('Divisiones','FrontController@Divisiones');
Route::get('Equipo_CP','FrontController@Equipo_CP');
Route::get('Equipo_CPTemp','FrontController@Equipo_CPTemp');
Route::get('Noticias','FrontController@Noticias');
Route::get('LigaPro','FrontController@LigaPro');
Route::get('CopaPro','FrontController@CopaPro');
Route::get('PerfilClubes','FrontController@PerfilClubes');
Route::get('Primera','FrontController@Primera');
Route::get('PVSP','FrontController@PVSP');
Route::get('EditarPerfil','FrontController@EditarPerfil');
Route::get('UnirteClub','FrontController@UnirteClub');
Route::get('ClubDetalles','FrontController@ClubDetalles');
Route::get('SalaTrofeoClub','FrontController@SalaTrofeoClub');
Route::get('SalaTrofeosPerfil','FrontController@SalaTrofeosPerfil');
Route::get('DetallesPartidoPro','FrontController@DetallesPartidoPro');

Route::get('CrearCopa','FrontController@CrearCopa');
Route::get('CrearLiga','FrontController@CrearLiga');
Route::get('Liga','FrontController@Liga');
Route::get('Copa','FrontController@Copa');
Route::get('AgregarTeamCopa','FrontController@AgregarTeamCopa');
Route::get('AgregarTeamLiga','FrontController@AgregarTeamLiga');
Route::get('SalaTrofeosCP','FrontController@SalaTrofeosCP');
Route::get('SalaTrofeosCPAsi','FrontController@SalaTrofeosCPAsi');
Route::get('SalaTrofeosCPGol','FrontController@SalaTrofeosCPGol');
Route::get('SalaTrofeosCPPor','FrontController@SalaTrofeosCPPor');
Route::get('SalaTrofeosCPRey','FrontController@SalaTrofeosCPRey');
Route::get('Transferencias','FrontController@Transferencias');
Route::get('EstadisticasLigaPro','FrontController@EstadisticasLigaPro');
Route::get('ModificarLigaPro','FrontController@ModificarLigaPro');
Route::get('ModificarDatosLigaPro','FrontController@ModificarDatosLigaPro');
Route::get('ModificarCopaPro','FrontController@ModificarCopaPro');
Route::get('ModificarLiga','FrontController@ModificarLiga');
Route::get('ModificarCopa','FrontController@ModificarCopa');
Route::get('EliminarEquiposPvsP','FrontController@EliminarEquiposPvsP');
Route::get('TransferenciasBuscarE','FrontController@TransferenciasBuscarE');
Route::get('TransferenciasBuscarJ','FrontController@TransferenciasBuscarJ');
Route::get('ReportarPartidoPro','FrontController@ReportarPartidoPro');
Route::get('ReportarResultadosPro','FrontController@ReportarResultadosPro');
Route::get('SalaTrofeo1vs1','FrontController@SalaTrofeo1vs1');
Route::get('SalaTrofeo1vs1Div','FrontController@SalaTrofeo1vs1Div');
Route::get('ReportarPartido','FrontController@ReportarPartido');



Route::post('Inicio','ComentarioController@save');
Route::get('save','ComentarioController@save');
Route::get('FuncionEcho','ModeloEcho@FuncionEcho');

Route::get('PerfilDetalles/{id}','PerfilController@EncontrarJugador');

Route::put('InvitarUsuario/{proTeam}/{user}','ClubesProController@InvitarUsuario');
Route::get('PerfilNoAutenticadoClubes/{id}','PerfilController@EncontrarJugadorClubes');
Route::post('EditarPerfil','PerfilController@EditarPerfilUsuario');
Route::post('CrearNoticia','ClubesProController@crearNoticia');

Route::group(['prefix' => 'clubes-pro'], function () {
    Route::get('','ClubesProController@index');
    Route::any('buscar','ClubesProController@buscar');
    Route::any('jugadores-sin-club','FrontController@ProJugadoresSinClub');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('crear','ClubesProController@getCrear');
        Route::post('','ClubesProController@postIndex');
    });

    Route::group(['prefix' => '{proTeam}'], function () {
        Route::get('','ClubesProController@getDetalle');
        Route::get('plantilla','ClubesProController@getPlantilla');

        Route::group(['middleware' => 'auth'], function () {
            Route::get('unirte','ClubesProController@getUnirte');
            Route::post('unirte','ClubesProController@postUnirte');
            Route::delete('baja/me','ClubesProController@deleteBaja');
            Route::put('autorizar/{user}','ClubesProController@putAutorizar');
            Route::put('denegar/{user}','ClubesProController@putDenegar');


        });
    });
});

Route::group([
    'middleware' => 'auth',
    'prefix' => 'notification'
    ], function () {
    Route::get('delete/{notification}','NotificationController@deleteIndex');
});


Route::post('AsignarDTProTeam','ClubesProController@AsignarDT');
Route::get('GoleadoresLigaPro/{id}','ClubesProController@ObtenerGoleadoresLigaPro');
Route::get('AsistentesLigaPro/{id}','ClubesProController@ObtenerAsistentesLigaPro');
Route::get('PorterosLigaPro/{id}','ClubesProController@ObtenerPorterosLigaPro');
Route::get('MejoresJugadoresLigaPro/{id}','ClubesProController@ObtenerMejoresJugadoresLigaPro');
Route::get('DefensaImbatidaLigaPro/{id}','ClubesProController@ObtenerDefensaImbatidaLigaPro');
Route::post('EscogerLigaPro','ClubesProController@EscogerLigaPro');
Route::post('BuscarDatosPro','ClubesProController@BuscarDatosClub');
Route::post('ModificarDatosPro','ClubesProController@ModificarDatosLigaPro');
Route::get('PlantillaPro/{id}','ClubesProController@PlantillaClub');
Route::post('EditarClubPro/{id}','ClubesProController@editarClub');
Route::post('EditarImagen/{id}','ClubesProController@editarImagen');
Route::post('/ReportarResultadosPro','ClubesProController@ReportarResultadosPro');
Route::post('/ReportarResultadosPro2','ClubesProController@ReportarResultadosPro2');
Route::post('/ReportarResultados','ClubesProController@ReportarResultadosMetodo');
Route::post('/ReportarResultados2','ClubesProController@ReportarResultadosMetodo2');



Route::post('bloquear-altas','ClubesProController@putBloquearAltas');
Route::post('desbloquear-altas','ClubesProController@putDesbloquearAltas');


Route::get('EncontrarLiga/{id}','TorneoController@EncontrarLiga');
Route::get('EncontrarCopa/{id}','TorneoController@EncontrarCopa');
Route::get('ProCalendarioEnc/{proLeague}','TorneoController@EncontrarCalendario');
Route::post('ProCrearLiga','TorneoController@CrearLigaPro');
Route::post('ProModificarLiga','TorneoController@ModificarLigaPro');
Route::post('ProBorrarLiga','TorneoController@BorrarLigaPro');
Route::post('ProModificarCopa','TorneoController@ModificarCopaPro');
Route::post('ProEliminarClubLiga','TorneoController@BorrarProClubLiga');
Route::post('ProEliminarClubCopa','TorneoController@BorrarProClubCopa');
Route::post('ProCrearCalendario','TorneoController@CrearCalendarioPro');
Route::post('ProCrearCopa','TorneoController@CrearCopaPro');
Route::post('roundRobin','TorneoController@RoundRobin');
Route::post('AgregarProTeamLiga','TorneoController@AgregarProClubLiga');
Route::get('DetallesPartido/{id}','ClubesProController@DetallesPartidoMetodo');
Route::post('ReportarResultadosProAdmin','ClubesProController@ReportarMarcadorProAdmin');

Route::get('ReportarPartidoProMetodo/{id}/{id2}/{id3}/{id4}','ClubesProController@ReportarPartidoMetodo');
Route::get('ReportarPartidoProMetodo/{id}/{id2}/{id3}/{id4}/{id5}','ClubesProController@ReportarPartidoMetodo2');
Route::get('ReportarPartidoProMetodoAdmin/{id}/{id2}/{id3}/{id4}/{id5}','ClubesProController@ReportarResultadosProAdmin');

Route::get('ReportarPartidoPvsPMetodo/{id}/{id2}/{id3}/{id4}','TorneoController@ReportarPartidoPvsPMetodo');



Route::post('AgregarProClub','TorneoController@AgregarProClubLiga');
Route::post('AgregarProClubCopa','TorneoController@AgregarProClubCopa');

Route::post('DivisionesAgregar','PlayerController@CrearClubUsuario');
Route::post('CrearCopaPlayer','PlayerController@CrearCopa');
Route::post('CrearLigaPlayer','PlayerController@CrearLiga');
Route::post('ReportarResultadosPvsP','PlayerController@reportarResultado');
Route::post('AgregarTeamCopa','PlayerController@AgregarTeamCopa');
Route::post('AgregarTeamLiga','PlayerController@AgregarTeamLiga');
Route::post('EliminarTeamLiga','PlayerController@BorrarTeamLiga');
Route::get('EncontrarLigaPlay/{id}','PlayerController@EncontrarLigaPlayer');
Route::get('EncontrarCopaPlay/{id}','PlayerController@EncontrarCopaPlayer');
Route::post('ModificarLiga','PlayerController@ModificarLiga');
Route::post('ModificarCopa','PlayerController@ModificarCopa');
Route::post('EliminarClubLiga','PlayerController@BorrarClubLiga');
Route::post('EliminarClubCopa','PlayerController@BorrarClubCopa');

Route::post('CrearCalendario','TorneoController@crearCalendario');
Route::get('EncCalendario/{League}','TorneoController@buscarCalendario');

Route::post('videoSave1','ComentarioController@videoYoutube1');
Route::post('videoSave2','ComentarioController@videoYoutube2');
Route::post('videoSave3','ComentarioController@videoYoutube3');
Route::post('clipsCommen','ComentarioController@clipscommen');
  Route::post('TransferenciasBuscarJ','ClubesProController@buscarJugador');
 Route::post('TransferenciasBuscarE','ClubesProController@buscarEquipo');
