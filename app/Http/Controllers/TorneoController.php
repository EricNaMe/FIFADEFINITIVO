<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProTeam;
use App\User;
use App\clubesproequipo;
use Input;
use App\ProLeague;
use App\ProCup;
use App\League;
use DB;
use Illuminate\Support\Facades\Auth;

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
    
          $teams[]="Pedro";
                    $teams[]="Alejandro";
                    $teams[]="Esqueda";
                    $teams[]="Edgar";

    if (count($teams)%2 != 0){
        array_push($teams,"bye");
    }
    $away = array_splice($teams,(count($teams)/2));
    $home = $teams;
    for ($i=0; $i < count($home)+count($away)-1; $i++)
    {
        for ($j=0; $j<count($home); $j++)
        {
            $round[$i][$j]["Home"]=$home[$j];
            $round[$i][$j]["Away"]=$away[$j];
        }
        if(count($home)+count($away)-1 > 2)
        {
            $s = array_splice( $home, 1, 1 );
            $slice = array_shift( $s  );
            array_unshift($away,$slice );
            array_push( $home, array_pop($away ) );
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


            $league->name = Input::get('name');


            if ($league->save()) {
                return view('/AgregarClubProLiga', ['league' => $league, 'clubes' => $clubes]);
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


            return view('/AgregarClubProLiga', ['league' => $league, 'clubes' => $clubes]);
        }
    }

    public function ModificarCopaPro() {
        if (Auth::check()) {


            $idLiga = Input::get('leagueSelect');
            $clubes = ProTeam::All();
            $copa = ProCup::find($idLiga);


            return view('/AgregarClubProCopa', ['copa' => $copa, 'clubes' => $clubes]);
        }
    }

    public function AgregarProClubLiga() {


        $clubSelect = Input::get('clubSelect');
        $LeagueInput = Input::get('InputIdLeague');
        $proTeam = ProTeam::find($clubSelect);
        $league = ProLeague::find($LeagueInput);
        $clubes = ProTeam::All();
        $proTeam->proLeague()->attach($LeagueInput, ['status' => 'acepted']);

        if ($proTeam->save()) {
            return view('AgregarClubProLiga', ['proTeam' => $proTeam, 'league' => $league, 'clubes' => $clubes]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function BorrarProClubLiga() {


        $clubSelect = Input::get('InputIdClub');

        $LeagueInput = Input::get('InputIdLeague');
        $proTeam = ProTeam::find($clubSelect);
        $league = ProLeague::find($LeagueInput);
        $clubes = ProTeam::All();
        $league->proTeams()->detach($clubSelect, []);

        if ($proTeam->save()) {
            return view('AgregarClubProLiga', ['proTeam' => $proTeam, 'league' => $league, 'clubes' => $clubes]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function BorrarProClubCopa() {


        $clubSelect = Input::get('InputIdClub');

        $CopaInput = Input::get('InputIdLeague');

        $proTeam = ProTeam::find($clubSelect);
        $copa = ProCup::find($CopaInput);
        $clubes = ProTeam::All();
        $copa->proTeams()->detach($clubSelect, []);

        if ($proTeam->save()) {
            return view('AgregarClubProCopa', ['proTeam' => $proTeam, 'copa' => $copa, 'clubes' => $clubes]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function AgregarProClubCopa() {


        $clubSelect = Input::get('clubSelect');
        $LeagueInput = Input::get('InputIdLeague');
        $proTeam = ProTeam::find($clubSelect);
        $league = ProCup::find($LeagueInput);
        $clubes = ProTeam::All();
        $proTeam->proCup()->attach($LeagueInput, ['status' => 'accepted']);

        if ($proTeam->save()) {
            return view('AgregarClubProLiga', ['proTeam' => $proTeam, 'league' => $league, 'clubes' => $clubes]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }
    }

    public function EncontrarLiga($id) {
        $ligas = ProLeague::All();
        $league = ProLeague::find($id);
        $copas = Procup::All();
        return view('/LigaPro', ['league' => $league, 'ligas' => $ligas, 'copas' => $copas]);
    }

    public function EncontrarCalendario(ProLeague $proLeague)
    {

        $proCalendar = $proLeague->proCalendar;
        return view('ProCalendario',['proCalendar'=>$proCalendar]);
    }

    public function EncontrarCopa($id) {
        $copas = ProCup::All();
        $ligas = ProLeague::All();
        $copa = ProCup::find($id);
        return view('/CopaPro', ['copa' => $copa, 'copas' => $copas, 'ligas' => $ligas]);
    }

    public function CrearCalendarioPro() {
        $liga=Input::get('InputIdLeague');
        $league=ProLeague::find($liga);

        if($league->generateAndSaveCalendar()){
            return view('clubes-pro');
        }
        else {
            return "Error al crear calendario";
        }
    }


    public function CrearCopaPro() {
        if (Auth::check()) { // este si lo he probado
            //$user=User::find($id); // error! si haces esto de que te sirve que el usuario esté logueado, nunca compruebas que sea el usuario logueado alque estas modificando, si tu usuario ya esta loggeado ya tienes su instancia
            $copa = new ProCup;

            $clubes = Proteam::all();
            $copa->name = Input::get('name');


            //    $league->users()->attach(Auth::user()->id,['status'=>'Accepted','position' => 'DT']);



            if ($copa->save()) {
                return view('/AgregarClubProCopa', ['copa' => $copa, 'clubes' => $clubes]);
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
