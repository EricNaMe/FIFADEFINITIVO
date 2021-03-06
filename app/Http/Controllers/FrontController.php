<?php

namespace App\Http\Controllers;

use App\Comment;
use App\League;
use App\Cup;
use App\ProMatch;
use App\Transfer;
use App\URLVideos;
use App\Clips;
use App\News;
use Auth;
use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Team;
use App\ProLeague;
use DB;
use App\WeekUser;
use App\ProCup;
use App\User;
use App\ProTeam;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{

    public function Inicio(){

        $comment=Comment::all();
        $users=User::all();
        return view('index',['comment' => $comment,'users'=>$users]);
    }

    public function Perfil(){

        return view('Perfil');
    }

    public function storage(){
        return view('storage');
    }

    public function ProCalendario(){

        $Equipo1=ProTeam::find(1);
        $Equipo2=ProTeam::find(2);
        return view('ProCalendario',['Equipo1'=>$Equipo1,'Equipo2'=>$Equipo2]);
    }


    public function ProCrearLiga(){

        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        return view ('ProCrearLiga',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function ProCrearCopa(){

        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        return view ('ProCrearCopa',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }
 public function SalaTrofeosPerfil(){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view ('SalaTrofeosPerfil',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }
    public function SalaTrofeoClub(){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view ('SalaTrofeoClub',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function Equipo_CP(){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view ('Equipo_CP',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }
     public function Equipo_CPTemp(){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view ('Equipo_CPTemp',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function PerfilClubes(){

        return view('PerfilClubes');
    }

    public function PerfilNoAutenticadoClub(){

        return view('PerfilNoAutenticadoClub');
    }


    public function CrearCopa(){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view ('CrearCopa',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function CrearLiga(){
        $clubes=Team::all();
        $ligas= League::all();
        $copas=Cup::all();

        return view ('CrearLiga',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function AgregarTeamCopa(){

       $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view ('AgregarTeamCopa',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function AgregarTeamLiga(){

        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view ('AgregarTeamCopa',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }


    public function EliminarEquiposPvsP(){

        $ligas=League::All();
        $copas=Cup::All();
        $teams=Team::all();      

        $clubes=Team::All();

        return view('EliminarEquiposPvsP',['clubes'=>$clubes, 'teams' => $teams,'ligas'=>$ligas,'copas'=>$copas]);
    }





    public function EquipoSemana(ProLeague $league) {

       
        $WeekVerifica=new WeekUser;
        if($WeekVerifica->first()!=null) {
            $ultimoRegistro = DB::table('pro_user_week')->Orderby('week_id', 'desc')->first();

               $EquipoSemana=WeekUser::all()->where('week_id',$ultimoRegistro->week_id)
                                            ->where('league_id',$league->id);

        }else{
            return "error no has generado un equipo de la semana";
        }

$BanderaEquipoSemana=1;
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        return view ('Equipo_CP',['clubes' => $clubes,
            'BanderaEquipoSemana'=>$BanderaEquipoSemana,
            'ligas'=>$ligas,
            'copas'=>$copas,
            'league'=>$league,
            'EquipoSemana'=>$EquipoSemana]);

    }
    
     public function EquipoSemanaJornada(ProLeague $league) {

        $jornada = Input::get('Jornada');
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
               
        $BanderaEquipoSemana=1;
        $int_jornada = (int)$jornada;
        $WeekVerifica=new WeekUser;
        if($WeekVerifica->first()!=null) {
            
                
            
               $EquipoSemana=WeekUser::all()
                ->where('week_id',$int_jornada)
                ->where('league_id',$league->id);
                           
              
                              
               if($EquipoSemana->isEmpty()){                   
                $ultimoRegistro = DB::table('pro_user_week')->Orderby('week_id', 'desc')
                        ->where('league_id',$league->id)
                        ->first();
                
                $EquipoSemana=WeekUser::all()
                ->where('week_id',$ultimoRegistro)
                ->where('league_id',$league->id);
                  
                 $BanderaEquipoSemana=1;
            return view ('Equipo_CP',['clubes' => $clubes,
            'BanderaEquipoSemana'=>$BanderaEquipoSemana,
            'ligas'=>$ligas,
            'copas'=>$copas,
            'league'=>$league,
            'EquipoSemana'=>$EquipoSemana])->withErrors('No hay equipo de la semana para esa jornada');
                   
               }

        }else{
            return "error no has generado un equipo de la semana";
        }      
        
        $BanderaEquipoSemana=1;
            return view ('Equipo_CP',['clubes' => $clubes,
            'BanderaEquipoSemana'=>$BanderaEquipoSemana,    
            'ligas'=>$ligas,
            'copas'=>$copas,
            'league'=>$league,
            'EquipoSemana'=>$EquipoSemana]);

    }

    public function AgregarClubProLiga() {
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        return view ('AgregarClubProLiga',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);

    }



    public function ModificarLigaPro(){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('ModificarLigaPro',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }
    
    
    
    public function ModificarDatosLigaPro(){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('ModificarDatosLigaPro',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function ModificarCopaPro(){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('ModificarCopaPro',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }


    public function ModificarCopa(){

        $ligas= League::all();
        $copas=Cup::all();

        return view('ModificarCopa',['ligas'=>$ligas,'copas'=>$copas]);
    }

    public function ModificarLiga(){

        $ligas= League::all();
        $copas=Cup::all();

        return view('ModificarLiga',['ligas'=>$ligas,'copas'=>$copas]);
    }


    public function EditarPerfil(){

        return view('EditarPerfil');
    }

    public function ReportarPartidoPro(){

        $Team=ProTeam::find(1);
        return view('ReportarPartidoPro',['Team'=>$Team]);
    }

    public function ReportarResultadosPro(){


        return view('ReportarResultadosPro');
    }


    public function PerfilDetalles(){


        return view('PerfilDetalles');
    }

    public function SalaTrofeo1vs1(){


        return view('SalaTrofeo1vs1');
    }

    public function SalaTrofeo1vs1Div(){


        return view('SalaTrofeo1vs1Div');
    }


    public function SalaTrofeosCP(){


        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('SalaTrofeosCP',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }


    public function SalaTrofeosCPAsi(){

        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('SalaTrofeosCPAsi',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }



    public function SalaTrofeosCPPor(){

        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('SalaTrofeosCPPor',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }


    public function SalaTrofeosCPRey(){

        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('SalaTrofeosCPRey',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function SalaTrofeosCPGol(){

        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('SalaTrofeosCPGol',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }


    public function Transferencias(){


        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        $proTeam=ProTeam::findOrFail(2);

        return view('Transferencias',[
            'proTeam'=>$proTeam,
            'clubes' => $clubes,
            'ligas'=>$ligas,
            'copas'=>$copas,
            'transfers' => Transfer::whereNotNull('up_pro_team_id')->get(),
        ]);
    }


    public function TransferenciasBuscarE(){


        $search = Input::get('search');
        return view('TransferenciasBuscarE',[
            'clubes' => Proteam::all(),
            'ligas' => ProLeague::all(),
            'copas' => ProCup::all(),
            'search' => Input::get('search'),
            'pro_team_search' => ProTeam::search($search)->get(),
        ]);
        return view('TransferenciasBuscarE',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }


    public function TransferenciasBuscarJ(){
$search = Input::get('search');
        return view('TransferenciasBuscarJ',[
            'users' => User::all(),
            'ligas' => ProLeague::all(),
            'copas' => ProCup::all(),
            'search' => Input::get('search'),
            'user_search' => User::search($search)->get(),
        ]);
    }
    
    
    public function ReportarPartido(){
        
       
         $ligas=League::All();
        $copas=Cup::All();
        $teams=Team::all();      

        $clubes=Team::All();

       return view('ReportarPardido',['clubes'=>$clubes, 'teams' => $teams,'ligas'=>$ligas,'copas'=>$copas]);
        
        
        
    }


    public function LigaPro(){

        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        return view('LigaPro',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function CopaPro(){

        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        return view('CopaPro',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function UnirteClub(){

        return view('UnirteClub');
    }




    public function AgregarClubProCopa(){
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('AgregarClubProCopa',['ligas'=>$ligas,'copas'=>$copas]);
    }






    public function ClubDetalles(){
        $clubes=  ProTeam::all();
        return view('ClubDetalles',['clubes' => $clubes]);
    }

    public function PVSP(){
        $ligas=League::All();
        $copas=Cup::All();
        $teams=Team::all();
        return view('PVSP',['teams' => $teams,'ligas'=>$ligas,'copas'=>$copas]);


    }

    public function Primera(){

        return view('Primera');
    }

    public function DetallesPartido()
    {
        return view('DetallesPartido');

    }

    public function Liga()
    {
        return view('Liga');

    }

    public function Copa()
    {
        return view('Copa');

    }





    public function Clips()
    {
        $comment=Clips::all();
        $videos=URLVideos::all();

        return view('Clips',['comment'=>$comment,'videos'=>$videos]);
    }

    public function Fase1PvsP()
    {
         $ligas=League::All();
        $copas=Cup::All();
        $teams=Team::all();
        return view('Fase1PvsP',['teams' => $teams,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function Fases()
    {
          $ligas=League::All();
        $copas=Cup::All();
        $teams=Team::all();
        return view('Fases',['teams' => $teams,'ligas'=>$ligas,'copas'=>$copas]);
    }
    public function Rfases()
    {
          $ligas=League::All();
        $copas=Cup::All();
        $teams=Team::all();
        return view('Rfases',['teams' => $teams,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function Noticias()
    {
        $comment=Comment::all();
        $Noticias=News::all();
        $users=User::all();
        return view('Noticias',['users' => $users,'comment'=>$comment,'Noticias'=>$Noticias]);
    }

    public function PvsPCalendario()
    {
        return view('PvsPCalendario');
    }

    public function clubespro()
    {
        return view('clubes-pro.clubes-pro');
    }

    public function Ranking1VS1()
    {
        return view('Ranking1VS1');
    }

    public function RankingCP()
    {
        $Usuarios=user::all();
        $clubes=Proteam::all();
        
        $MejoresClubes=$clubes->sortByDesc('points')->take(10);
        $UsuariosGoleadores = $Usuarios->sortByDesc('goals')->take(10);
        $UsuariosMayorPuntaje = $Usuarios->sortByDesc('pro_points')->take(10);
        $UsuariosMejoresJugadores = $Usuarios->sortByDesc('best_player')->take(10);
        $UsuariosMejoresPorteros=$Usuarios->sortByDesc('gk_unbeaten')->take(10);
        $UsuariosMejoresDefensas=$Usuarios->sortByDesc('defence_unbeaten')->take(10);
        
        
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('RankingCP',['clubes' => $clubes,
            'ligas'=>$ligas,
            'copas'=>$copas,
            'MejoresClubes'=>$MejoresClubes,           
            'UsuariosGoleadores'=>$UsuariosGoleadores,
            'UsuariosMayorPuntaje'=>$UsuariosMayorPuntaje,
            'UsuariosMejoresJugadores'=>$UsuariosMejoresJugadores,
            'UsuariosMejoresPorteros'=>$UsuariosMejoresPorteros,
            'UsuariosMejoresDefensas'=>$UsuariosMejoresDefensas
          
                ]);
    }

    public function edit($id)
    {
        //
    }

    public function Reglamento()
    {
        return view('Reglamento');
    }

    public function Divisiones()
    {
        $users=User::All();
        $copas=Cup::All();
        $ligas=League::All();
        return view('Divisiones',['users'=>$users,'copas'=>$copas,'ligas'=>$ligas]);
    }


    public function DetallesPartidoPro()
    {
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        $partido=ProMatch::find(2);


        return view('DetallesPartidoPro',['clubes' => $clubes,
            'ligas'=>$ligas,
            'copas'=>$copas,
            'partido'=>$partido]);
    }
    
    
        public function EstadisticasLigaPro(){

        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        $UsuarioVal=2;
        return view('EstadisticasLigaPro',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas,'UsuarioVal'=>$UsuarioVal]);
    }
    
    public function ProJugadoresSinClub(){
        $usuarios=User::all();
        $ligas=ProLeague::all();
        $copas=ProCup::all();
        foreach($usuarios as $UsuariosFor){
            if(!$UsuariosFor->isInAnyTeam()){
                $usuariosSinClubArray[]=$UsuariosFor->id;
     
            }           
        }
        
        $UsuariosSinClub=User::find($usuariosSinClubArray);
         return view('ProJugadoresSinClub',['UsuariosSinClub'=>$UsuariosSinClub,'ligas'=>$ligas,'copas'=>$copas]);
        
        
        
    }

    public function ResetPassword()
    {

        if (Auth::check()){
            if (Auth::user()->user_name == "Administrador22") {
                return view('auth.passwords.reset');
            }
    }
        return redirect()->back()->withErrors("No eres admin!!!");

    }

}