<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProTeam;
use App\Team;
use App\CalendarLeague;
use App\Http\Controllers\Controller;
use App\User;
use App\Cup;
use App\clubesproequipo;
use Input;
use App\League;
use App\MatchLeague;
use DB;
use Illuminate\Support\Facades\Auth;



class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function CrearClubUsuario()
    {

        if(Auth::check()){ // este si lo he probado
            //$user=User::find($id); // error! si haces esto de que te sirve que el usuario esté logueado, nunca compruebas que sea el usuario logueado alque estas modificando, si tu usuario ya esta loggeado ya tienes su instancia


            $club = new Team;

            $club->name =  Input::get('nombreequipo');
            $club->folder_league=Input::get('LigaFolder');
            $user=Input::get('userSelect');
            $club->status="Activo";
            $club->save();
            $club->users()->attach($user,['status'=>'Accepted']);


            if($club->save()){
                return redirect()->back()->withErrors("Agregado con éxito");;
            } else {
                return redirect()->back()->withErrors("Algo falló!!!");
            }

        }

    }

    public function CrearCopa(){
        if(Auth::check()){ // este si lo he probado
            //$user=User::find($id); // error! si haces esto de que te sirve que el usuario esté logueado, nunca compruebas que sea el usuario logueado alque estas modificando, si tu usuario ya esta loggeado ya tienes su instancia
            $copa = new Cup;

            $clubes=Team::all();
            $copa->name =  Input::get('name');


            //    $league->users()->attach(Auth::user()->id,['status'=>'Accepted','position' => 'DT']);



            if($copa->save()){
                return view('/AgregarTeamCopa', ['copa' => $copa,'clubes'=>$clubes]);
            } else {
                return redirect()->back()->withErrors("Algo falló!!!");
            }

        }
    }

    public function AgregarTeamLiga() {


        $clubSelect = Input::get('clubSelect');
        $LeagueInput = Input::get('InputIdLeague');
        $Team=Team::find($clubSelect);
        $league=League::find($LeagueInput);
        $clubes=Team::All();
             $ligas=League::all();
            $copas=Cup::all();
        
        $Team->League()->attach($LeagueInput,['status'=>'acepted']);

        if($Team->save()){
            return view('AgregarTeamLiga', ['Team' => $Team,'league'=>$league,'clubes'=>$clubes,'ligas'=>$ligas,'copas'=>$copas]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }

    }


    public function CrearLiga(){
        if(Auth::check()){ // este si lo he probado
            $clubes=Team::all();
            $league = new League;

            $ligas=League::all();
            $copas=Cup::all();
         
            $league->name =  Input::get('name');


            if($league->save()){
                return view('AgregarTeamLiga', ['league' => $league,'clubes'=>$clubes,'ligas'=>$ligas,'copas'=>$copas]);
            } else {
                return redirect()->back()->withErrors("Algo falló!!!");
            }

        }
    }

    public function ModificarCopa(){
        if(Auth::check()){


            $idLiga=Input::get('leagueSelect');
            $clubes=Team::All();
            $copa=Cup::find($idLiga);


            return view('/AgregarTeamCopa', ['copa' => $copa,'clubes'=>$clubes]);


        }
    }

    public function ModificarLiga(){
        if(Auth::check()){


            $idLiga=Input::get('leagueSelect');
            $clubes=Team::All();
            $league=League::find($idLiga);
            
            $ligas=League::all();
            $copas=Cup::all();

            return view('AgregarTeamLiga', ['league' => $league,'clubes'=>$clubes,'ligas'=>$ligas,'copas'=>$copas]);


        }
    }
    
    public function reportarResultado(Request $request){
        if(Auth::check()){
            $marcadorLocal=$request->get('LocalInput');
            $marcadorVisitante=$request->get('VisitorInput');
            $calendario=CalendarLeague::findOrFail($request->get('calendarioInput'));             
            $EquipoLocal=Team::findOrFail($request->get('EquipoLocalInput'));
            $EquipoVisitante=Team::findOrFail($request->get('EquipoVisitanteInput')); 
            $UsuarioLocal=$EquipoLocal->users;         
            $UsuarioVisitante=$EquipoVisitante->users;
           
            
            if($marcadorLocal==$marcadorVisitante){
                $EquipoLocal->points+=1;
                $EquipoVisitante->points+=1;
                $UsuarioLocal[0]->points+=1;
                $UsuarioVisitante[0]->points+=1;
                $UsuarioLocal[0]->JJ+=1;
                $UsuarioVisitante[0]->JJ+=1;  
                $UsuarioLocal[0]->JE+=1;
                $UsuarioVisitante[0]->JE+=1;  
                $EquipoLocal->JE+=1;
                $EquipoVisitante->JE+=1;
                $EquipoLocal->JJ+=1;
                $EquipoVisitante->JJ+=1;
            }
            if($marcadorLocal>$marcadorVisitante){
                $EquipoLocal->points+=3;
                
                $UsuarioLocal[0]->points+=3;                               
                $EquipoLocal->JG+=1;
                $EquipoVisitante->JP+=1;
                $EquipoLocal->JJ+=1;
                $EquipoVisitante->JJ+=1;
                $UsuarioLocal[0]->JJ+=1;
                $UsuarioVisitante[0]->JJ+=1;  
                $UsuarioLocal[0]->JG+=1;
                $UsuarioVisitante[0]->JP+=1;  
            }
              if($marcadorVisitante>$marcadorLocal){
                $EquipoVisitante->points+=3;
                $UsuarioVisitante[0]->points +=3; 
                $EquipoLocal->JP+=1;
                $EquipoVisitante->JG+=1;
                $EquipoLocal->JJ+=1;
                $EquipoVisitante->JJ+=1;
                $UsuarioLocal[0]->JJ+=1;
                $UsuarioVisitante[0]->JJ+=1;  
                $UsuarioLocal[0]->JP+=1;
                $UsuarioVisitante[0]->JG+=1;  
            }
           $partido=new MatchLeague;
           
           $partido->local_score=$marcadorLocal;
           $partido->visitor_score=$marcadorVisitante;
           $partido->team_local_id=$EquipoLocal->id;
           $partido->team_visitor_id=$EquipoVisitante->id;
           $partido->league_id=$EquipoLocal->league[0]->id;           
          
           $partido->save();
           $calendario->match_id = $partido->id;
           $calendario->update();
           $UsuarioLocal[0]->update();
           $UsuarioVisitante[0]->update();
           $EquipoLocal->update();
           $EquipoVisitante->update();
           
           $ligas=League::All();
           $copas=Cup::All();
           $teams=Team::all();
        return view('PVSP',['teams' => $teams,'ligas'=>$ligas,'copas'=>$copas]);
            
        }        
    }
    
     public function EncontrarLiga($id) {
       
    }


    public function BorrarClubLiga() {


        $clubSelect = Input::get('InputIdClub');

        $LeagueInput = Input::get('InputIdLeague');
        $Team=Team::find($clubSelect);
        $league=League::find($LeagueInput);
        $clubes=Team::All();
        $league->Teams()->detach($clubSelect,[]);



            return view('AgregarTeamLiga', ['Team' => $Team,'league'=>$league,'clubes'=>$clubes]);


    }

    public function BorrarClubCopa() {


        $clubSelect = Input::get('InputIdClub');

        $LeagueInput = Input::get('InputIdLeague');
        $Team=Team::find($clubSelect);
        $copa=Cup::find($LeagueInput);
        $clubes=Team::All();
        $copa->Teams()->detach($clubSelect,[]);



            return view('AgregarTeamCopa', ['Team' => $Team,'copa'=>$copa,'clubes'=>$clubes]);


    }
    
    
      public function BorrarTeamLiga() {
        
        
        $clubSelect = Input::get('InputIdClub');
        $Team=Team::find($clubSelect);
        $ligas=League::all();
        $copas=Cup::all();
          

         foreach($Team->users as $userTeam){

             $userId=$userTeam->id;

         }
            $Team->users()->detach($userId,[]);
            $Team->status="Inactivo";
            $Team->save();

              $clubes=Team::All();
                return redirect()->back()->withErrors("Equipo eliminado");

        
    }

    public function AgregarTeamCopa() {


        $clubSelect = Input::get('clubSelect');
        $LeagueInput = Input::get('InputIdLeague');
        $team=Team::find($clubSelect);
        $copa=Cup::find($LeagueInput);
        $clubes=Team::All();
        $team->Cup()->attach($LeagueInput,['status'=>'accepted']);

        if($team->save()){
            return view('AgregarTeamCopa', ['team' => $team,'copa'=>$copa,'clubes'=>$clubes]);
        } else {
            return redirect()->back()->withErrors("Algo falló!!!");
        }

    }


    public function EncontrarLigaPlayer($id){

        $copas=Cup::All();
        $ligas=League::All();
        $league=League::find($id);       
        
        return view('/Liga',['league'=>$league,'ligas'=>$ligas,'copas'=>$copas]);

    }

    public function EncontrarCopaPlayer($id){
        $ligas=League::All();
        $copasTodas=Cup::All();
        $cup=Cup::find($id);
        return view('/Copa',['cup'=>$cup,'copasTodas'=>$copasTodas,'ligas'=>$ligas]);
    }
        
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
