<?php

namespace App\Http\Controllers;

use App\Exceptions\PermissionException;
use App\LeagueProCalendar;
use App\Notification;
use App\ProCup;
use App\ProLeague;
use App\ProTeam;
use App\ProMatch;
use App\News;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\clubesproequipo;
use Input;
use DB;
use Illuminate\Support\Facades\Auth;

class ClubesProController extends Controller
{

    public function index()
    {
        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();

        return view('clubes-pro.clubes-pro', ['clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas]);
    }

    public function getCrear()
    {
        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();
        return view('clubes-pro.crear', ['clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas]);
    }

    /*
     * Create a Club-pro
     */

    public function postIndex(Request $request)
    {
        if (Auth::user()->isInAnyTeam()) {
            throw new PermissionException(
                'Ya se encuentra en otro club'
            );
        }
        $club = new ProTeam;
        $club->name = Input::get('nombreequipo');
        $club->quote = Input::get('lema');
        $club->state = Input::get('EstadoSelect');

        DB::beginTransaction();
        try {
            $club->save();
            $club->users()->attach(Auth::user()->id, [
                'status' => 'Accepted',
                'position' => 'DT'
            ]);

            if ($club->save()) {
                $picture = $request->file('picture');

                if ($picture) {
                    $club->saveImage($picture);
                }
                DB::commit();
                return redirect('clubes-pro')
                    ->with('message', 'Creación de club exitosa');
            } else {
                return redirect()->back()
                    ->withErrors("Algo falló!!!");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function crearNoticia(Request $request)
    {

        $noticia = new News;
        $noticia->message = Input::get('mensajeInput');


        DB::beginTransaction();
        try {


            if ($noticia->save()) {
                $picture = $request->file('picture');

                if ($picture) {

                    $noticia->saveImage($picture);
                }
                DB::commit();

                $Noticias = News::all();
                $users = User::all();

                return view('Noticias', ['users' => $users, 'Noticias' => $Noticias])->withErrors('Se añadió una noticia correctamente');
            } else {
                return redirect()->back()
                    ->withErrors("Algo falló!!!");
            }
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e);
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function getUnirte(ProTeam $proTeam)
    {
        $proTeam->canAddUser(Auth::user());

        $ligas = ProLeague::all();
        $copas = ProCup::all();
        return view('clubes-pro.unirte', ['club' => $proTeam, 'ligas' => $ligas, 'copas' => $copas]);
    }

    public function postUnirte(ProTeam $proTeam)
    {
        $posicion = Input::get('PosicionSelect');

        $proTeam->addPendingUser(Auth::user(), $posicion);
        $proTeam->sendPendingUserNotification();
        return redirect()
            ->to('clubes-pro/' . $proTeam->id)
            ->with('message', 'Éxito!');
    }
    
    
      public function InvitarUsuario(ProTeam $proTeam, User $user)
    {

        $proTeam->sendInvitationtoUserNotification($user);
        return redirect()
            ->to('clubes-pro/' . $proTeam->id)
            ->with('message', 'Éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function getDetalle(ProTeam $proTeam)
    {
        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();
        return view('clubes-pro.detalle', ['proTeam' => $proTeam,
            'clubes' => $clubes,
            'ligas' => $ligas,
            'copas' => $copas]);
    }

    public function DetallesPartidoMetodo($id)
    {

        $partido = ProMatch::find($id);
        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();
        return view('DetallesPartidoPro', ['clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas, 'partido' => $partido]);
    }

    public function getPlantilla(ProTeam $proTeam)
    {
        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();

        return view('clubes-pro.plantilla', ['proTeam' => $proTeam, 'clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas]);
    }

    public function putAutorizar(ProTeam $proTeam, User $user)
    {
        $proTeam->authorizeUserRequest($user);
        return redirect()->back()
            ->with('message', "Éxito");
    }

    public function putDenegar(ProTeam $proTeam, User $user)
    {
        $proTeam->downUserPorDT($user);
        return redirect()->back()
            ->with('message', "Éxito");
    }
    
    
        public function AsignarDT()
    {
        $usuarioId = input::get("usuarioSelect");
        $User=User::find($usuarioId);
        $ProTeamId=$User->proTeams[0]->id;
        
         $User->proTeams()->updateExistingPivot($ProTeamId, ['position'=>'DT2']);
        
        $User->update();

        return redirect()->back()
            ->with('message', "Éxito");
    }

    public function ReportarResultadosPro()
    {
        $usuarioLocal = input::get("checkbox");
        $usuarioVisitante = input::get("checkboxVisitante");
        $EquipoLoc = input::get("EquipoLocalInput");
        $EquipoVis = input::get("EquipoVisitanteInput");
        $League = input::get("leagueInput");
        $CalendarioInput = input::get("calendarioInput");
        $partidoId = input::get("PartidoInput");


        $calendario = LeagueProCalendar::find($CalendarioInput);

        $usuariosLocal = User::find($usuarioLocal);

        $usuariosVisitante = User::find($usuarioVisitante);


        $EquipoLocal = ProTeam::find($EquipoLoc);
        $EquipoVisitante = ProTeam::find($EquipoVis);


        $league = ProLeague::find($League);
        $EquipoUsuarioAuth = Auth::user()->proTeams[0]->id;


        return view('ReportarResultadosPro', ['usuariosLocal' => $usuariosLocal,
            'EquipoUsuarioAuth' => $EquipoUsuarioAuth,
            'usuariosVisitante' => $usuariosVisitante,
            'EquipoLocal' => $EquipoLocal,
            'EquipoVisitante' => $EquipoVisitante,
            'league' => $league,
            'calendario' => $calendario]);
    }

    public function ReportarResultadosPro2()
    {
        $usuarioLocal = input::get("checkbox");
        $usuarioVisitante = input::get("checkboxVisitante");
        $EquipoLoc = input::get("EquipoLocalInput");
        $EquipoVis = input::get("EquipoVisitanteInput");
        $League = input::get("leagueInput");
        $CalendarioInput = input::get("calendarioInput");
        $partidoId = input::get("PartidoInput");

        $partido = ProMatch::find($partidoId);


        $calendario = LeagueProCalendar::find($CalendarioInput);

        $usuariosLocal = User::find($usuarioLocal);

        $usuariosVisitante = User::find($usuarioVisitante);


        $EquipoLocal = ProTeam::find($EquipoLoc);
        $EquipoVisitante = ProTeam::find($EquipoVis);


        $league = ProLeague::find($League);
        $EquipoUsuarioAuth = Auth::user()->proTeams[0]->id;


        return view('EditarResultadosPro', ['usuariosLocal' => $usuariosLocal,
            'EquipoUsuarioAuth' => $EquipoUsuarioAuth,
            'usuariosVisitante' => $usuariosVisitante,
            'EquipoLocal' => $EquipoLocal,
            'EquipoVisitante' => $EquipoVisitante,
            'league' => $league,
            'partido' => $partido,
            'calendario' => $calendario]);
    }

    public function ReportarResultadosProAdmin($id, $id2, $id3, $id4, $id5)
    {

        $partido = ProMatch::find($id5);
        $calendario = LeagueProCalendar::find($id4);
        $EquipoLocal = ProTeam::find($id);
        $EquipoVisitante = ProTeam::find($id2);
        $league = ProLeague::find($id3);
        $ligas = ProLeague::all();
        $copas = ProCup::all();


        return view('ProEditarResultadoAdmin', [

            'copas' => $copas,
            'ligas' => $ligas,
            'EquipoLocal' => $EquipoLocal,
            'EquipoVisitante' => $EquipoVisitante,
            'league' => $league,
            'partido' => $partido,
            'calendario' => $calendario]);
    } 

    public function ReportarMarcadorProAdmin()
    {


        $InputIdPartido = Input::get('InputPartido');
        $marcadorLocal = Input::get('InputMarcadorLocal');
        $marcadorVisitante = Input::get('InputMarcadorVisitante');

        $partido = ProMatch::find($InputIdPartido);

        $partido->local_score = $marcadorLocal;
        $partido->visitor_score = $marcadorVisitante;
        $partido->update();

        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $clubes = ProTeam::all();

        return view('clubes-pro.clubes-pro', [

            'clubes' => $clubes,
            'copas' => $copas,
            'ligas' => $ligas]);
    }

    public function ReportarResultadosMetodo()
    {


        $VectorUsuariosLocal = Input::get('VectorUsuarioLocal');
        $UsuariosLocal = User::find($VectorUsuariosLocal);


        $League = Input::get('leagueInput');

        $equipoVisitante = Input::get('EquipoVisitanteInput');

        $equipoLocal = Input::get('EquipoLocalInput');
        $marcadorLocal = Input::get('LocalInput');
        $marcadorVisitante = Input::get('VisitorInput');


        $Goles = Input::get('GolesSelect');
        $Posicion = Input::get('PosicionSelect');

        $Amarillas = Input::get('AmarillasSelect');
        $Rojas = Input::get('RojasSelect');
        $Asistencias = Input::get('AsistenciasSelect');
        $CalendarioInput = Input::get('calendarioInput');
        $idMejorJugador = Input::get('optradio');

        $GolesVisitante = Input::get('GolesSelectVisitante');
        $AsistenciasVisitante = Input::get('AsistenciasSelectVisitante');

        if ($Goles == null) {

        } else {
            $GolesLocalT = array_sum($Goles);
            if ($GolesLocalT > $marcadorLocal) {
                return view('Reglamento')->withErrors("Son mayores los goles (local) marcados por tus jugadores con el marcador");
            }
        }

        if ($GolesVisitante == null) {

        } else {
            $GolesvisitaT = array_sum($GolesVisitante);
            if ($GolesvisitaT > $marcadorVisitante) {
                return view('Reglamento')->withErrors("Son mayores los goles (visita) marcados por tus jugadores con el marcador");
            }
        }



        if ($Asistencias == null) {

        } else {
            $sumaAsistencias = array_sum($Asistencias);
            if ($sumaAsistencias > $marcadorLocal) {
                return view('Reglamento')->withErrors("Son mayores las asistencias (local) marcados por tus jugadores con el marcador");
            }
        }

        if ($AsistenciasVisitante == null) {

        } else {
            $sumaAsistenciasVisitante = array_sum($AsistenciasVisitante);
            if ($sumaAsistenciasVisitante > $marcadorVisitante) {
                return view('Reglamento')->withErrors("Son mayores las asistencias (visita) marcados por tus jugadores con el marcador");
            }
        }
        /*   if($GolesLocalT!=$marcadorLocal){
          return view('Reglamento')->withErrors("No coincide los goles marcados por tus jugadores con el marcador");
          }
         *
         *
         */

        $Partido = new ProMatch;
        $Partido->team_local_id = $equipoLocal;
        $Partido->team_visitor_id = $equipoVisitante;
        $Partido->league_id = $League;
        $Partido->local_score = $marcadorLocal;
        $Partido->visitor_score = $marcadorVisitante;
        $Partido->save();




        $calendario = LeagueProCalendar::find($CalendarioInput);
        $equipoLoc = ProTeam::find($equipoLocal);
        $equipoVis = ProTeam::find($equipoVisitante);
        $TotalGoles = $marcadorLocal + $marcadorVisitante;

        if ($marcadorLocal == $marcadorVisitante) {


            $equipoLoc->JE += 1;
            $equipoVis->JE += 1;
            $equipoLoc->points += 1;
            $equipoVis->points += 1;
            $equipoLoc->JJ += 1;
            $equipoVis->JJ += 1;


            $equipoLoc->GF += $marcadorLocal;
            $equipoVis->GF += $marcadorVisitante;

            $equipoLoc->GC += $marcadorVisitante;
            $equipoVis->GC += $marcadorLocal;


            $EstadisticasLoc = $equipoLoc->proLeagueEstatistics;
            $EstadisticasVis = $equipoVis->proLeagueEstatistics;
            $JJLocal = $EstadisticasLoc[0]->pivot->JJ;
            $JELocal = $EstadisticasLoc[0]->pivot->JE;
            $pointsLocal = $EstadisticasLoc[0]->pivot->points;
            $GFLocal = $EstadisticasLoc[0]->pivot->GF;
            $GCLocal = $EstadisticasLoc[0]->pivot->GC;

            $JJVisitante = $EstadisticasVis[0]->pivot->JJ;
            $JEVisitante = $EstadisticasVis[0]->pivot->JE;
            $pointsVisitante = $EstadisticasVis[0]->pivot->points;
            $GFVisitante = $EstadisticasVis[0]->pivot->GF;
            $GCVisitante = $EstadisticasVis[0]->pivot->GC;


            $JJLocal += 1;
            $JELocal += 1;
            $pointsLocal += 1;
            $GFLocal += $marcadorLocal;
            $GCLocal += $marcadorVisitante;

            $JJVisitante += 1;
            $JEVisitante += 1;
            $pointsVisitante += 1;
            $GFVisitante += $marcadorVisitante;
            $GCVisitante += $marcadorLocal;


            $equipoLoc->proLeagueEstatistics()->updateExistingPivot($League, ['JJ' => $JJLocal, 'JE' => $JELocal, 'GF' => $GFLocal, 'GC' => $GCLocal, 'points' => $pointsLocal]);

            $equipoVis->proLeagueEstatistics()->updateExistingPivot($League, ['JJ' => $JJVisitante, 'JE' => $JEVisitante, 'GF' => $GFVisitante, 'GC' => $GCVisitante, 'points' => $pointsVisitante]);

            $equipoLoc->update();
            $equipoVis->update();
        }

        if ($marcadorLocal > $marcadorVisitante) {
            $equipoVis->JJ += 1;
            $equipoLoc->JJ += 1;
            $equipoLoc->JG += 1;
            $equipoVis->JP += 1;
            $equipoLoc->points += 3;
            $equipoLoc->GF += $marcadorLocal;
            $equipoVis->GF += $marcadorVisitante;

            $equipoLoc->GC += $marcadorVisitante;
            $equipoVis->GC += $marcadorLocal;


            $EstadisticasLoc = $equipoLoc->proLeagueEstatistics;
            $EstadisticasVis = $equipoVis->proLeagueEstatistics;
            $JJLocal = $EstadisticasLoc[0]->pivot->JJ;
            $JGLocal = $EstadisticasLoc[0]->pivot->JG;
            $pointsLocal = $EstadisticasLoc[0]->pivot->points;
            $GFLocal = $EstadisticasLoc[0]->pivot->GF;
            $GCLocal = $EstadisticasLoc[0]->pivot->GC;

            $JJVisitante = $EstadisticasVis[0]->pivot->JJ;
            $JPVisitante = $EstadisticasVis[0]->pivot->JP;
            $pointsVisitante = $EstadisticasVis[0]->pivot->points;
            $GFVisitante = $EstadisticasVis[0]->pivot->GF;
            $GCVisitante = $EstadisticasVis[0]->pivot->GC;


            $JJLocal += 1;
            $JGLocal += 1;
            $pointsLocal += 3;
            $GFLocal += $marcadorLocal;
            $GCLocal += $marcadorVisitante;

            $JJVisitante += 1;
            $JPVisitante += 1;
            $pointsVisitante += 0;
            $GFVisitante += $marcadorVisitante;
            $GCVisitante += $marcadorLocal;


            $equipoLoc->proLeagueEstatistics()->updateExistingPivot($League, ['JJ' => $JJLocal, 'JG' => $JGLocal, 'GF' => $GFLocal, 'GC' => $GCLocal, 'points' => $pointsLocal]);

            $equipoVis->proLeagueEstatistics()->updateExistingPivot($League, ['JJ' => $JJVisitante, 'JP' => $JPVisitante, 'GF' => $GFVisitante, 'GC' => $GCVisitante, 'points' => $pointsVisitante]);


            $equipoLoc->update();
            $equipoVis->update();
        }

        if ($marcadorLocal < $marcadorVisitante) {
            $equipoVis->JJ += 1;
            $equipoLoc->JJ += 1;
            $equipoLoc->JP += 1;
            $equipoVis->JG += 1;
            $equipoVis->points += 3;
            $equipoLoc->GF += $marcadorLocal;
            $equipoVis->GF += $marcadorVisitante;

            $equipoLoc->GC += $marcadorVisitante;
            $equipoVis->GC += $marcadorLocal;


            $EstadisticasLoc = $equipoLoc->proLeagueEstatistics;
            $EstadisticasVis = $equipoVis->proLeagueEstatistics;
            $JJLocal = $EstadisticasLoc[0]->pivot->JJ;
            $JPLocal = $EstadisticasLoc[0]->pivot->JP;
            $pointsLocal = $EstadisticasLoc[0]->pivot->points;
            $GFLocal = $EstadisticasLoc[0]->pivot->GF;
            $GCLocal = $EstadisticasLoc[0]->pivot->GC;

            $JJVisitante = $EstadisticasVis[0]->pivot->JJ;
            $JGVisitante = $EstadisticasVis[0]->pivot->JG;
            $pointsVisitante = $EstadisticasVis[0]->pivot->points;
            $GFVisitante = $EstadisticasVis[0]->pivot->GF;
            $GCVisitante = $EstadisticasVis[0]->pivot->GC;


            $JJLocal += 1;
            $JPLocal += 1;
            $pointsLocal += 0;
            $GFLocal += $marcadorLocal;
            $GCLocal += $marcadorVisitante;

            $JJVisitante += 1;
            $JGVisitante += 1;
            $pointsVisitante += 3;
            $GFVisitante += $marcadorVisitante;
            $GCVisitante += $marcadorLocal;


            $equipoLoc->proLeagueEstatistics()->updateExistingPivot($League, ['JJ' => $JJLocal, 'JP' => $JPLocal, 'GF' => $GFLocal, 'GC' => $GCLocal, 'points' => $pointsLocal]);

            $equipoVis->proLeagueEstatistics()->updateExistingPivot($League, ['JJ' => $JJVisitante, 'JG' => $JGVisitante, 'GF' => $GFVisitante, 'GC' => $GCVisitante, 'points' => $pointsVisitante]);


            $equipoLoc->update();
            $equipoVis->update();
        }

        for ($i = 0; $i < sizeof($Goles); $i++) {


            $UsuariosLocal[$i]->proMatch()->attach($Partido->id, [
                'local' => true,
                'position_id' => $Posicion[$i],
                'goals'=>$Goles[$i],
                'yellow_cards'=>$Amarillas[$i],
                'red_cards'=>$Rojas[$i],
                'assists'=>$Asistencias[$i]
            ]);
            
            
            
            
            $EstadisticasUsuarioLoc = $UsuariosLocal[$i]->proLeagueEstatistics;
          
            $UsuarioAssistanceLocal = $EstadisticasUsuarioLoc[0]->pivot->assistance;
            $UsuarioYellowCardLocal = $EstadisticasUsuarioLoc[0]->pivot->yellow_card;
            $UsuarioRedCardLocal = $EstadisticasUsuarioLoc[0]->pivot->red_card;
            $UsuarioGoalsLocal = $EstadisticasUsuarioLoc[0]->pivot->goals;
            $UsuarioBestPlayerLocal = $EstadisticasUsuarioLoc[0]->pivot->best_player;
            $UsuarioGKUnbeatenLocal = $EstadisticasUsuarioLoc[0]->pivot->gk_unbeaten;
            $UsuarioDefenceUnbeatenLocal = $EstadisticasUsuarioLoc[0]->pivot->defence_unbeaten;
            
         
            $UsuarioAssistanceLocal=$UsuarioAssistanceLocal + $Asistencias[$i];
            $UsuarioYellowCardLocal=$UsuarioYellowCardLocal + $Amarillas[$i];
            $UsuarioRedCardLocal=$UsuarioRedCardLocal + $Rojas[$i];
            $UsuarioGoalsLocal = $UsuariosGoalsLocal + $Goles[$i];


            if ($Posicion[$i] == 1) {
                $Partido->PO_local_id = $UsuariosLocal[$i]->id;
                $Partido->PO_local_red = $Rojas[$i];
                $Partido->PO_local_yellow = $Amarillas[$i];
                $Partido->PO_local_assistance = $Asistencias[$i];
                $Partido->PO_local_goal = $Goles[$i];
                if ($marcadorVisitante == 0) {
                    $Partido->PO_local_unbeaten = 1;

                }
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->PO_local_best_player = $idMejorJugador;


                }
            }
            if ($Posicion[$i] == 2) {
                $Partido->DFC_local_id = $UsuariosLocal[$i]->id;
                $Partido->DFC_local_red = $Rojas[$i];
                $Partido->DFC_local_yellow = $Amarillas[$i];
                $Partido->DFC_local_assistance = $Asistencias[$i];
                $Partido->DFC_local_goal = $Goles[$i];
                if ($marcadorVisitante == 0) {

                    $UsuariosLocal[$i]->defence_unbeaten += 1;
                }
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DFC_local_best_player = $idMejorJugador;

                }
            }

            if ($Posicion[$i] == 5) {
                $Partido->LTI_local_id = $UsuariosLocal[$i]->id;
                $Partido->LTI_local_red = $Rojas[$i];
                $Partido->LTI_local_yellow = $Amarillas[$i];
                $Partido->LTI_local_assistance = $Asistencias[$i];
                $Partido->LTI_local_goal = $Goles[$i];

                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->LTI_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 6) {
                $Partido->LTD_local_id = $UsuariosLocal[$i]->id;
                $Partido->LTD_local_red = $Rojas[$i];
                $Partido->LTD_local_yellow = $Amarillas[$i];
                $Partido->LTD_local_assistance = $Asistencias[$i];
                $Partido->LTD_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->LTD_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 7) {
                $Partido->MCD_local_id = $UsuariosLocal[$i]->id;
                $Partido->MCD_local_red = $Rojas[$i];
                $Partido->MCD_local_yellow = $Amarillas[$i];
                $Partido->MCD_local_assistance = $Asistencias[$i];
                $Partido->MCD_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MCD_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 9) {
                $Partido->MC_local_id = $UsuariosLocal[$i]->id;
                $Partido->MC_local_red = $Rojas[$i];
                $Partido->MC_local_yellow = $Amarillas[$i];
                $Partido->MC_local_assistance = $Asistencias[$i];
                $Partido->MC_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MC_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 11) {
                $Partido->MI_local_id = $UsuariosLocal[$i]->id;
                $Partido->MI_local_red = $Rojas[$i];
                $Partido->MI_local_yellow = $Amarillas[$i];
                $Partido->MI_local_assistance = $Asistencias[$i];
                $Partido->MI_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MI_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 12) {
                $Partido->MD_local_id = $UsuariosLocal[$i]->id;
                $Partido->MD_local_red = $Rojas[$i];
                $Partido->MD_local_yellow = $Amarillas[$i];
                $Partido->MD_local_assistance = $Asistencias[$i];
                $Partido->MD_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MD_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 15) {
                $Partido->MCO_local_id = $UsuariosLocal[$i]->id;
                $Partido->MCO_local_red = $Rojas[$i];
                $Partido->MCO_local_yellow = $Amarillas[$i];
                $Partido->MCO_local_assistance = $Asistencias[$i];
                $Partido->MCO_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MCO_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 17) {
                $Partido->EI_local_id = $UsuariosLocal[$i]->id;
                $Partido->EI_local_red = $Rojas[$i];
                $Partido->EI_local_yellow = $Amarillas[$i];
                $Partido->EI_local_assistance = $Asistencias[$i];
                $Partido->EI_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->EI_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 18) {
                $Partido->ED_local_id = $UsuariosLocal[$i]->id;
                $Partido->ED_local_red = $Rojas[$i];
                $Partido->ED_local_yellow = $Amarillas[$i];
                $Partido->ED_local_assistance = $Asistencias[$i];
                $Partido->ED_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->ED_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 19) {
                $Partido->DI_local_id = $UsuariosLocal[$i]->id;
                $Partido->DI_local_red = $Rojas[$i];
                $Partido->DI_local_yellow = $Amarillas[$i];
                $Partido->DI_local_assistance = $Asistencias[$i];
                $Partido->DI_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DI_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 20) {
                $Partido->DD_local_id = $UsuariosLocal[$i]->id;
                $Partido->DD_local_red = $Rojas[$i];
                $Partido->DD_local_yellow = $Amarillas[$i];
                $Partido->DD_local_assistance = $Asistencias[$i];
                $Partido->DD_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DD_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 21) {
                $Partido->DC_local_id = $UsuariosLocal[$i]->id;
                $Partido->DC_local_red = $Rojas[$i];
                $Partido->DC_local_yellow = $Amarillas[$i];
                $Partido->DC_local_assistance = $Asistencias[$i];
                $Partido->DC_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DC_local_best_player = $idMejorJugador;

                }
            }

            /* Nuevas posiciones */
            if ($Posicion[$i] == 3) {
                $Partido->DFC2_local_id = $UsuariosLocal[$i]->id;
                $Partido->DFC2_local_red = $Rojas[$i];
                $Partido->DFC2_local_yellow = $Amarillas[$i];
                $Partido->DFC2_local_assistance = $Asistencias[$i];
                $Partido->DFC2_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DFC2_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 4) {
                $Partido->DFC3_local_id = $UsuariosLocal[$i]->id;
                $Partido->DFC3_local_red = $Rojas[$i];
                $Partido->DFC3_local_yellow = $Amarillas[$i];
                $Partido->DFC3_local_assistance = $Asistencias[$i];
                $Partido->DFC3_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DFC3_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 8) {
                $Partido->MCD2_local_id = $UsuariosLocal[$i]->id;
                $Partido->MCD2_local_red = $Rojas[$i];
                $Partido->MCD2_local_yellow = $Amarillas[$i];
                $Partido->MCD2_local_assistance = $Asistencias[$i];
                $Partido->MCD2_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MCD2_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 10) {
                $Partido->MC2_local_id = $UsuariosLocal[$i]->id;
                $Partido->MC2_local_red = $Rojas[$i];
                $Partido->MC2_local_yellow = $Amarillas[$i];
                $Partido->MC2_local_assistance = $Asistencias[$i];
                $Partido->MC2_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MC2_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 13) {
                $Partido->MVI_local_id = $UsuariosLocal[$i]->id;
                $Partido->MVI_local_red = $Rojas[$i];
                $Partido->MVI_local_yellow = $Amarillas[$i];
                $Partido->MVI_local_assistance = $Asistencias[$i];
                $Partido->MVI_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MVI_local_best_player = $idMejorJugador;

                }
            }

            if ($Posicion[$i] == 14) {
                $Partido->MVD_local_id = $UsuariosLocal[$i]->id;
                $Partido->MVD_local_red = $Rojas[$i];
                $Partido->MVD_local_yellow = $Amarillas[$i];
                $Partido->MVD_local_assistance = $Asistencias[$i];
                $Partido->MVD_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MVD_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 16) {
                $Partido->MCO2_local_id = $UsuariosLocal[$i]->id;
                $Partido->MCO2_local_red = $Rojas[$i];
                $Partido->MCO2_local_yellow = $Amarillas[$i];
                $Partido->MCO2_local_assistance = $Asistencias[$i];
                $Partido->MCO2_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MCO2_local_best_player = $idMejorJugador;

                }
            }



            $UsuariosLocal[$i]->goals += $Goles[$i];

            $UsuariosLocal[$i]->yellow_card += $Amarillas[$i];
            $UsuariosLocal[$i]->red_card += $Rojas[$i];
            $UsuariosLocal[$i]->assistance += $Asistencias[$i];
            $UsuariosLocal[$i]->pro_JJ++;

            if ($Posicion[$i] == 1) {
                if ($marcadorVisitante == 0) {
                    $UsuariosLocal[$i]->proMatch()->updateExistingPivot($Partido->id, [
                        'goalkeeper_unbeaten' => true]);
                    $UsuariosLocal[$i]->gk_unbeaten += 1;
                    $UsuarioGKUnbeatenLocal= $UsuarioGKUnbeatenLocal + 1; 
                }
            }

            if ($idMejorJugador == $UsuariosLocal[$i]->id) {
                $UsuariosLocal[$i]->proMatch()->updateExistingPivot($Partido->id, [
                    'best_player' => true]);

                $UsuariosLocal[$i]->best_player += 1;
                $UsuarioBestPlayerLocal = $UsuarioBestPlayerLocal + 1;
            }

            if($Posicion[$i]==2 || $Posicion[$i]==3 ||
                $Posicion[$i]==4 || $Posicion[$i]==5 || $Posicion[$i]==6 )
            {
                $UsuariosLocal[$i]->proMatch()->updateExistingPivot($Partido->id, [
                    'defence_unbeaten' => true]);

                $UsuariosLocal[$i]->defence_unbeaten += 1;
                $UsuarioDefenceUnbeatenLocal = $UsuarioDefenceUnbeatenLocal + 1;
            }

            if ($marcadorLocal == $marcadorVisitante) {
                $UsuariosLocal[$i]->pro_JE++;
                $UsuariosLocal[$i]->pro_points++;
            }
            if ($marcadorLocal > $marcadorVisitante) {
                $UsuariosLocal[$i]->pro_JG++;
                $UsuariosLocal[$i]->pro_points += 3;
            }

            if ($marcadorLocal < $marcadorVisitante) {
                $UsuariosLocal[$i]->pro_JP++;
            }

            $LocalUser[] = $UsuariosLocal[$i]->id;
            
            $UsuariosLocal[$i]->proLeagues()->updateExistingPivot($League, 
                        [
                                
                                'assistance'=>$UsuarioAssistanceLocal,
                                'yellow_card'=>$UsuarioYellowCardLocal,
                                'red_card'=>$UsuarioRedCardLocal,
                                'goals'=>$UsuarioGoalsLocal,
                                'best_player'=>$UsuarioBestPlayerLocal,
                                'gk_unbeaten'=>$UsuarioGKUnbeatenLocal,
                                'defence_unbeaten'=>$UsuarioDefenceUnbeatenLocal
                            ]);
            
            $UsuariosLocal[$i]->update();
        }



//VISITANTE
        $VectorUsuariosVisitante = Input::get('VectorUsuarioVisitante');
        $UsuariosVisitante = User::find($VectorUsuariosVisitante);
        $GolesVisitante = Input::get('GolesSelectVisitante');
        $PosicionVisitante = Input::get('PosicionSelectVisitante');
        $AmarillasVisitante = Input::get('AmarillasSelectVisitante');
        $RojasVisitante = Input::get('RojasSelectVisitante');



        for ($i = 0; $i < sizeof($GolesVisitante); $i++) {
            $UsuariosVisitante[$i]->proMatch()->attach($Partido->id, [
                'local' => true,
                'position_id' => $PosicionVisitante[$i],
                'goals'=>$GolesVisitante[$i],
                'yellow_cards'=>$AmarillasVisitante[$i],
                'red_cards'=>$RojasVisitante[$i],
                'assists'=>$AsistenciasVisitante[$i]
            ]);
            
            $EstadisticasUsuarioVis = $UsuariosVisitante[$i]->proLeagueEstatistics;
            
            $UsuarioAssistanceVisitante = $EstadisticasUsuarioVis[0]->pivot->assistance;
            $UsuarioYellowCardVisitante = $EstadisticasUsuarioVis[0]->pivot->yellow_card;
            $UsuarioRedCardVisitante = $EstadisticasUsuarioVis[0]->pivot->red_card;
            $UsuarioGoalsVisitante = $EstadisticasUsuarioVis[0]->pivot->goals;
            $UsuarioBestPlayerVisitante = $EstadisticasUsuarioVis[0]->pivot->best_player;
            $UsuarioGKUnbeatenVisitante = $EstadisticasUsuarioVis[0]->pivot->gk_unbeaten;
            $UsuarioDefenceUnbeatenVisitante = $EstadisticasUsuarioVis[0]->pivot->defence_unbeaten;
            
            $UsuarioAssistanceVisitante=$UsuarioAssistanceVisitante + $AsistenciasVisitante[$i];
            $UsuarioYellowCardVisitante=$UsuarioYellowCardVisitante + $AmarillasVisitante[$i];
            $UsuarioRedCardVisitante=$UsuarioRedCardVisitante + $RojasVisitante[$i];
            $UsuarioGoalsVisitante = $UsuariosGoalsVisitante + $GolesVisitante[$i];
            
            
               
            

            if ($PosicionVisitante[$i] == 1) {
                $Partido->PO_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->PO_visitor_red = $RojasVisitante[$i];
                $Partido->PO_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->PO_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->PO_visitor_goal = $GolesVisitante[$i];
                if ($marcadorLocal == 0) {
                    $Partido->PO_visitor_unbeaten = 1;

                }

                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->PO_visitor_best_player = $idMejorJugador;

                }
            }

            if ($PosicionVisitante[$i] == 2) {
                $Partido->DFC_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DFC_visitor_red = $RojasVisitante[$i];
                $Partido->DFC_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DFC_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DFC_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->DFC_visitor_best_player = $idMejorJugador;

                }
            }

            if ($PosicionVisitante[$i] == 5) {
                $Partido->LTI_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->LTI_visitor_red = $RojasVisitante[$i];
                $Partido->LTI_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->LTI_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->LTI_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->LTI_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 6) {
                $Partido->LTD_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->LTD_visitor_red = $RojasVisitante[$i];
                $Partido->LTD_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->LTD_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->LTD_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->LTD_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 7) {

                $Partido->MCD_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MCD_visitor_red = $RojasVisitante[$i];
                $Partido->MCD_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MCD_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MCD_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MCD_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 9) {
                $Partido->MC_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MC_visitor_red = $RojasVisitante[$i];
                $Partido->MC_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MC_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MC_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MC_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 11) {
                $Partido->MI_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MI_visitor_red = $RojasVisitante[$i];
                $Partido->MI_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MI_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MI_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MI_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 12) {
                $Partido->MD_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MD_visitor_red = $RojasVisitante[$i];
                $Partido->MD_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MD_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MD_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MD_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 15) {
                $Partido->MCO_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MCO_visitor_red = $RojasVisitante[$i];
                $Partido->MCO_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MCO_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MCO_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MCO_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 17) {
                $Partido->EI_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->EI_visitor_red = $RojasVisitante[$i];
                $Partido->EI_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->EI_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->EI_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->EI_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 18) {

                $Partido->ED_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->ED_visitor_red = $RojasVisitante[$i];
                $Partido->ED_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->ED_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->ED_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->ED_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 19) {
                $Partido->DI_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DI_visitor_red = $RojasVisitante[$i];
                $Partido->DI_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DI_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DI_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->DI_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 20) {
                $Partido->DD_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DD_visitor_red = $RojasVisitante[$i];
                $Partido->DD_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DD_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DD_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->DD_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 21) {
                $Partido->DC_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DC_visitor_red = $RojasVisitante[$i];
                $Partido->DC_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DC_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DC_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->DC_visitor_best_player = $idMejorJugador;

                }
            }

            /* Nuevas posiciones visitante */

            if ($PosicionVisitante[$i] == 3) {
                $Partido->DFC2_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DFC2_visitor_red = $RojasVisitante[$i];
                $Partido->DFC2_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DFC2_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DFC2_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->DFC2_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 4) {
                $Partido->DFC3_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DFC3_visitor_red = $RojasVisitante[$i];
                $Partido->DFC3_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DFC3_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DFC3_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->DFC3_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 8) {
                $Partido->MCD2_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MCD2_visitor_red = $RojasVisitante[$i];
                $Partido->MCD2_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MCD2_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MCD2_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->MCD2_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 10) {
                $Partido->MC2_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MC2_visitor_red = $RojasVisitante[$i];
                $Partido->MC2_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MC2_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MC2_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->MC2_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 13) {
                $Partido->MVI_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MVI_visitor_red = $RojasVisitante[$i];
                $Partido->MVI_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MVI_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MVI_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MVI_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 14) {
                $Partido->MVD_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MVD_visitor_red = $RojasVisitante[$i];
                $Partido->MVD_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MVD_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MVD_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MVD_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 16) {
                $Partido->MCO2_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MCO2_visitor_red = $RojasVisitante[$i];
                $Partido->MCO2_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MCO2_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MCO2_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MCO2_visitor_best_player = $idMejorJugador;

                }
            }

            $UsuariosVisitante[$i]->goals += $GolesVisitante[$i];
            $UsuariosVisitante[$i]->yellow_card += $AmarillasVisitante[$i];
            $UsuariosVisitante[$i]->red_card += $RojasVisitante[$i];
            $UsuariosVisitante[$i]->assistance += $AsistenciasVisitante[$i];
            $UsuariosVisitante[$i]->pro_JJ++;

            if ($PosicionVisitante[$i] == 1) {
                if ($marcadorLocal == 0) {
                    $UsuariosVisitante[$i]->proMatch()->updateExistingPivot($Partido->id, [
                        'goalkeeper_unbeaten' => true]);
                    $UsuariosVisitante[$i]->gk_unbeaten += 1;
                    $UsuarioGKUnbeatenVisitante= $UsuarioGKUnbeatenVisitante + 1;
                }
            }

            if ($idMejorJugador == $UsuariosVisitante[$i]->id) {
                $UsuariosVisitante[$i]->proMatch()->updateExistingPivot($Partido->id, [
                    'best_player' => true]);

                $UsuariosVisitante[$i]->best_player += 1;
                $UsuarioBestPlayerVisitante=$UsuarioBestPlayerVisitante + 1; 
            }

            if($PosicionVisitante[$i]==2 || $PosicionVisitante[$i]==3 ||
                $PosicionVisitante[$i]==4 || $PosicionVisitante[$i]==5 || $PosicionVisitante[$i]==6 )
            {
                $UsuariosVisitante[$i]->proMatch()->updateExistingPivot($Partido->id, [
                    'defence_unbeaten' => true]);

                $UsuariosVisitante[$i]->defence_unbeaten += 1;
                $UsuarioDefenceUnbeatenVisitante= $UsuarioDefenceUnbeatenVisitante + 1;
            }

            if ($marcadorLocal == $marcadorVisitante) {
                $UsuariosVisitante[$i]->pro_JE++;
                $UsuariosVisitante[$i]->pro_points++;
            }
            if ($marcadorLocal < $marcadorVisitante) {
                $UsuariosVisitante[$i]->pro_JG++;
                $UsuariosVisitante[$i]->pro_points += 3;
            }

            if ($marcadorLocal > $marcadorVisitante) {
                $UsuariosVisitante[$i]->pro_JP++;
            }


            $UsuariosVisitante[$i]->update();
        }

        $calendario->match_id = $Partido->id;
        $calendario->update();
        $Partido->update();


        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();

        return view('clubes-pro.clubes-pro', ['clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas]);

}

    public function ReportarResultadosMetodo2()
    {


        $VectorUsuariosLocal = Input::get('VectorUsuarioLocal');

        $partidoid = Input::get('partidoInput');
        $Partido = ProMatch::find($partidoid);

        $UsuariosLocal = User::find($VectorUsuariosLocal);

        $League = Input::get('leagueInput');
        $equipoVisitante = Input::get('EquipoVisitanteInput');
        $equipoLocal = Input::get('EquipoLocalInput');
        $marcadorLocal = Input::get('LocalInput');
        $marcadorVisitante = Input::get('VisitorInput');

        $Goles = Input::get('GolesSelect');
        $Posicion = Input::get('PosicionSelect');
        $GolesVisitante = Input::get('GolesSelectVisitante');
        $Amarillas = Input::get('AmarillasSelect');
        $Rojas = Input::get('RojasSelect');
        $Asistencias = Input::get('AsistenciasSelect');
        $AsistenciasVisitante = Input::get('AsistenciasSelectVisitante');

        $idMejorJugador = Input::get('optradio');


        if ($Goles == null) {

        } else {
            $GolesLocalT = array_sum($Goles);

            if ($GolesLocalT > $Partido->local_score) {
                return view('Reglamento')->withErrors("Son mayores los goles (local) marcados por tus jugadores con el marcador");
            }
        }

        if ($GolesVisitante == null) {

        } else {
            $GolesvisitaT = array_sum($GolesVisitante);


            if ($GolesvisitaT > $Partido->visitor_score) {
                return view('Reglamento')->withErrors("Son mayores  los goles (visita) marcados por tus jugadores con el marcador");
            }
        }

        if ($Asistencias == null) {

        } else {
            $sumaAsistencias = array_sum($Asistencias);
            if ($sumaAsistencias > $Partido->local_score) {
                return view('Reglamento')->withErrors("Son mayores las asistencias (local) marcados por tus jugadores con el marcador");
            }
        }

        if ($AsistenciasVisitante == null) {

        } else {
            $sumaAsistenciasVisitante = array_sum($AsistenciasVisitante);

            if ($sumaAsistenciasVisitante > $Partido->visitor_score) {
                return view('Reglamento')->withErrors("Son mayores las asistencias (visita) marcados por tus jugadores con el marcador");
            }
        }


        $equipoLoc = ProTeam::find($equipoLocal);
        $equipoVis = ProTeam::find($equipoVisitante);


        for ($i = 0; $i < sizeof($Goles); $i++) {

            $UsuariosLocal[$i]->goals += $Goles[$i];

            $UsuariosLocal[$i]->proMatch()->attach($Partido->id, [
                'local' => true,
                'position_id' => $Posicion[$i],
                'goals'=>$Goles[$i],
                'yellow_cards'=>$Amarillas[$i],
                'red_cards'=>$Rojas[$i],
                'assists'=>$Asistencias[$i]
            ]);
            
            $EstadisticasUsuarioLoc = $UsuariosLocal[$i]->proLeagueEstatistics;
           
            $UsuarioAssistanceLocal = $EstadisticasUsuarioLoc[0]->pivot->assistance;
            $UsuarioYellowCardLocal = $EstadisticasUsuarioLoc[0]->pivot->yellow_card;
            $UsuarioRedCardLocal = $EstadisticasUsuarioLoc[0]->pivot->red_card;
            $UsuarioGoalsLocal = $EstadisticasUsuarioLoc[0]->pivot->goals;
            $UsuarioBestPlayerLocal = $EstadisticasUsuarioLoc[0]->pivot->best_player;
            $UsuarioGKUnbeatenLocal = $EstadisticasUsuarioLoc[0]->pivot->gk_unbeaten;
            $UsuarioDefenceUnbeatenLocal = $EstadisticasUsuarioLoc[0]->pivot->defence_unbeaten;
            
          
           
            
            $UsuarioAssistanceLocal=$UsuarioAssistanceLocal + $Asistencias[$i];
            $UsuarioYellowCardLocal=$UsuarioYellowCardLocal + $Amarillas[$i];
            $UsuarioRedCardLocal=$UsuarioRedCardLocal + $Rojas[$i];
            $UsuarioGoalsLocal = $UsuariosGoalsLocal + $Goles[$i];

            if ($Posicion[$i] == 1) {
                $Partido->PO_local_id = $UsuariosLocal[$i]->id;
                $Partido->PO_local_red = $Rojas[$i];
                $Partido->PO_local_yellow = $Amarillas[$i];
                $Partido->PO_local_assistance = $Asistencias[$i];
                $Partido->PO_local_goal = $Goles[$i];
                if ($marcadorVisitante == 0) {
                    $Partido->PO_local_unbeaten = 1;

                }
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->PO_local_best_player = $idMejorJugador;


                }
            }
            if ($Posicion[$i] == 2) {
                $Partido->DFC_local_id = $UsuariosLocal[$i]->id;
                $Partido->DFC_local_red = $Rojas[$i];
                $Partido->DFC_local_yellow = $Amarillas[$i];
                $Partido->DFC_local_assistance = $Asistencias[$i];
                $Partido->DFC_local_goal = $Goles[$i];
                if ($marcadorVisitante == 0) {

                    $UsuariosLocal[$i]->defence_unbeaten += 1;
                }
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DFC_local_best_player = $idMejorJugador;

                }
            }

            if ($Posicion[$i] == 5) {
                $Partido->LTI_local_id = $UsuariosLocal[$i]->id;
                $Partido->LTI_local_red = $Rojas[$i];
                $Partido->LTI_local_yellow = $Amarillas[$i];
                $Partido->LTI_local_assistance = $Asistencias[$i];
                $Partido->LTI_local_goal = $Goles[$i];

                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->LTI_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 6) {
                $Partido->LTD_local_id = $UsuariosLocal[$i]->id;
                $Partido->LTD_local_red = $Rojas[$i];
                $Partido->LTD_local_yellow = $Amarillas[$i];
                $Partido->LTD_local_assistance = $Asistencias[$i];
                $Partido->LTD_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->LTD_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 7) {
                $Partido->MCD_local_id = $UsuariosLocal[$i]->id;
                $Partido->MCD_local_red = $Rojas[$i];
                $Partido->MCD_local_yellow = $Amarillas[$i];
                $Partido->MCD_local_assistance = $Asistencias[$i];
                $Partido->MCD_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MCD_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 9) {
                $Partido->MC_local_id = $UsuariosLocal[$i]->id;
                $Partido->MC_local_red = $Rojas[$i];
                $Partido->MC_local_yellow = $Amarillas[$i];
                $Partido->MC_local_assistance = $Asistencias[$i];
                $Partido->MC_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MC_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 11) {
                $Partido->MI_local_id = $UsuariosLocal[$i]->id;
                $Partido->MI_local_red = $Rojas[$i];
                $Partido->MI_local_yellow = $Amarillas[$i];
                $Partido->MI_local_assistance = $Asistencias[$i];
                $Partido->MI_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MI_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 12) {
                $Partido->MD_local_id = $UsuariosLocal[$i]->id;
                $Partido->MD_local_red = $Rojas[$i];
                $Partido->MD_local_yellow = $Amarillas[$i];
                $Partido->MD_local_assistance = $Asistencias[$i];
                $Partido->MD_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MD_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 15) {
                $Partido->MCO_local_id = $UsuariosLocal[$i]->id;
                $Partido->MCO_local_red = $Rojas[$i];
                $Partido->MCO_local_yellow = $Amarillas[$i];
                $Partido->MCO_local_assistance = $Asistencias[$i];
                $Partido->MCO_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MCO_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 17) {
                $Partido->EI_local_id = $UsuariosLocal[$i]->id;
                $Partido->EI_local_red = $Rojas[$i];
                $Partido->EI_local_yellow = $Amarillas[$i];
                $Partido->EI_local_assistance = $Asistencias[$i];
                $Partido->EI_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->EI_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 18) {
                $Partido->ED_local_id = $UsuariosLocal[$i]->id;
                $Partido->ED_local_red = $Rojas[$i];
                $Partido->ED_local_yellow = $Amarillas[$i];
                $Partido->ED_local_assistance = $Asistencias[$i];
                $Partido->ED_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->ED_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 19) {
                $Partido->DI_local_id = $UsuariosLocal[$i]->id;
                $Partido->DI_local_red = $Rojas[$i];
                $Partido->DI_local_yellow = $Amarillas[$i];
                $Partido->DI_local_assistance = $Asistencias[$i];
                $Partido->DI_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DI_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 20) {
                $Partido->DD_local_id = $UsuariosLocal[$i]->id;
                $Partido->DD_local_red = $Rojas[$i];
                $Partido->DD_local_yellow = $Amarillas[$i];
                $Partido->DD_local_assistance = $Asistencias[$i];
                $Partido->DD_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DD_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 21) {
                $Partido->DC_local_id = $UsuariosLocal[$i]->id;
                $Partido->DC_local_red = $Rojas[$i];
                $Partido->DC_local_yellow = $Amarillas[$i];
                $Partido->DC_local_assistance = $Asistencias[$i];
                $Partido->DC_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DC_local_best_player = $idMejorJugador;

                }
            }

            /* Nuevas posiciones */
            if ($Posicion[$i] == 3) {
                $Partido->DFC2_local_id = $UsuariosLocal[$i]->id;
                $Partido->DFC2_local_red = $Rojas[$i];
                $Partido->DFC2_local_yellow = $Amarillas[$i];
                $Partido->DFC2_local_assistance = $Asistencias[$i];
                $Partido->DFC2_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DFC2_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 4) {
                $Partido->DFC3_local_id = $UsuariosLocal[$i]->id;
                $Partido->DFC3_local_red = $Rojas[$i];
                $Partido->DFC3_local_yellow = $Amarillas[$i];
                $Partido->DFC3_local_assistance = $Asistencias[$i];
                $Partido->DFC3_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->DFC3_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 8) {
                $Partido->MCD2_local_id = $UsuariosLocal[$i]->id;
                $Partido->MCD2_local_red = $Rojas[$i];
                $Partido->MCD2_local_yellow = $Amarillas[$i];
                $Partido->MCD2_local_assistance = $Asistencias[$i];
                $Partido->MCD2_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MCD2_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 10) {
                $Partido->MC2_local_id = $UsuariosLocal[$i]->id;
                $Partido->MC2_local_red = $Rojas[$i];
                $Partido->MC2_local_yellow = $Amarillas[$i];
                $Partido->MC2_local_assistance = $Asistencias[$i];
                $Partido->MC2_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MC2_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 13) {
                $Partido->MVI_local_id = $UsuariosLocal[$i]->id;
                $Partido->MVI_local_red = $Rojas[$i];
                $Partido->MVI_local_yellow = $Amarillas[$i];
                $Partido->MVI_local_assistance = $Asistencias[$i];
                $Partido->MVI_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MVI_local_best_player = $idMejorJugador;

                }
            }

            if ($Posicion[$i] == 14) {
                $Partido->MVD_local_id = $UsuariosLocal[$i]->id;
                $Partido->MVD_local_red = $Rojas[$i];
                $Partido->MVD_local_yellow = $Amarillas[$i];
                $Partido->MVD_local_assistance = $Asistencias[$i];
                $Partido->MVD_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MVD_local_best_player = $idMejorJugador;

                }
            }
            if ($Posicion[$i] == 16) {
                $Partido->MCO2_local_id = $UsuariosLocal[$i]->id;
                $Partido->MCO2_local_red = $Rojas[$i];
                $Partido->MCO2_local_yellow = $Amarillas[$i];
                $Partido->MCO2_local_assistance = $Asistencias[$i];
                $Partido->MCO2_local_goal = $Goles[$i];
                if ($idMejorJugador == $UsuariosLocal[$i]->id) {

                    $Partido->MCO2_local_best_player = $idMejorJugador;

                }
            }


            if ($Posicion[$i] == 1) {
                if ($marcadorVisitante == 0) {
                    $UsuariosLocal[$i]->proMatch()->updateExistingPivot($Partido->id, [
                        'goalkeeper_unbeaten' => true]);
                    $UsuariosLocal[$i]->gk_unbeaten += 1;
                    $UsuarioGKUnbeatenLocal = $UsuarioGKUnbeatenLocal + 1;
                }
            }

            if ($idMejorJugador == $UsuariosLocal[$i]->id) {
                $UsuariosLocal[$i]->proMatch()->updateExistingPivot($Partido->id, [
                    'best_player' => true]);

                $UsuariosLocal[$i]->best_player += 1;
                $UsuarioBestPlayerLocal = $UsuarioBestPlayerLocal + 1;
            }

            if($Posicion[$i]==2 || $Posicion[$i]==3 ||
                $Posicion[$i]==4 || $Posicion[$i]==5 || $Posicion[$i]==6 )
            {
                $UsuariosLocal[$i]->proMatch()->updateExistingPivot($Partido->id, [
                    'defence_unbeaten' => true]);

                $UsuariosLocal[$i]->defence_unbeaten += 1;
                $UsuarioDefenceUnbeatenLocal = $UsuarioDefenceUnbeatenLocal + 1;
            }

            $UsuariosLocal[$i]->yellow_card += $Amarillas[$i];
            $UsuariosLocal[$i]->red_card += $Rojas[$i];
            $UsuariosLocal[$i]->assistance += $Asistencias[$i];
            $UsuariosLocal[$i]->pro_JJ++;
            $LocalUser[] = $UsuariosLocal[$i]->id;

            if ($Partido->local_score == $Partido->visitor_score) {
                $UsuariosLocal[$i]->pro_JE++;
                $UsuariosLocal[$i]->pro_Points++;
            }
            if ($Partido->local_score > $Partido->visitor_score) {
                $UsuariosLocal[$i]->pro_JG++;
                $UsuariosLocal[$i]->pro_Points += 3;
            }

            if ($Partido->local_score < $Partido->visitor_score) {
                $UsuariosLocal[$i]->pro_JP++;
            }

              $UsuariosLocal[$i]->proLeagues()->updateExistingPivot($League, 
                        [
                                'JJ'=>$UsuarioJJLocal,
                                'JG'=>$UsuarioJGLocal,
                                'JE'=>$UsuarioJELocal,
                                'JP'=>$UsuarioJPLocal,                                
                                'points'=>$UsuarioPointsLocal,
                                'assistance'=>$UsuarioAssistanceLocal,
                                'yellow_card'=>$UsuarioYellowCardLocal,
                                'red_card'=>$UsuarioRedCardLocal,
                                'goals'=>$UsuarioGoalsLocal,
                                'best_player'=>$UsuarioBestPlayerLocal,
                                'gk_unbeaten'=>$UsuarioGKUnbeatenLocal,
                                'defence_unbeaten'=>$UsuarioDefenceUnbeatenLocal
                            ]);

            $UsuariosLocal[$i]->update();
        }


        $VectorUsuariosVisitante = Input::get('VectorUsuarioVisitante');

        $UsuariosVisitante = User::find($VectorUsuariosVisitante);


        $PosicionVisitante = Input::get('PosicionSelectVisitante');

        $AmarillasVisitante = Input::get('AmarillasSelectVisitante');
        $RojasVisitante = Input::get('RojasSelectVisitante');

        $radio = Input::get('optradio');


        for ($i = 0; $i < sizeof($GolesVisitante); $i++) {

            $UsuariosVisitante[$i]->proMatch()->attach($Partido->id, [
                'local' => true,
                'position_id' => $PosicionVisitante[$i],
                'goals'=>$GolesVisitante[$i],
                'yellow_cards'=>$AmarillasVisitante[$i],
                'red_cards'=>$RojasVisitante[$i],
                'assists'=>$AsistenciasVisitante[$i]
            ]);
            
            
            
            $EstadisticasUsuarioVis = $UsuariosVisitante[$i]->proLeagueEstatistics;
            
            $UsuarioAssistanceVisitante = $EstadisticasUsuarioVis[0]->pivot->assistance;
            $UsuarioYellowCardVisitante = $EstadisticasUsuarioVis[0]->pivot->yellow_card;
            $UsuarioRedCardVisitante = $EstadisticasUsuarioVis[0]->pivot->red_card;
            $UsuarioGoalsVisitante = $EstadisticasUsuarioVis[0]->pivot->goals;
            $UsuarioBestPlayerVisitante = $EstadisticasUsuarioVis[0]->pivot->best_player;
            $UsuarioGKUnbeatenVisitante = $EstadisticasUsuarioVis[0]->pivot->gk_unbeaten;
            $UsuarioDefenceUnbeatenVisitante = $EstadisticasUsuarioVis[0]->pivot->defence_unbeaten;
            
            $UsuarioAssistanceVisitante=$UsuarioAssistanceVisitante + $AsistenciasVisitante[$i];
            $UsuarioYellowCardVisitante=$UsuarioYellowCardVisitante + $AmarillasVisitante[$i];
            $UsuarioRedCardVisitante=$UsuarioRedCardVisitante + $RojasVisitante[$i];
            $UsuarioGoalsVisitante = $UsuariosGoalsVisitante + $GolesVisitante[$i];
            
            
       

            if ($PosicionVisitante[$i] == 1) {
                $Partido->PO_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->PO_visitor_red = $RojasVisitante[$i];
                $Partido->PO_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->PO_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->PO_visitor_goal = $GolesVisitante[$i];
                if ($marcadorLocal == 0) {
                    $Partido->PO_visitor_unbeaten = 1;

                }

                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->PO_visitor_best_player = $idMejorJugador;
                        
                }
            }

            if ($PosicionVisitante[$i] == 2) {
                $Partido->DFC_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DFC_visitor_red = $RojasVisitante[$i];
                $Partido->DFC_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DFC_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DFC_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->DFC_visitor_best_player = $idMejorJugador;

                }
            }

            if ($PosicionVisitante[$i] == 5) {
                $Partido->LTI_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->LTI_visitor_red = $RojasVisitante[$i];
                $Partido->LTI_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->LTI_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->LTI_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->LTI_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 6) {
                $Partido->LTD_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->LTD_visitor_red = $RojasVisitante[$i];
                $Partido->LTD_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->LTD_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->LTD_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->LTD_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 7) {

                $Partido->MCD_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MCD_visitor_red = $RojasVisitante[$i];
                $Partido->MCD_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MCD_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MCD_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MCD_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 9) {
                $Partido->MC_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MC_visitor_red = $RojasVisitante[$i];
                $Partido->MC_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MC_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MC_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MC_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 11) {
                $Partido->MI_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MI_visitor_red = $RojasVisitante[$i];
                $Partido->MI_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MI_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MI_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MI_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 12) {
                $Partido->MD_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MD_visitor_red = $RojasVisitante[$i];
                $Partido->MD_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MD_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MD_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MD_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 15) {
                $Partido->MCO_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MCO_visitor_red = $RojasVisitante[$i];
                $Partido->MCO_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MCO_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MCO_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MCO_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 17) {
                $Partido->EI_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->EI_visitor_red = $RojasVisitante[$i];
                $Partido->EI_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->EI_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->EI_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->EI_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 18) {

                $Partido->ED_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->ED_visitor_red = $RojasVisitante[$i];
                $Partido->ED_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->ED_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->ED_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->ED_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 19) {
                $Partido->DI_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DI_visitor_red = $RojasVisitante[$i];
                $Partido->DI_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DI_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DI_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->DI_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 20) {
                $Partido->DD_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DD_visitor_red = $RojasVisitante[$i];
                $Partido->DD_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DD_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DD_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->DD_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 21) {
                $Partido->DC_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DC_visitor_red = $RojasVisitante[$i];
                $Partido->DC_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DC_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DC_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->DC_visitor_best_player = $idMejorJugador;

                }
            }

            /* Nuevas posiciones  */

            if ($PosicionVisitante[$i] == 3) {
                $Partido->DFC2_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DFC2_visitor_red = $RojasVisitante[$i];
                $Partido->DFC2_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DFC2_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DFC2_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->DFC2_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 4) {
                $Partido->DFC3_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->DFC3_visitor_red = $RojasVisitante[$i];
                $Partido->DFC3_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->DFC3_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->DFC3_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->DFC3_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 8) {
                $Partido->MCD2_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MCD2_visitor_red = $RojasVisitante[$i];
                $Partido->MCD2_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MCD2_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MCD2_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->MCD2_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 10) {
                $Partido->MC2_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MC2_visitor_red = $RojasVisitante[$i];
                $Partido->MC2_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MC2_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MC2_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {
                    $Partido->MC2_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 13) {
                $Partido->MVI_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MVI_visitor_red = $RojasVisitante[$i];
                $Partido->MVI_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MVI_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MVI_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MVI_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 14) {
                $Partido->MVD_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MVD_visitor_red = $RojasVisitante[$i];
                $Partido->MVD_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MVD_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MVD_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MVD_visitor_best_player = $idMejorJugador;

                }
            }
            if ($PosicionVisitante[$i] == 16) {
                $Partido->MCO2_visitor_id = $UsuariosVisitante[$i]->id;
                $Partido->MCO2_visitor_red = $RojasVisitante[$i];
                $Partido->MCO2_visitor_yellow = $AmarillasVisitante[$i];
                $Partido->MCO2_visitor_assistance = $AsistenciasVisitante[$i];
                $Partido->MCO2_visitor_goal = $GolesVisitante[$i];
                if ($UsuariosVisitante[$i]->id == $idMejorJugador) {

                    $Partido->MCO2_visitor_best_player = $idMejorJugador;

                }
            }


            if ($PosicionVisitante[$i] == 1) {
                if ($marcadorLocal == 0) {
                    $UsuariosVisitante[$i]->proMatch()->updateExistingPivot($Partido->id, [
                        'goalkeeper_unbeaten' => true]);
                    $UsuariosVisitante[$i]->gk_unbeaten += 1;
                     $UsuarioGKUnbeatenVisitante=$UsuarioGKUnbeatenVisitante + 1;
                }
            }

            if ($idMejorJugador == $UsuariosVisitante[$i]->id) {
                $UsuariosVisitante[$i]->proMatch()->updateExistingPivot($Partido->id, [
                    'best_player' => true]);

                $UsuariosVisitante[$i]->best_player += 1;
                 $UsuarioBestPlayerVisitante= $UsuarioBestPlayerVisitante + 1;
            }

            if($PosicionVisitante[$i]==2 || $PosicionVisitante[$i]==3 ||
                $PosicionVisitante[$i]==4 || $PosicionVisitante[$i]==5 || $PosicionVisitante[$i]==6 )
            {
                $UsuariosVisitante[$i]->proMatch()->updateExistingPivot($Partido->id, [
                    'defence_unbeaten' => true]);

                $UsuariosVisitante[$i]->defence_unbeaten += 1;
                $UsuarioDefenceUnbeatenVisitante=$UsuarioDefenceUnbeatenVisitante + 1;
            }

            $UsuariosVisitante[$i]->goals += $GolesVisitante[$i];
            $UsuariosVisitante[$i]->yellow_card += $AmarillasVisitante[$i];
            $UsuariosVisitante[$i]->red_card += $RojasVisitante[$i];
            $UsuariosVisitante[$i]->assistance += $AsistenciasVisitante[$i];
            $UsuariosVisitante[$i]->pro_JJ++;

            if ($Partido->local_score == $Partido->visitor_score) {
                $UsuariosVisitante[$i]->pro_JE++;
                $UsuariosVisitante[$i]->pro_Points++;
            }
            if ($Partido->local_score < $Partido->visitor_score) {
                $UsuariosVisitante[$i]->pro_JG++;
                $UsuariosVisitante[$i]->pro_Points += 3;
            }

            if ($Partido->local_score > $Partido->visitor_score) {
                $UsuariosVisitante[$i]->pro_JP++;
            }

                 $UsuariosVisitante[$i]->proLeagues()->updateExistingPivot($League, 
                        [
                                'assistance'=>$UsuarioAssistanceVisitante,
                                'yellow_card'=>$UsuarioYellowCardVisitante,
                                'red_card'=>$UsuarioRedCardVisitante,
                                'goals'=>$UsuarioGoalsVisitante,
                                'best_player'=>$UsuarioBestPlayerVisitante,
                                'gk_unbeaten'=>$UsuarioGKUnbeatenVisitante,
                                'defence_unbeaten'=>$UsuarioDefenceUnbeatenVisitante
                            ]);
            
            $UsuariosVisitante[$i]->update();
        }


