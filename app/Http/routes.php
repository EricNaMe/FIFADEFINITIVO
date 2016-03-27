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
Route::get('BuscarClub','FrontController@BuscarClub');
Route::get('Perfil','FrontController@Perfil');
Route::get('CrearClub','FrontController@CrearClub');
Route::get('ProCalendario','FrontController@ProCalendario');
Route::get('DetallesPartido','FrontController@DetallesPartido');
Route::get('ProCrearCopa','FrontController@ProCrearCopa');
Route::get('AgregarClubProLiga','FrontController@AgregarClubProLiga');
Route::get('AgregarClubProCopa','FrontController@AgregarClubProCopa');
Route::get('Clips','FrontController@Clips');
Route::get('Fase1PvsP','FrontController@Fase1PvsP');
Route::get('Fases','FrontController@Fases');
Route::get('PerfilDetalles','FrontController@PerfilDetalles');
Route::get('Ranking1VS1','FrontController@Ranking1VS1');
Route::get('RankingCP','FrontController@RankingCP');
Route::get('Reglamento','FrontController@Reglamento');
Route::get('Divisiones','FrontController@Divisiones');
Route::get('Equipo_CP','FrontController@Equipo_CP');
Route::get('Noticias','FrontController@Noticias');
Route::get('LigaPro','FrontController@LigaPro');
Route::get('CopaPro','FrontController@CopaPro');
Route::get('PerfilClubes','FrontController@PerfilClubes');
Route::get('Primera','FrontController@Primera');
Route::get('PVSP','FrontController@PVSP');
Route::get('EditarPerfil','FrontController@EditarPerfil');
Route::get('UnirteClub','FrontController@UnirteClub');
Route::get('ClubDetalles','FrontController@ClubDetalles');

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
Route::get('ModificarLigaPro','FrontController@ModificarLigaPro');
Route::get('ModificarCopaPro','FrontController@ModificarCopaPro');
Route::get('ModificarLiga','FrontController@ModificarLiga');
Route::get('ModificarCopa','FrontController@ModificarCopa');
Route::get('EliminarEquiposPvsP','FrontController@EliminarEquiposPvsP');
Route::get('TransferenciasBuscarE','FrontController@TransferenciasBuscarE');
Route::get('TransferenciasBuscarJ','FrontController@TransferenciasBuscarJ');
Route::get('ReportarPartidoPro','FrontController@ReportarPartidoPro');
Route::get('ReportarResultadosPro','FrontController@ReportarResultadosPro');





Route::post('Inicio','ComentarioController@save');
Route::get('save','ComentarioController@save');
Route::get('FuncionEcho','ModeloEcho@FuncionEcho');

Route::get('PerfilDetalles/{id}','PerfilController@EncontrarJugador');
Route::get('PerfilNoAutenticadoClubes/{id}','PerfilController@EncontrarJugadorClubes');
Route::post('EditarPerfil','PerfilController@EditarPerfilUsuario');

Route::group(['prefix' => 'clubes-pro'], function () {
    Route::get('','ClubesProController@index');
    Route::group(['prefix' => '{proTeam}'], function () {
        Route::get('','ClubesProController@getDetalle');
        Route::get('plantilla','ClubesProController@getPlantilla');

        Route::group(['middleware' => 'auth'], function () {
            Route::get('unirte','ClubesProController@getUnirte');
            Route::post('unirte','ClubesProController@postUnirte');
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


Route::get('PlantillaPro/{id}','ClubesProController@PlantillaClub');
Route::post('BuscarClub','ClubesProController@BuscarClub');
Route::post('CrearClub','ClubesProController@InsertarClub');
Route::post('ReportarResultadosPro','ClubesProController@ReportarResultadosPro');
Route::post('/ReportarResultados','ClubesProController@ReportarResultadosMetodo');


Route::get('EncontrarLiga/{id}','TorneoController@EncontrarLiga');
Route::get('EncontrarCopa/{id}','TorneoController@EncontrarCopa');
Route::get('ProCalendarioEnc/{proLeague}','TorneoController@EncontrarCalendario');
Route::post('ProCrearLiga','TorneoController@CrearLigaPro');
Route::post('ProModificarLiga','TorneoController@ModificarLigaPro');
Route::post('ProModificarCopa','TorneoController@ModificarCopaPro');
Route::post('ProEliminarClubLiga','TorneoController@BorrarProClubLiga');
Route::post('ProEliminarClubCopa','TorneoController@BorrarProClubCopa');
Route::post('ProCrearCalendario','TorneoController@CrearCalendarioPro');
Route::post('ProCrearCopa','TorneoController@CrearCopaPro');
Route::post('roundRobin','TorneoController@RoundRobin');
Route::post('AgregarProTeamLiga','TorneoController@AgregarProClubLiga');
Route::get('DetallesPartidoMetodo/{id}/{id2}','ClubesProController@DetallesPartidoMetodo');
Route::get('ReportarPartidoProMetodo/{id}/{id2}/{id3}','ClubesProController@ReportarPartidoMetodo');

Route::post('AgregarProClub','TorneoController@AgregarProClubLiga');
Route::post('AgregarProClubCopa','TorneoController@AgregarProClubCopa');

Route::post('DivisionesAgregar','PlayerController@CrearClubUsuario');
Route::post('CrearCopaPlayer','PlayerController@CrearCopa');
Route::post('CrearLigaPlayer','PlayerController@CrearLiga');
Route::post('AgregarTeamCopa','PlayerController@AgregarTeamCopa');
Route::post('AgregarTeamLiga','PlayerController@AgregarTeamLiga');
Route::post('EliminarTeamLiga','PlayerController@BorrarTeamLiga');
Route::get('EncontrarLigaPlay/{id}','PlayerController@EncontrarLigaPlayer');
Route::get('EncontrarCopaPlay/{id}','PlayerController@EncontrarCopaPlayer');
Route::post('ModificarLiga','PlayerController@ModificarLiga');
Route::post('ModificarCopa','PlayerController@ModificarCopa');
Route::post('EliminarClubLiga','PlayerController@BorrarClubLiga');
Route::post('EliminarClubCopa','PlayerController@BorrarClubCopa');