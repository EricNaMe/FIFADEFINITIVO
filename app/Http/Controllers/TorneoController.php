<?php

namespace App\Http\Controllers;

use App\EditarJornada;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProTeam;
use App\Team;
use App\Comment;
use App\Cup;
use App\CalendarLeague;
use App\User;
use App\clubesproequipo;
use Input;
use App\ProLeague;
use App\ProCup;
use App\League;
use App\WeekUser;
use DB;
use Carbon\Carbon;
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

            foreach ($liga->proTeams as $equipos) {

                if ($proTeam->id == $equipos->id) {
                    return view('ModificarLigaPro', ['ligas' => $ligas, 'clubes' => $clubes, 'copas' => $copas])->withErrors("El equipo ya está en otra liga");
                }
            }
        }

        foreach($proTeam->users as $usuarios) {



            $usuarios->proLeagues()->attach($league->id, ['status' => 'accepted',
                'JJ' => 0,
                'JG' => 0,
                'JE' => 0,
                'JP' => 0,
                'GF' => 0,
                'GC' => 0
            ]);
        }



        $proTeam->proLeague()->attach($LeagueInput, ['status' => 'acepted']);




        if ($proTeam->save()) {
            return view('AgregarClubProLiga', ['proTeam' => $proTeam, 'copas' => $copas, 'ligas' => $ligas, 'league' => $league, 'clubes' => $clubes]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function ReportarPartidoPvsPMetodo($id, $id2, $id3, $id4) {
        $EquipoLocal = Team::find($id);
        $EquipoVisitante = Team::find($id2);
        $league = League::find($id3);
        $ligas=League::all();
        $copas=Cup::all();
        $calendario = CalendarLeague::find($id4);

        return view('ReportarPardido', ['EquipoLocal' => $EquipoLocal,'copas'=>$copas,'ligas'=>$ligas, 'EquipoVisitante' => $EquipoVisitante, 'league' => $league, 'calendario' => $calendario]);
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
        $jornada=EditarJornada::find(1);
        $LigaObj=ProLeague::find($proLeague->id);
        $proCalendar = $proLeague->proCalendar;


        if (Auth::check()) {

            if (Auth::user()->proTeams->isEmpty()) {
                $DTAuth = "UsuarioSinEquipo";
                $DTAuth2="NoMuestres";

                return view('ProCalendario', ['proCalendar' => $proCalendar,
                    'LigaObj'=> $LigaObj,
                    'ligas' => $ligas,
                    'copas' => $copas,
                    'DTAuth' => $DTAuth,
                    'jornada'=>$jornada,
                    'DTAuth2'=> $DTAuth2]);
            } else {

                $Equipoid = Auth::user()->proTeams[0]->id;

                $EquipoAuth = ProTeam::find($Equipoid);
                $DTAuth = $EquipoAuth->getDT();

                if($DTAuth2=$EquipoAuth->getDT2()){


                    return view('ProCalendario', ['proCalendar' => $proCalendar,
                        'LigaObj'=>$LigaObj,
                        'ligas' => $ligas,
                        'copas' => $copas,
                        'DTAuth' => $DTAuth,
                        'jornada'=>$jornada,
                        'DTAuth2'=> $DTAuth2]);
                }
                else{
                    $DTAuth2="NoMuestres";

                    return view('ProCalendario', ['proCalendar' => $proCalendar,
                        'LigaObj'=>$LigaObj,
                        'ligas' => $ligas,
                        'copas' => $copas,
                        'DTAuth' => $DTAuth,
                        'jornada'=>$jornada,
                        'DTAuth2'=> $DTAuth2]);
                }
            }
        } else {
            $DTAuth = "UsuarioSinEquipo";
            $DTAuth2="NoMuestres";
            return view('ProCalendario', ['proCalendar' => $proCalendar,
                'LigaObj'=>$LigaObj,
                'ligas' => $ligas,
                'copas' => $copas,
                'DTAuth' => $DTAuth,
                'jornada'=>$jornada,
                'DTAuth2'=> $DTAuth2]);
        }
    }

    public function buscarCalendario(League $League) {

        $calendario = $League->Calendar;
        $ligaCalendario=$League;

        return view('PvsPCalendario', ['calendario' => $calendario,'ligaCalendario'=>$ligaCalendario]);
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
            return view('PVSP', ['teams' => $teams, 'ligas' => $ligas, 'copas' => $copas])->withErrors("Ya se creó un torneo anteriormente");
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

    public function  PasarDatosATablaUserLeague()
    {

        $League = ProLeague::find(1);

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
                            $usuariosLig->proLeagues()->attach($League->id, ['status' => 'accepted',
                                'JJ'=>0,
                                'JG'=>0,
                                'JE'=>0,
                                'JP'=>0,
                                'GF'=>0,
                                'GC'=>0
                            ]);
                        }
                }

            }
        }

        return "Hecho";
    }

    public function GoleadoresLiga ($id){


        $League = ProLeague::find($id);
        $GoleadoresLiga = $League->usersStatistics()
            ->select([
                '*'
            ])
            ->withPivot('points')
            ->orderBy('pro_league_user.goals', 'desc')->get(10);

        //    return $EstadisticasUsuarios[0]->pivot->points;

        $UsuarioVal = 1;
        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = ProCup::all();

        return view('EstadisticasLigaPro', [
            'ligas' => $ligas,
            'League' => $League,
            'clubes' => $clubes,
            'UsuarioVal' => $UsuarioVal,
            'copas' => $copas,
            'GoleadoresLiga' => $GoleadoresLiga,
        ]);
    }

    public function AsistenciasLiga ($id){


        $League = ProLeague::find($id);
        $AsistenciasLiga = $League->usersStatistics()
            ->select([
                '*'
            ])
            ->withPivot('assistance')
            ->orderBy('pro_league_user.assistance', 'desc')->get(10);



        $UsuarioVal = 3;
        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = Procup::All();
        return view('EstadisticasLigaPro', [
            'ligas' => $ligas,
            'League' => $League,
            'clubes' => $clubes,
            'UsuarioVal' => $UsuarioVal,
            'copas' => $copas,
            'AsistenciasLiga' => $AsistenciasLiga,
        ]);
    }

    public function MejorJugadorLiga ($id){


        $League = ProLeague::find($id);
        $MejorJugadorOrdenado = $League->usersStatistics()
            ->select([
                '*'
            ])
            ->withPivot('best_player')
            ->orderBy('pro_league_user.best_player', 'desc')->get(10);


        $UsuarioVal = 5;
        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = Procup::All();
        return view('EstadisticasLigaPro', [
            'ligas' => $ligas,
            'League' => $League,
            'clubes' => $clubes,
            'UsuarioVal' => $UsuarioVal,
            'copas' => $copas,
            'MejorJugadorOrdenado' => $MejorJugadorOrdenado,
        ]);
    }

    public function PorteroImbatidoLiga ($id){



        $League = ProLeague::find($id);
        $PorterosImbatidos = $League->usersStatistics()
            ->select([
                '*'
            ])
            ->withPivot('gk_unbeaten')
            ->orderBy('pro_league_user.gk_unbeaten', 'desc')->get(10);


        $UsuarioVal = 4;
        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = Procup::All();
        return view('EstadisticasLigaPro', [
            'ligas' => $ligas,
            'League' => $League,
            'clubes' => $clubes,
            'UsuarioVal' => $UsuarioVal,
            'copas' => $copas,
            'PorterosImbatidos' => $PorterosImbatidos,
        ]);
    }

    public function DefensaImbatidaLiga ($id){


        $League = ProLeague::find($id);
        $DefensaImbatidaOrdenado = $League->usersStatistics()
            ->select([
                '*'
            ])
            ->withPivot('defence_unbeaten')
            ->orderBy('pro_league_user.defence_unbeaten', 'desc')->get(10);



        $UsuarioVal = 6;
        $clubes = Proteam::all();
        $ligas = ProLeague::all();
        $copas = Procup::All();

        return view('EstadisticasLigaPro', [
            'ligas' => $ligas,
            'League' => $League,
            'clubes' => $clubes,
            'UsuarioVal' => $UsuarioVal,
            'copas' => $copas,
            'DefensaImbatidaOrdenado' => $DefensaImbatidaOrdenado,
        ]);
    }

    public function MejorMediaSemana(ProLeague $league){
        // User::with(['proMatch'])


        $Fecha=Carbon::now();
        $Fecha=Carbon::parse()->addWeeks(-1);

        $users = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->where('pro_match_league.created_at','<=',Carbon::now())
            ->where('pro_match_league.created_at','>=',$Fecha)
            ->where('pro_match_league.league_id','=',$league->id)
            ->where('pro_user_match.position_id','>=',7)
            ->where('pro_user_match.position_id','<=',16)
            ->select('users.*',DB::raw('sum(pro_user_match.goals) as total_goals'))
            ->groupBy('users.id')
            ->orderBy('total_goals','desc')
            ->take(4)
            ->get();

        $WeekVerifica=new WeekUser;
        if($WeekVerifica->first()!=null) {
            $ultimoRegistro = DB::table('pro_user_week')->Orderby('week_id', 'desc')->first();

       //   $Todas=WeekUser::all()->where('week_id',$ultimoRegistro->week_id);

         //   return $Todas;


        }

        if($WeekVerifica->first()!=null){
            $ContadorUsuarios=0;
            foreach($users as $user){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$user->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="MEDIA";
                $WeekMedia->position_id=6;
                $WeekMedia->goals=$user->total_goals;

                $WeekMedia->week_id =$ultimoRegistro->week_id + 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }
        }


        if($WeekVerifica->first()==null){

            $ContadorUsuarios=0;
            foreach($users as $user){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$user->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="MEDIA";
                $WeekMedia->position_id=6;
                $WeekMedia->goals=$user->total_goals;
                $WeekMedia->week_id= 1;

                $ContadorUsuarios++;
                $WeekMedia->save();


            }
        }



        return $users;

        /*     select users.*, sum(pro_user_match.goals) total_goals from users join pro_user_match on users.id = pro_user_match.user_id
       join pro_match_league on pro_user_match.pro_match_id=pro_match_league.id
     WHERE pro_match_league.created_at > '2015-23-23' and

             GROUP BY users.id

     ORDER BY total_goals;

        }*/
    }


    public function MejorDelanteraSemana(ProLeague $league){

        $Fecha=Carbon::now();
        $Fecha=Carbon::parse()->addWeeks(-1);

        $users = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->where('pro_match_league.created_at','<=',Carbon::now())
            ->where('pro_match_league.created_at','>=',$Fecha)
            ->where('pro_match_league.league_id','=',$league->id)
            ->where('pro_user_match.position_id','>=',17)
            ->where('pro_user_match.position_id','<=',21)
            ->select('users.*',DB::raw('sum(pro_user_match.goals) as total_goals'))
            ->groupBy('users.id')
            ->orderBy('total_goals','desc')
            ->take(2)
            ->get();

        $WeekVerifica=new WeekUser;
        if($WeekVerifica->first()!=null) {
            $ultimoRegistro = DB::table('pro_user_week')->Orderby('week_id', 'desc')->first();

        }

        if($WeekVerifica->first()!=null){
            $ContadorUsuarios=0;
            foreach($users as $user){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$user->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="DELANTERA";
                $WeekMedia->position_id=17;
                $WeekMedia->goals=$user->total_goals;

                $WeekMedia->week_id =$ultimoRegistro->week_id + 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }
        }


        if($WeekVerifica->first()==null){

            $ContadorUsuarios=0;
            foreach($users as $user){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$user->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="DELANTERA";
                $WeekMedia->position_id=6;
                $WeekMedia->goals=$user->total_goals;
                $WeekMedia->week_id= 1;

                $ContadorUsuarios++;
                $WeekMedia->save();


            }
        }

        return $users;
    }

    public function MejorDefensaSemana(ProLeague $league){

        $Fecha=Carbon::now();
        $Fecha=Carbon::parse()->addWeeks(-1);

        $users = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->where('pro_match_league.created_at','<=',Carbon::now())
            ->where('pro_match_league.created_at','>=',$Fecha)
            ->where('pro_match_league.league_id','=',$league->id)
            ->where('pro_user_match.position_id','>=',2)
            ->where('pro_user_match.position_id','<=',6)
            ->select('users.*',DB::raw('sum(pro_user_match.defence_unbeaten) as total_defence'))
            ->groupBy('users.id')
            ->orderBy('total_defence','desc')
            ->take(4)
            ->get();

        $WeekVerifica=new WeekUser;
        if($WeekVerifica->first()!=null) {
            $ultimoRegistro = DB::table('pro_user_week')->Orderby('week_id', 'desc')->first();

        }

        if($WeekVerifica->first()!=null){
            $ContadorUsuarios=0;
            foreach($users as $user){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$user->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="DEFENSA";
                $WeekMedia->position_id=17;
                $WeekMedia->goals=$user->total_defence;

                $WeekMedia->week_id =$ultimoRegistro->week_id + 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }
        }


        if($WeekVerifica->first()==null){

            $ContadorUsuarios=0;
            foreach($users as $user){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$user->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="DEFENSA";
                $WeekMedia->position_id=2;
                $WeekMedia->goals=$user->total_defence;
                $WeekMedia->week_id= 1;

                $ContadorUsuarios++;
                $WeekMedia->save();


            }
        }

        return $users;
    }

    public function MejorPorteroSemana(ProLeague $league){

        $Fecha=Carbon::now();
        $Fecha=Carbon::parse()->addWeeks(-1);

        $users = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->where('pro_match_league.created_at','<=',Carbon::now())
            ->where('pro_match_league.created_at','>=',$Fecha)
            ->where('pro_match_league.league_id','=',$league->id)
            ->where('pro_user_match.position_id','=',1)
            ->select('users.*',DB::raw('sum(pro_user_match.goalkeeper_unbeaten) as total_goalkeeper'))
            ->groupBy('users.id')
            ->orderBy('total_goalkeeper','desc')
            ->take(1)
            ->get();

        $WeekVerifica=new WeekUser;
        if($WeekVerifica->first()!=null) {
            $ultimoRegistro = DB::table('pro_user_week')->Orderby('week_id', 'desc')->first();

        }

        if($WeekVerifica->first()!=null){
            $ContadorUsuarios=0;
            foreach($users as $user){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$user->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="PORTERO";
                $WeekMedia->position_id=1;
                $WeekMedia->goals=$user->total_goalkeeper;

                $WeekMedia->week_id =$ultimoRegistro->week_id + 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }
        }


        if($WeekVerifica->first()==null){

            $ContadorUsuarios=0;
            foreach($users as $user){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$user->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="PORTERO";
                $WeekMedia->position_id=1;
                $WeekMedia->goals=$user->total_goalkeeper;
                $WeekMedia->week_id= 1;

                $ContadorUsuarios++;
                $WeekMedia->save();


            }
        }

        return $users;
    }

    public function crearEquipoSemana(ProLeague $league)
    {

        $Fecha=Carbon::now();
        $Fecha=Carbon::parse()->addWeeks(-1);

        $porteros = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->where('pro_match_league.created_at','<=',Carbon::now())
            ->where('pro_match_league.created_at','>=',$Fecha)
            ->where('pro_match_league.league_id','=',$league->id)
            ->where('pro_user_match.position_id','=',1)
            ->select('users.*',DB::raw('sum(pro_user_match.goalkeeper_unbeaten) as total_goalkeeper'))
            ->groupBy('users.id')
            ->orderBy('total_goalkeeper','desc')
            ->take(1)
            ->get();

        $defensas = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->where('pro_match_league.created_at','<=',Carbon::now())
            ->where('pro_match_league.created_at','>=',$Fecha)
            ->where('pro_match_league.league_id','=',$league->id)
            ->where('pro_user_match.position_id','>=',2)
            ->where('pro_user_match.position_id','<=',6)
            ->select('users.*',DB::raw('sum(pro_user_match.defence_unbeaten) as total_defence'))
            ->groupBy('users.id')
            ->orderBy('total_defence','desc')
            ->take(4)
            ->get();

        $delanteros = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->where('pro_match_league.created_at','<=',Carbon::now())
            ->where('pro_match_league.created_at','>=',$Fecha)
            ->where('pro_match_league.league_id','=',$league->id)
            ->where('pro_user_match.position_id','>=',17)
            ->where('pro_user_match.position_id','<=',21)
            ->select('users.*',DB::raw('sum(pro_user_match.goals) as total_goals'))
            ->groupBy('users.id')
            ->orderBy('total_goals','desc')
            ->take(2)
            ->get();

        $medios = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->where('pro_match_league.created_at','<=',Carbon::now())
            ->where('pro_match_league.created_at','>=',$Fecha)
            ->where('pro_match_league.league_id','=',$league->id)
            ->where('pro_user_match.position_id','>=',7)
            ->where('pro_user_match.position_id','<=',16)
            ->select('users.*',DB::raw('sum(pro_user_match.goals) as total_goals'))
            ->groupBy('users.id')
            ->orderBy('total_goals','desc')
            ->take(4)
            ->get();


        $WeekVerifica=new WeekUser;
        if($WeekVerifica->first()!=null) {
            $ultimoRegistro = DB::table('pro_user_week')->Orderby('week_id', 'desc')->first();

        }

        if($WeekVerifica->first()!=null){
            $ContadorUsuarios=0;
            foreach($porteros as $portero){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$portero->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="PORTERO";
                $WeekMedia->position_id=1;
                $WeekMedia->gk_unbeaten=$portero->total_goalkeeper;

                $WeekMedia->week_id =$ultimoRegistro->week_id + 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($defensas as $defensa){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$defensa->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="DEFENSA";
                $WeekMedia->position_id=2;
                $WeekMedia->defence_unbeaten=$defensa->total_defence;

                $WeekMedia->week_id =$ultimoRegistro->week_id + 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($medios as $medio){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$medio->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="MEDIO";
                $WeekMedia->position_id=7;
                $WeekMedia->goals=$medio->total_goals;

                $WeekMedia->week_id =$ultimoRegistro->week_id + 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($delanteros as $delantero){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$delantero->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="DELANTERO";
                $WeekMedia->position_id=20;
                $WeekMedia->goals=$delantero->total_goals;

                $WeekMedia->week_id =$ultimoRegistro->week_id + 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }




        }


        if($WeekVerifica->first()==null){

            $ContadorUsuarios=0;
            foreach($porteros as $portero){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$portero->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="PORTERO";
                $WeekMedia->position_id=1;
                $WeekMedia->gk_unbeaten=$portero->total_goalkeeper;

                $WeekMedia->week_id = 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($defensas as $defensa){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$defensa->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="DEFENSA";
                $WeekMedia->position_id=2;
                $WeekMedia->defence_unbeaten=$defensa->total_defence;

                $WeekMedia->week_id = 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($medios as $medio){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$medio->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="MEDIO";
                $WeekMedia->position_id=7;
                $WeekMedia->goals=$medio->total_goals;

                $WeekMedia->week_id = 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($delanteros as $delantero){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$delantero->id;
                $WeekMedia->league_id=$league->id;
                $WeekMedia->position="DELANTERO";
                $WeekMedia->position_id=20;
                $WeekMedia->goals=$delantero->total_goals;

                $WeekMedia->week_id = 1;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }


        }

        $comment=Comment::all();
        $users=User::all();
        return view('/index',['comment' => $comment,'users'=>$users])->withErrors('Se ha creado el equipo de la semana');
    }
    
    public function equipoRangoJornadas(ProLeague $league){
        
        $primer_jornada=(int)Input::get('JornadaInput1');
        $segunda_jornada=(int)Input::get('JornadaInput2');
        
         
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        
        $portero=DB::table('users')
                ->join('pro_user_match','users.id','=','pro_user_match.user_id')
                ->join('pro_match_league','pro_user_match.pro_match_id','=','pro_match_league.id')
                ->join('league_pro_calendars','pro_match_league.id','=','league_pro_calendars.match_id')
                ->where('league_pro_calendars.pro_league_id','=',$league->id)
                ->where('league_pro_calendars.jornada','>=',$primer_jornada)
                ->where('league_pro_calendars.jornada','<=',$segunda_jornada)
                ->where('pro_match_league.league_id','=',$league->id)
                ->where('pro_user_match.position_id','=',1)
                ->select('users.*',DB::raw('sum(pro_user_match.goalkeeper_unbeaten) as total_goalkeeper'))
                ->groupBy('users.id')
                ->orderBy('total_goalkeeper','desc')
                ->take(1)
                ->get();

        
        
        
           $defensas = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->join('league_pro_calendars', 'pro_match_league.id', '=', 'league_pro_calendars.match_id')
            ->where('league_pro_calendars.pro_league_id','=',$league->id)
            ->where('league_pro_calendars.jornada','>=',$primer_jornada)
            ->where('league_pro_calendars.jornada','<=',$segunda_jornada)
            ->where('pro_match_league.league_id','=',$league->id)
            ->where('pro_user_match.position_id','>=',2)
            ->where('pro_user_match.position_id','<=',6)
            ->select('users.*',DB::raw('sum(pro_user_match.defence_unbeaten) as total_defence'))
            ->groupBy('users.id')
            ->orderBy('total_defence','desc')
            ->take(4)
            ->get();


           
          
           
             $medios = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->join('league_pro_calendars', 'pro_match_league.id', '=', 'league_pro_calendars.match_id')
            ->where('league_pro_calendars.pro_league_id','=',$league->id)
            ->where('league_pro_calendars.jornada','>=',$primer_jornada)
            ->where('league_pro_calendars.jornada','<=',$segunda_jornada)
            ->where('league_pro_calendars.pro_league_id','=',$league->id)
            ->where('pro_user_match.position_id','>=',7)
            ->where('pro_user_match.position_id','<=',16)
            ->select('users.*',DB::raw('sum(pro_user_match.goals) as total_goals'))
            ->groupBy('users.id')
            ->orderBy('total_goals','desc')
            ->take(4)
            ->get();
             
             
             
           
        
        $delanteros = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->join('league_pro_calendars', 'pro_match_league.id', '=', 'league_pro_calendars.match_id')
            ->where('league_pro_calendars.pro_league_id','=',$league->id)
            ->where('league_pro_calendars.jornada','>=',$primer_jornada)
            ->where('league_pro_calendars.jornada','<=',$segunda_jornada)
            ->where('pro_match_league.league_id','=',$league->id)
            ->where('pro_user_match.position_id','>=',17)
            ->where('pro_user_match.position_id','<=',21)
            ->select('users.*',DB::raw('sum(pro_user_match.goals) as total_goals'))
            ->groupBy('users.id')
            ->orderBy('total_goals','desc')
            ->take(2)
            ->get();
        
        
        
        $BanderaEquipoSemana=2;
        
        return view ('Equipo_CP',['clubes' => $clubes,
            'delanteros'=>$delanteros,
            'medios'=>$medios,
            'defensas'=>$defensas,
            'BanderaEquipoSemana'=>$BanderaEquipoSemana,
            'portero'=>$portero,
            'ligas'=>$ligas,
            'copas'=>$copas,
            'league'=>$league]);              
        
    }
    
    
    public function crearEquipoSemanaJornada(ProLeague $ProLeague)
    {
              
        $ultima_jornada = DB::table('league_pro_calendars')
                ->where('pro_league_id','=',$ProLeague->id)
                ->whereNotNull('match_id')
                ->Orderby('jornada', 'desc')
                ->first();
        
       

        $porteros = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->join('league_pro_calendars', 'pro_match_league.id', '=', 'league_pro_calendars.match_id')
            ->where('league_pro_calendars.pro_league_id','=',$ProLeague->id)
            ->where('league_pro_calendars.jornada','=',$ultima_jornada->jornada)
            ->where('pro_match_league.league_id','=',$ProLeague->id)
            ->where('pro_user_match.position_id','=',1)
            ->select('users.*',DB::raw('sum(pro_user_match.goalkeeper_unbeaten) as total_goalkeeper'))
            ->groupBy('users.id')
            ->orderBy('total_goalkeeper','desc')
            ->take(1)
            ->get();
        
         return $porteros;

        $defensas = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->join('league_pro_calendars', 'pro_match_league.id', '=', 'league_pro_calendars.match_id')
            ->where('league_pro_calendars.pro_league_id','=',$ProLeague->id)
            ->where('league_pro_calendars.jornada','=',$ultima_jornada->jornada)
            ->where('pro_match_league.league_id','=',$ProLeague->id)
            ->where('pro_user_match.position_id','>=',2)
            ->where('pro_user_match.position_id','<=',6)
            ->select('users.*',DB::raw('sum(pro_user_match.defence_unbeaten) as total_defence'))
            ->groupBy('users.id')
            ->orderBy('total_defence','desc')
            ->take(4)
            ->get();
       
       

        $delanteros = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->join('league_pro_calendars', 'pro_match_league.id', '=', 'league_pro_calendars.match_id')
            ->where('league_pro_calendars.pro_league_id','=',$ProLeague->id)
            ->where('league_pro_calendars.jornada','=',$ultima_jornada->jornada)
            ->where('pro_match_league.league_id','=',$ProLeague->id)
            ->where('pro_user_match.position_id','>=',17)
            ->where('pro_user_match.position_id','<=',21)
            ->select('users.*',DB::raw('sum(pro_user_match.goals) as total_goals'))
            ->groupBy('users.id')
            ->orderBy('total_goals','desc')
            ->take(2)
            ->get();
        
       
       
       

        $medios = DB::table('users')
            ->join('pro_user_match', 'users.id', '=', 'pro_user_match.user_id')
            ->join('pro_match_league', 'pro_user_match.pro_match_id', '=', 'pro_match_league.id')
            ->join('league_pro_calendars', 'pro_match_league.id', '=', 'league_pro_calendars.match_id')
            ->where('league_pro_calendars.pro_league_id','=',$ProLeague->id)
            ->where('league_pro_calendars.jornada','=',$ultima_jornada->jornada)
            ->where('pro_match_league.league_id','=',$ProLeague->id)
            ->where('pro_user_match.position_id','>=',7)
            ->where('pro_user_match.position_id','<=',16)
            ->select('users.*',DB::raw('sum(pro_user_match.goals) as total_goals'))
            ->groupBy('users.id')
            ->orderBy('total_goals','desc')
            ->take(4)
            ->get();
        
 

        $WeekVerifica=new WeekUser;
        if($WeekVerifica->first()!=null) {
            $ultimoRegistro = DB::table('pro_user_week')->Orderby('week_id', 'desc')->first();

        }

        if($WeekVerifica->first()!=null){
            $ContadorUsuarios=0;
            foreach($porteros as $portero){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$portero->id;
                $WeekMedia->league_id=$ProLeague->id;
                $WeekMedia->position="PORTERO";
                $WeekMedia->position_id=1;
                $WeekMedia->gk_unbeaten=$portero->total_goalkeeper;

                $WeekMedia->week_id =$ultima_jornada->jornada;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($defensas as $defensa){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$defensa->id;
                $WeekMedia->league_id=$ProLeague->id;
                $WeekMedia->position="DEFENSA";
                $WeekMedia->position_id=2;
                $WeekMedia->defence_unbeaten=$defensa->total_defence;

                $WeekMedia->week_id =$ultima_jornada->jornada;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($medios as $medio){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$medio->id;
                $WeekMedia->league_id=$ProLeague->id;
                $WeekMedia->position="MEDIO";
                $WeekMedia->position_id=7;
                $WeekMedia->goals=$medio->total_goals;

                $WeekMedia->week_id =$ultima_jornada->jornada;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($delanteros as $delantero){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$delantero->id;
                $WeekMedia->league_id=$ProLeague->id;
                $WeekMedia->position="DELANTERO";
                $WeekMedia->position_id=20;
                $WeekMedia->goals=$delantero->total_goals;

                $WeekMedia->week_id =$ultima_jornada->jornada;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }




        }


        if($WeekVerifica->first()==null){

            $ContadorUsuarios=0;
            foreach($porteros as $portero){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$portero->id;
                $WeekMedia->league_id=$ProLeague->id;
                $WeekMedia->position="PORTERO";
                $WeekMedia->position_id=1;
                $WeekMedia->gk_unbeaten=$portero->total_goalkeeper;

                $WeekMedia->week_id = $ultima_jornada->jornada;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($defensas as $defensa){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$defensa->id;
                $WeekMedia->league_id=$ProLeague->id;
                $WeekMedia->position="DEFENSA";
                $WeekMedia->position_id=2;
                $WeekMedia->defence_unbeaten=$defensa->total_defence;

                $WeekMedia->week_id = $ultima_jornada->jornada;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($medios as $medio){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$medio->id;
                $WeekMedia->league_id=$ProLeague->id;
                $WeekMedia->position="MEDIO";
                $WeekMedia->position_id=7;
                $WeekMedia->goals=$medio->total_goals;

                $WeekMedia->week_id = $ultima_jornada->jornada;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }

            foreach($delanteros as $delantero){

                $WeekMedia=new WeekUser;


                $WeekMedia->user_id=$delantero->id;
                $WeekMedia->league_id=$ProLeague->id;
                $WeekMedia->position="DELANTERO";
                $WeekMedia->position_id=20;
                $WeekMedia->goals=$delantero->total_goals;

                $WeekMedia->week_id = $ultima_jornada->jornada;

                $ContadorUsuarios++;
                $WeekMedia->save();
            }


        }

        $comment=Comment::all();
        $users=User::all();
        return view('/index',['comment' => $comment,'users'=>$users])->withErrors('Se ha creado el equipo de la semana');
    }



}