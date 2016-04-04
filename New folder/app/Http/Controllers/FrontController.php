<?php

namespace App\Http\Controllers;

use App\Comment;
use App\League;
use App\Cup;
use App\URLVideos;
use App\Clips;
use Illuminate\Http\Request;

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

        return view('ProCrearLiga');
    }
    
    public function ProCrearCopa(){

        return view('ProCrearCopa');
    }


    public function Equipo_CP(){

        return view('Equipo_CP');
    }

    public function PerfilClubes(){

        return view('PerfilClubes');
    }
    
       public function PerfilNoAutenticadoClub(){

        return view('PerfilNoAutenticadoClub');
    }


    public function CrearCopa(){

        return view('CrearCopa');
    }

    public function CrearLiga(){

        return view('CrearLiga');
    }

    public function AgregarTeamCopa(){

        return view('AgregarTeamCopa');
    }

    public function AgregarTeamLiga(){

        return view('AgregarTeamLiga');
    }
    
    
    public function EliminarEquiposPvsP(){

        $clubes=Team::All();
        
        return view('EliminarEquiposPvsP',['clubes'=>$clubes]);
    }






    public function AgregarClubProLiga() {
        
        $clubes=Proteam::all();
        return view('AgregarClubProLiga',['clubes' => $clubes]);
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


    public function SalaTrofeosCP(){


        return view('SalaTrofeosCP');
    }


    public function SalaTrofeosCPAsi(){


        return view('SalaTrofeosCPAsi');
    }



    public function SalaTrofeosCPPor(){


        return view('SalaTrofeosCPPor');
    }


    public function SalaTrofeosCPRey(){


        return view('SalaTrofeosCPRey');
    }

    public function SalaTrofeosCPGol(){


        return view('SalaTrofeosCPGol');
    }


    public function Transferencias(){


        return view('Transferencias');
    }


    public function TransferenciasBuscarE(){


        return view('TransferenciasBuscarE');
    }


    public function TransferenciasBuscarJ(){


        return view('TransferenciasBuscarJ');
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
    
    
     public function BuscarClub(){

        return view('BuscarClub');
    }
    
      public function AgregarClubProCopa(){

        return view('AgregarClubProCopa');
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
        return view('Fase1PvsP');
    }

    public function Fases()
    {
        return view('Fases');
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
        return view('clubes-pro');
    }

    public function Ranking1VS1()
    {
        return view('Ranking1VS1');
    }

    public function RankingCP()
    {
        return view('RankingCP');
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

}