<?php

namespace App\Http\Controllers;

use App\Comment;
use App\League;
use App\Cup;
use App\ProMatch;
use App\Transfer;
use App\URLVideos;
use App\Clips;
use Illuminate\Http\Request;
use Input;
use App\Http\Requests;
use App\Team;
use App\ProLeague;

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

        return view('Transferencias',[
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

        $users=User::all();
        return view('Noticias',['users' => $users,'comment'=>$comment]);
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
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('RankingCP',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
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

}