        $Partido->edited_match_visitor = 1;
        $Partido->update();


        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();

        return view('clubes-pro.clubes-pro', ['clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas]);
    }

    public function ReportarPartidoMetodo($id, $id2, $id3, $id4)
    {
        $Equipo1 = ProTeam::find($id);
        $Equipo2 = ProTeam::find($id2);
        $league = ProLeague::find($id3);
        $calendario = LeagueProCalendar::find($id4);
        $EquipoUserAuth = Auth::user()->proTeams[0]->id;


        return view('ReportarPartidoPro', ['Equipo1' => $Equipo1,
            'EquipoUserAuth' => $EquipoUserAuth,
            'Equipo2' => $Equipo2, 'league' => $league,
            'calendario' => $calendario]);
    }

    public function ReportarPartidoMetodo2($id, $id2, $id3, $id4, $id5)
    {
        $Equipo1 = ProTeam::find($id);
        $Equipo2 = ProTeam::find($id2);
        $league = ProLeague::find($id3);
        $partido = ProMatch::find($id5);
        $calendario = LeagueProCalendar::find($id4);
        $EquipoUserAuth = Auth::user()->proTeams[0]->id;


        return view('EditarPartidoPro', ['Equipo1' => $Equipo1,
            'EquipoUserAuth' => $EquipoUserAuth,
            'Equipo2' => $Equipo2,
            'league' => $league,
            'partido' => $partido,
            'calendario' => $calendario]);
    }

    public function buscar()
    {
        $search = Input::get('search');
        return view('clubes-pro.buscar', [
            'clubes' => Proteam::all(),
            'ligas' => ProLeague::all(),
            'copas' => ProCup::all(),
            'search' => Input::get('search'),
            'pro_team_search' => ProTeam::search($search)->get(),
        ]);
    }

    public function buscarEquipo()
    {

        $search = Input::get('search');
        return view('TransferenciasBuscarE', [
            'clubes' => Proteam::all(),
            'ligas' => ProLeague::all(),
            'copas' => ProCup::all(),
            'search' => Input::get('search'),
            'pro_team_search' => ProTeam::search($search)->get(),
        ]);
    }

    public function buscarJugador()
    {
        $search = Input::get('search');
        return view('TransferenciasBuscarJ', [
            'users' => User::all(),
            'ligas' => ProLeague::all(),
            'copas' => ProCup::all(),
            'search' => Input::get('search'),
            'user_search' => User::search($search)->get(),
        ]);
    }
    
      public function BajaJugadorClubPro(ProTeam $proTeam,User $user)
    {
        $proTeam->downUser($user);
        if (ProTeam::whereId($user->id)->first()) {
            return redirect()->to('clubes-pro');
        }
        return redirect()->to('clubes-pro');
    }

    public function deleteBaja(ProTeam $proTeam)
    {
        $proTeam->downUser(Auth::user());
        if (ProTeam::whereId(\Auth::user()->id)->first()) {
            return redirect()->to('clubes-pro');
        }
        return redirect()->to('clubes-pro');
    }

    public function editarClub($id)
    {


        $club = ProTeam::find($id);
        $ligas = ProLeague::all();
        $copas = ProCup::all();

        return view('EditarClubPro', ['club' => $club, 'ligas' => $ligas, 'copas' => $copas]);
    }

    public function editarImagen($id, Request $request)
    {
        $club = ProTeam::find($id);

        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $clubes = ProTeam::all();

        $picture = $request->file('picture');
        if ($picture) {
            $club->saveImage($picture);
        }

        return view('clubes-pro.clubes-pro', ['clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas]);
    }

    public function putBloquearAltas(ProTeam $proTeam)
    {
        if (Auth::user()->user_name == "Administrador22") {

            $EquiposAll = ProTeam::all();
            foreach ($EquiposAll as $proTeam) {
                $proTeam->lockInscriptions();
            }

            return redirect()->back()->with('message', 'Inscripciones bloqueadas');
        } else {
            return redirect()->back()->withErrors('El usuario no es el DT');
        }
    }

    public function putDesbloquearAltas(ProTeam $proTeam)
    {
        if (Auth::user()->user_name == "Administrador22") {
            $ProteamAll = ProTeam::all();
            foreach ($ProteamAll as $proTeam) {
                $proTeam->unlockInscriptions();
            }
            return redirect()->back()->with('message', 'Inscripciones desbloqueadas');
        } else {
            return redirect()->back()->withErrors('El usuario no es el DT');
        }
    }

    public function editarMarcador($id)
    {


        $partido = ProMatch::find($id);


        $partido->local_score = $marcadorLocal;
        $partido->visitor_score = $marcadorVisitante;
        $partido->update();
        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $clubes = ProTeam::all();


        return view('clubes-pro.clubes-pro', ['ligas' => $ligas, 'copas' => $copas, 'clubes' => $clubes]);
    }

    public function EscogerLigaPro()
    {

        $LigaInput = Input::get('leagueSelect');
        $ligaPro = ProLeague::find($LigaInput);
        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $Bandera = 1;


        return view('AlterarDatosLigaPro', ['copas' => $copas, 'ligas' => $ligas, 'ligaPro' => $ligaPro, 'Bandera' => $Bandera]);
    }

    public function BuscarDatosClub()
    {


        $InputSelect = Input::get('clubSelect');
        $InputLeague = Input::get('InputIdLeague');

        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $ClubPro = ProTeam::find($InputSelect);
        $ligaPro = ProLeague::find($InputLeague);

        $Estadisticas = $ClubPro->proLeagueEstatistics;


        $JJ = $Estadisticas[0]->pivot->JJ;
        $JG = $Estadisticas[0]->pivot->JG;
        $JE = $Estadisticas[0]->pivot->JE;
        $JP = $Estadisticas[0]->pivot->JP;
        $points = $Estadisticas[0]->pivot->points;
        $GF = $Estadisticas[0]->pivot->GF;
        $GC = $Estadisticas[0]->pivot->GC;
        $Bandera = 2;


        return view('AlterarDatosLigaPro', ['copas' => $copas,
            'ligas' => $ligas,
            'ligaPro' => $ligaPro,
            'JJ' => $JJ,
            'JP' => $JP,
            'JG' => $JG,
            'JE' => $JE,
            'GF' => $GF,
            'GC' => $GC,
            'ClubPro' => $ClubPro,
            'points' => $points,
            'Bandera' => $Bandera]);
    }

    public function ModificarDatosLigaPro()
    {

        $InputLeague = Input::get('InputIdLeague');

        $InputJJ = Input::get('InputJJ');
        $InputJG = Input::get('InputJG');
        $InputJE = Input::get('InputJE');
        $InputJP = Input::get('InputJP');
        $InputGF = Input::get('InputGF');
        $InputGC = Input::get('InputGC');
        $InputPuntos = Input::get('InputPuntos');
        $InputClub = Input::get('InputIdClub');


        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $clubes = ProTeam::all();
        $equipo = ProTeam::find($InputClub);

        $Estadisticas = $equipo->proLeagueEstatistics;
        $League = ProLeague::find($InputLeague);


        $JJ = $Estadisticas[0]->pivot->JJ + $InputJJ;

        $JG = $Estadisticas[0]->pivot->JG + $InputJG;
        $JE = $Estadisticas[0]->pivot->JE + $InputJE;
        $JP = $Estadisticas[0]->pivot->JP + $InputJP;
        $points = $Estadisticas[0]->pivot->points + $InputPuntos;
        $GF = $Estadisticas[0]->pivot->GF + $InputGF;
        $GC = $Estadisticas[0]->pivot->GC + $InputGC;


        $equipo->proLeagueEstatistics()->updateExistingPivot($League->id, ['JJ' => $JJ,
            'JG' => $JG,
            'JE' => $JE,
            'JP' => $JP,
            'GF' => $GF,
            'GC' => $GC,
            'points' => $points]);

        $equipo->update();

        $ligaPro = $League;
        $Bandera = 1;

        return view('AlterarDatosLigaPro', ['copas' => $copas, 'ligas' => $ligas, 'ligaPro' => $ligaPro, 'Bandera' => $Bandera])->withErrors("Se han cambiado las estadísticas del equipo");
    }

    public function ObtenerGoleadoresLigaPro($id)
    {

        $League = ProLeague::find($id);


        $usuariosLiga = $League::with('proTeams.users')->get();


        $usuariosLiga2 = $League::with(['proTeams.users' => function ($query) {
            $query->orderBy('goals', 'desc');
        }])->get();


        foreach ($usuariosLiga2 as $usuariosLiga) {
            $usuariosLiga3 = $usuariosLiga->proTeams;

            foreach ($usuariosLiga3 as $clubes) {
                $usuariosLiga4 = $clubes->users;
                
                $FiltroLiga = $clubes->proLeague;
                foreach ($FiltroLiga as $LigaFiltro) {
                            
                    if ($LigaFiltro->id == $League->id)
                        foreach ($usuariosLiga4 as $usuariosLig) {
                            $usuariosLiga5[] = $usuariosLig->id;                                                 
                        }
                }

            }
        }

        $USERSLeague = User::find($usuariosLiga5);
        $OrdenadoGoles = $USERSLeague->sortByDesc('goals')->take(10);

        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $UsuarioVal = 1;

        return view('EstadisticasLigaPro', [
            'usuariosLiga' => $usuariosLiga,
            'ligas' => $ligas,
            'League' => $League,
            'clubes' => $clubes,
            'UsuarioVal' => $UsuarioVal,
            'copas' => $copas,
            'OrdenadoGoles' => $OrdenadoGoles]);
    }


    public function ObtenerAsistentesLigaPro($id)
    {

        $League = ProLeague::find($id);

        $usuariosLiga = $League::with('proTeams.users')->get();

        $usuariosLiga2 = $League::with(['proTeams.users' => function ($query) {
            $query->orderBy('assistance', 'desc');
        }])->get();

        foreach ($usuariosLiga2 as $usuariosLiga) {
            $usuariosLiga3 = $usuariosLiga->proTeams;

            foreach ($usuariosLiga3 as $clubes) {
                $usuariosLiga4 = $clubes->users;

                $FiltroLiga = $clubes->proLeague;
                foreach ($FiltroLiga as $LigaFiltro) {
                    if ($LigaFiltro->id == $League->id)
                        foreach ($usuariosLiga4 as $usuariosLig) {
                            $usuariosLiga5[] = $usuariosLig->id;
                        }
                }

            }
        }

        $USERSLeague = User::find($usuariosLiga5);
        $OrdenadoAsistencias = $USERSLeague->sortByDesc('assistance')->take(10);

        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $UsuarioVal = 3;

        return view('EstadisticasLigaPro', [
            'usuariosLiga' => $usuariosLiga,
            'ligas' => $ligas,
            'League' => $League,
            'clubes' => $clubes,
            'UsuarioVal' => $UsuarioVal,
            'copas' => $copas,
            'OrdenadoAsistencias' => $OrdenadoAsistencias]);
    }


    public function ObtenerPorterosLigaPro($id)
    {

        $League = ProLeague::find($id);

        $usuariosLiga = $League::with('proTeams.users')->get();

        $usuariosLiga2 = $League::with(['proTeams.users' => function ($query) {
            $query->orderBy('gk_unbeaten', 'desc');
        }])->get();

        foreach ($usuariosLiga2 as $usuariosLiga) {
            $usuariosLiga3 = $usuariosLiga->proTeams;

            foreach ($usuariosLiga3 as $clubes) {
                $usuariosLiga4 = $clubes->users;

                $FiltroLiga = $clubes->proLeague;
                foreach ($FiltroLiga as $LigaFiltro) {
                    if ($LigaFiltro->id == $League->id)
                        foreach ($usuariosLiga4 as $usuariosLig) {
                            $usuariosLiga5[] = $usuariosLig->id;
                        }
                }

            }
        }

        $USERSLeague = User::find($usuariosLiga5);
        $OrdenadoPorteros = $USERSLeague->sortByDesc('gk_unbeaten')->take(10);

        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $UsuarioVal = 4;

        return view('EstadisticasLigaPro', [
            'usuariosLiga' => $usuariosLiga,
            'ligas' => $ligas,
            'League' => $League,
            'clubes' => $clubes,
            'UsuarioVal' => $UsuarioVal,
            'copas' => $copas,
            'OrdenadoPorteros' => $OrdenadoPorteros]);
    }


    public function ObtenerMejoresJugadoresLigaPro($id)
    {

        $League = ProLeague::find($id);

        $usuariosLiga = $League::with('proTeams.users')->get();

        $usuariosLiga2 = $League::with(['proTeams.users' => function ($query) {
            $query->orderBy('best_player', 'desc');
        }])->get();

        foreach ($usuariosLiga2 as $usuariosLiga) {
            $usuariosLiga3 = $usuariosLiga->proTeams;

            foreach ($usuariosLiga3 as $clubes) {
                $usuariosLiga4 = $clubes->users;

                $FiltroLiga = $clubes->proLeague;
                foreach ($FiltroLiga as $LigaFiltro) {
                    if ($LigaFiltro->id == $League->id)
                        foreach ($usuariosLiga4 as $usuariosLig) {
                            $usuariosLiga5[] = $usuariosLig->id;
                        }
                }

            }
        }

        $USERSLeague = User::find($usuariosLiga5);
        $OrdenadoMejoresJugadores = $USERSLeague->sortByDesc('best_player')->take(10);

        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $UsuarioVal = 5;

        return view('EstadisticasLigaPro', [
            'usuariosLiga' => $usuariosLiga,
            'ligas' => $ligas,
            'League' => $League,
            'clubes' => $clubes,
            'UsuarioVal' => $UsuarioVal,
            'copas' => $copas,
            'OrdenadoMejoresJugadores' => $OrdenadoMejoresJugadores]);
    }
    
        public function ObtenerDefensaImbatidaLigaPro($id)
    {

        $League = ProLeague::find($id);

        $usuariosLiga = $League::with('proTeams.users')->get();

        $usuariosLiga2 = $League::with(['proTeams.users' => function ($query) {
            $query->orderBy('defence_unbeaten', 'desc');
        }])->get();

        foreach ($usuariosLiga2 as $usuariosLiga) {
            $usuariosLiga3 = $usuariosLiga->proTeams;

            foreach ($usuariosLiga3 as $clubes) {
                $usuariosLiga4 = $clubes->users;

                $FiltroLiga = $clubes->proLeague;
                foreach ($FiltroLiga as $LigaFiltro) {
                    if ($LigaFiltro->id == $League->id)
                        foreach ($usuariosLiga4 as $usuariosLig) {
                            $usuariosLiga5[] = $usuariosLig->id;
                        }
                }

            }
        }

        $USERSLeague = User::find($usuariosLiga5);
        $OrdenadoDefensaImbatida = $USERSLeague->sortByDesc('defence_unbeaten')->take(10);

        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();
        $UsuarioVal = 6;

        return view('EstadisticasLigaPro', [
            'usuariosLiga' => $usuariosLiga,
            'ligas' => $ligas,
            'League' => $League,
            'clubes' => $clubes,
            'UsuarioVal' => $UsuarioVal,
            'copas' => $copas,
            'OrdenadoDefensaImbatida' => $OrdenadoDefensaImbatida]);
    }
    
    public function ganaLocal(ProTeam $local, ProTeam $visitor,ProLeague $league, LeagueProCalendar $calendar){
        
        $match= new ProMatch;
        $match->team_local_id = $local->id;
        $match->team_visitor_id = $visitor->id;
        $match->league_id = $league->id;
        $match->local_score = 2;
        $match->visitor_score = 0;
              
        $match->save();
        $calendar->match_id = $match->id;
        $calendar->update();     
        
        $local->JJ += 1;
        $local->JG += 1;
        $local->points += 3;
        $visitor->JJ += 1;
        $visitor->JP += 1;
        
        $estadisticas_local = $local->proLeagueEstatistics;
        $estadisticas_visitor = $visitor->proLeagueEstatistics;
        
        $jj_local = $estadisticas_local[0]->pivot->JJ;
        $jg_local=$estadisticas_local[0]->pivot->JG;
        $gf_local=$estadisticas_local[0]->pivot->GF;
        $points_local = $estadisticas_local[0]->pivot->points;
        
        $jj_local +=1;
        $jg_local +=1;
        $gf_local +=2;
        $points_local +=3;                
        
        $jj_visitor = $estadisticas_visitor[0]->pivot->JJ;
        $jp_visitor=$estadisticas_visitor[0]->pivot->JP;
        $gc_visitor=$estadisticas_visitor[0]->pivot->GC;
        
        $jj_visitor +=1;
        $jp_visitor +=1;
        $gc_visitor +=2;
            
            $local->proLeagueEstatistics()->updateExistingPivot($league->id, ['JJ' => $jj_local, 
                'JG' => $jg_local,
                'GF' => $gf_local,
                'points' => $points_local]);
            
             $visitor->proLeagueEstatistics()->updateExistingPivot($league->id, ['JJ' => $jj_visitor, 
                'JP' => $jp_visitor,                
                'GC' => $gc_visitor]);
     
        $local->update();
        $visitor->update();
    }
    
     public function ganaVisitante(ProTeam $local, ProTeam $visitor,ProLeague $league, LeagueProCalendar $calendar){
        
        $match= new ProMatch;
        $match->team_local_id = $local->id;
        $match->team_visitor_id = $visitor->id;
        $match->league_id = $league->id;
        $match->local_score = 0;
        $match->visitor_score = 2;
              
        $match->save();
        $calendar->match_id = $match->id;
        $calendar->update();     
        
        $visitor->JJ += 1;
        $visitor->JG += 1;
        $visitor->points += 3;
        
        $local->JJ += 1;
        $local->JP += 1;
        
        $estadisticas_local = $local->proLeagueEstatistics;
        $estadisticas_visitor = $visitor->proLeagueEstatistics;
        
        $jj_visitor = $estadisticas_visitor[0]->pivot->JJ;
        $jg_visitor=$estadisticas_visitor[0]->pivot->JG;
        $gf_visitor=$estadisticas_visitor[0]->pivot->GF;
        $points_visitor = $estadisticas_visitor[0]->pivot->points;
        
        $jj_visitor +=1;
        $jg_visitor +=1;
        $gf_visitor +=2;
        $points_visitor +=3;                
        
        $jj_local = $estadisticas_local[0]->pivot->JJ;
        $jp_local=$estadisticas_local[0]->pivot->JP;
        $gc_local=$estadisticas_local[0]->pivot->GC;
        
        $jj_local +=1;
        $jp_local +=1;
        $gc_local +=2;
            
            $visitor->proLeagueEstatistics()->updateExistingPivot($league->id, ['JJ' => $jj_visitor, 
                'JG' => $jg_visitor,
                'GF' => $gf_visitor,
                'points' => $points_visitor]);
            
            $local->proLeagueEstatistics()->updateExistingPivot($league->id, ['JJ' => $jj_local, 
                'JP' => $jp_local,                
                'GC' => $gc_local]);
     
        $visitor->update();
        $local->update();
    }

    public function borrarNoticias()
    {
        $noticias=News::all();
        foreach($noticias as $noticia){
            $noticia->delete();
        }

        return view('Reglamento')->withErrors("Noticias borradas correctamente");
    }

}
