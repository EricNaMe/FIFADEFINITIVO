<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProTeam;
use App\Team;
use App\Cup;
use App\User;
use App\clubesproequipo;
use Input;
use App\ProLeague;
use App\ProCup;
use App\League;
use DB;
use Illuminate\Support\Facades\Auth;
use Log;

class TorneoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    public function round_robin_array($array) {
        // we always keep index 0
        $top = array_shift($array);
        $last = array_pop($array);
        $rotate = [$last];
        foreach ($array as $_value) {
            $rotate[] = $_value;
        }
        array_unshift($rotate, $top);
        return $rotate;
    }

    /**
     * Runs a round robin to make a schedule.
     */
    public function RoundRobin() {

        $teams[] = "Pedro";
        $teams[] = "Alejandro";
        $teams[] = "Esqueda";
        $teams[] = "Edgar";

        if (count($teams) % 2 != 0) {
            array_push($teams, "bye");
        }
        $away = array_splice($teams, (count($teams) / 2));
        $home = $teams;
        for ($i = 0; $i < count($home) + count($away) - 1; $i++) {
            for ($j = 0; $j < count($home); $j++) {
                $round[$i][$j]["Home"] = $home[$j];
                $round[$i][$j]["Away"] = $away[$j];
            }
            if (count($home) + count($away) - 1 > 2) {
                $s = array_splice($home, 1, 1);
                $slice = array_shift($s);
                array_unshift($away, $slice);
                array_push($home, array_pop($away));
            }
        }
        return $round;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    public function CrearLigaPro() {
        if (Auth::check()) { // este si lo he probado
            $clubes = Proteam::all();
            $league = new ProLeague;
            $ligas = ProLeague::all();
            $copas = ProCup::all();

            $league->name = Input::get('name');


            if ($league->save()) {
                return view('/AgregarClubProLiga', ['league' => $league, 'clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas]);
            } else {
                return redirect()->back()->withErrors("Algo falló!!!");
            }
        }
    }

    public function ModificarLigaPro() {
        if (Auth::check()) {


            $idLiga = Input::get('leagueSelect');
            $clubes = ProTeam::All();
            $league = ProLeague::find($idLiga);
            $copas = ProCup::All();
            $ligas = ProLeague::all();


            return view('/AgregarClubProLiga', ['league' => $league, 'ligas' => $ligas, 'clubes' => $clubes, 'copas' => $copas]);
        }
    }

    public function BorrarLigaPro() {
        if (Auth::check()) {

            $LeagueInput = Input::get('InputIdLeague');
            $LigaEliminar = ProLeague::find($LeagueInput);
            if ($LigaEliminar->delete())
                $clubes = ProTeam::All();

            $copas = ProCup::All();
            $ligas = ProLeague::all();


            return view('clubes-pro.clubes-pro', [ 'ligas' => $ligas, 'clubes' => $clubes, 'copas' => $copas]);
        }
        else {
            $comment = Comment::all();
            $users = User::all();
            return view('index', ['users' => $users, 'comment' => $comment])->withErrors("Error al eliminar la liga");
        }
    }

    public function ModificarCopaPro() {
        if (Auth::check()) {


            $idLiga = Input::get('leagueSelect');
            $clubes = ProTeam::All();
            $copa = ProCup::find($idLiga);
            $copas = ProCup::all();
            $ligas = ProLeague::all();


            return view('/AgregarClubProCopa', ['copa' => $copa, 'clubes' => $clubes, 'copas' => $copas, 'ligas' => $ligas]);
        }
    }

    public function AgregarProClubLiga() {


        $clubSelect = Input::get('clubSelect');
        $LeagueInput = Input::get('InputIdLeague');
        $proTeam = ProTeam::find($clubSelect);
        $league = ProLeague::find($LeagueInput);
        $clubes = ProTeam::All();
        $ligas = ProLeague::All();
        $copas = ProCup::All();



        foreach ($ligas as $liga) {

            foreach ($liga->proTeams as $Ligaa) {

                if ($proTeam->id == $Ligaa->id) {
                    return view('ModificarLigaPro', ['ligas' => $ligas, 'clubes' => $clubes, 'copas' => $copas])->withErrors("El equipo ya está en otra liga");
                }
            }
        }



        $proTeam->proLeague()->attach($LeagueInput, ['status' => 'acepted']);

        if ($proTeam->save()) {
            return view('AgregarClubProLiga', ['proTeam' => $proTeam, 'copas' => $copas, 'ligas' => $ligas, 'league' => $league, 'clubes' => $clubes]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function ReportarPartidoPvsPMetodo($id, $id2, $id3, $id4) {
        $Equipo1 = Team::find($id);
        $Equipo2 = Team::find($id2);
        $league = League::find($id3);
        $calendario = CalendarLeague::find($id4);




        return view('ReportarPardido', ['Equipo1' => $Equipo1, 'Equipo2' => $Equipo2, 'league' => $league, 'calendario' => $calendario]);
    }

    public function BorrarProClubLiga() {


        $clubSelect = Input::get('InputIdClub');
        $clubSelectTodos = Input::get('Equipos');

        $ligas = ProLeague::All();
        $LeagueInput = Input::get('InputIdLeague');
        $proTeam = ProTeam::find($clubSelect);
        $league = ProLeague::find($LeagueInput);
        $clubes = ProTeam::All();
        $copas = Procup::All();
        $league->proTeams()->detach($clubSelect, []);

        if ($proTeam->save()) {
            return view('AgregarClubProLiga', ['proTeam' => $proTeam, 'copas' => $copas, 'ligas' => $ligas, 'league' => $league, 'clubes' => $clubes]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }


    public function BorrarTodosProClubLiga() {


        $clubSelect = Input::get('InputIdClub');
        $ligas = ProLeague::All();
        $LeagueInput = Input::get('InputIdLeague');
        $proTeam = ProTeam::find($clubSelect);
        $league = ProLeague::find($LeagueInput);
        $clubes = ProTeam::All();
        $copas = Procup::All();
        $league->proTeams()->detach($clubSelect, []);

        if ($proTeam->save()) {
            return view('AgregarClubProLiga', ['proTeam' => $proTeam, 'copas' => $copas, 'ligas' => $ligas, 'league' => $league, 'clubes' => $clubes]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function BorrarProClubCopa() {


        $clubSelect = Input::get('InputIdClub');
        $copas = Procup::All();
        $CopaInput = Input::get('InputIdLeague');
        $ligas = ProLeague::All();
        $proTeam = ProTeam::find($clubSelect);
        $copa = ProCup::find($CopaInput);
        $clubes = ProTeam::All();
        $copa->proTeams()->detach($clubSelect, []);

        if ($proTeam->save()) {
            return view('AgregarClubProCopa', ['proTeam' => $proTeam, 'copas' => $copas, 'ligas' => $ligas, 'copa' => $copa, 'clubes' => $clubes]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function AgregarProClubCopa() {

        $CopaInput = Input::get('InputIdLeague');
        $clubSelect = Input::get('clubSelect');
        $LeagueInput = Input::get('InputIdLeague');
        $proTeam = ProTeam::find($clubSelect);
        $league = ProCup::find($LeagueInput);
        $ligas = ProLeague::all();
        $copa = ProCup::find($CopaInput);
        $copas = ProCup::all();
        $clubes = ProTeam::All();
        $proTeam->proCup()->attach($LeagueInput, ['status' => 'accepted']);

        if ($proTeam->save()) {
            return view('AgregarClubProCopa', ['proTeam' => $proTeam, 'copa' => $copa, 'league' => $league, 'clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function EncontrarLiga($id) {
        $ligas = ProLeague::All();
        /** @var ProLeague $league */
        $league = ProLeague::find($id);
        $proTeams = $league->proTeams()
            ->select([
                '*',
                DB::raw('cast(pro_league_pro_team.GF as int)-cast(pro_league_pro_team.GC as int)
                AS DG')
            ])
            ->withPivot(ProTeam::$proLeaguePivotData)
            ->orderBy('pro_league_pro_team.points', 'desc')
            ->orderBy('DG','desc')->get();



 /*       $clubname= DB::table('pro_league_pro_team')->select('pro_team_id')->where('pro_league_id', $id)
            ->orderBy('points', 'desc')->get();
        $ligapivote = DB::table('pro_league_pro_team')
            ->select([
                '*',
                DB::raw('cast(GF as int)-cast(GC as int) AS DG')
            ])
            ->where('pro_league_id', $id)
            ->orderBy('points', 'desc')
            ->orderBy('DG','desc')->get();
Log::info($ligapivote); */

        $copas = Procup::All();
        return view('/LigaPro', [
            'league' => $league,
            'ligas' => $ligas,
            'copas' => $copas,
        
            'proTeams' => $proTeams,
        ]);
    }

    public function EncontrarCalendario(ProLeague $proLeague) {
        $ligas = ProLeague::all();
        $copas = ProCup::all();

        $LigaObj=ProLeague::find($proLeague->id);
        $proCalendar = $proLeague->proCalendar;


        if (Auth::check()) {

            if (Auth::user()->proTeams->isEmpty()) {
                $DTAuth = "UsuarioSinEquipo";
                $DTAuth2="UsuarioSinEquipo";

                return view('ProCalendario', ['proCalendar' => $proCalendar,'LigaObj'=>$LigaObj, 'ligas' => $ligas, 'copas' => $copas, 'DTAuth' => $DTAuth]);
            } else {

                $Equipoid = Auth::user()->proTeams[0]->id;

                $EquipoAuth = ProTeam::find($Equipoid);
                $DTAuth = $EquipoAuth->getDT();
                $DTAuth2 = $EquipoAuth->getDT2();

                return view('ProCalendario', ['proCalendar' => $proCalendar,
                    'LigaObj'=>$LigaObj,
                    'ligas' => $ligas, 
                    'copas' => $copas,
                    'DTAuth' => $DTAuth,
                    'DTAuth2'=> $DTAuth2]);
            }
        } else {
            $DTAuth = "UsuarioSinEquipo";
            $DTAuth2="UsuarioSinEquipo";
            return view('ProCalendario', ['proCalendar' => $proCalendar,
                'LigaObj'=>$LigaObj, 
                'ligas' => $ligas, 
                'copas' => $copas, 
                'DTAuth' => $DTAuth, 
                'DTAuth2'=> $DTAuth2]);
        }
    }

    public function buscarCalendario(League $League) {


        $calendario = $League->Calendar;
        return view('PvsPCalendario', ['calendario' => $calendario]);
    }

    public function EncontrarCopa($id) {
        $copas = ProCup::All();
        $ligas = ProLeague::All();
        $copa = ProCup::find($id);
        $teams = Team::all();
        return view('/CopaPro', ['copa' => $copa, 'copas' => $copas, 'ligas' => $ligas]);
    }

    public function CrearCalendarioPro() {
        $liga = Input::get('InputIdLeague');
        $league = ProLeague::find($liga);
        $copas = ProCup::All();
        $ligas = ProLeague::All();
        $clubes = ProTeam::all();

        if ($league->generateAndSaveCalendar()) {
            return view('clubes-pro.clubes-pro', ['clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas]);
        } else {
            return view('clubes-pro.clubes-pro', ['clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas])->withErrors("Ya se creó un torneo anteriormente");
        }
    }

    public function crearCalendario() {

        $liga = Input::get('InputIdLeague');
        $league = League::find($liga);
        $ligas = League::All();
        $copas = Cup::All();
        $teams = Team::all();



        if ($league->generateAndSaveCalendar()) {
            return view('PVSP', ['teams' => $teams, 'ligas' => $ligas, 'copas' => $copas]);
        } else {
            return "Error al crear calendario";
        }
    }

    public function CrearCopaPro() {
        if (Auth::check()) { // este si lo he probado
            //$user=User::find($id); // error! si haces esto de que te sirve que el usuario esté logueado, nunca compruebas que sea el usuario logueado alque estas modificando, si tu usuario ya esta loggeado ya tienes su instancia
            $copa = new ProCup;

            $clubes = Proteam::all();
            $ligas = ProLeague::all();
            $copas = ProCup::all();
            $copa->name = Input::get('name');


            //    $league->users()->attach(Auth::user()->id,['status'=>'Accepted','position' => 'DT']);



            if ($copa->save()) {
                return view('/AgregarClubProCopa', ['copa' => $copa, 'clubes' => $clubes, 'ligas' => $ligas, 'copas' => $copas]);
            } else {
                return redirect()->back()->withErrors("Algo falló!!!");
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}