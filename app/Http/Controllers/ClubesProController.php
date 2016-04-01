<?php

namespace App\Http\Controllers;

use App\Exceptions\PermissionException;
use App\LeagueProCalendar;
use App\Notification;
use App\ProCup;
use App\ProLeague;
use App\ProTeam;
use App\ProMatch;

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

    public function index(){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();

        return view('clubes-pro.clubes-pro',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function getCrear(){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();        
        return view('clubes-pro.crear',['clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    /*
     * Create a Club-pro
     */
    public function postIndex(Request $request){
        if(Auth::user()->isInAnyTeam())
        {
            throw new PermissionException(
                'Ya se encuentra en otro club'
            );
        }
        $club = new ProTeam;
        $club->name =  Input::get('nombreequipo');
        $club->quote = Input::get('lema');
        $club->state  = Input::get('EstadoSelect');

        DB::beginTransaction();
        try {
            $club->save();
            $club->users()->attach(Auth::user()->id,
                [
                    'status'=>'Accepted',
                    'position' => 'DT'
                ]);

            if($club->save()){
                $picture = $request->file('picture');
                if($picture)
                {
                   $club->saveImage($picture);
                }
                DB::commit();
                return redirect('clubes-pro')
                    ->with('message','Creación de club exitosa');
            } else {
                return redirect()->back()
                    ->withErrors("Algo falló!!!");
            }
        }
        catch(\Exception $e)
        {
            DB::rollBack();
            \Log::error($e);
            return redirect()->back()->withErrors("Algo falló!!!");
        }

    }

    public function getUnirte(ProTeam $proTeam){
        $proTeam->canAddUser(Auth::user());

        $ligas=ProLeague::all();
        $copas=ProCup::all();
        return view('clubes-pro.unirte', ['club' => $proTeam,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function postUnirte(ProTeam $proTeam){
        $posicion =  Input::get('PosicionSelect');

        $proTeam->addPendingUser(Auth::user(),$posicion);
        $proTeam->sendPendingUserNotification();
        return redirect()
            ->to('clubes-pro/'.$proTeam->id)
            ->with('message', 'Éxito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDetalle(ProTeam $proTeam){
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();        
        return view('clubes-pro.detalle',
            ['proTeam' => $proTeam,
                'clubes' => $clubes,
                'ligas'=>$ligas,
                'copas'=>$copas]);
    }

    public function DetallesPartidoMetodo($id){

      $partido=ProMatch::find($id);
        $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();
        return view('DetallesPartido', ['proTeam' => $proTeam,'clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas,'partido'=>$partido]);
    }

    public function getPlantilla(ProTeam $proTeam){
         $clubes=Proteam::all();
        $ligas= ProLeague::all();
        $copas=ProCup::all();   
        
        return view('clubes-pro.plantilla', ['proTeam' => $proTeam, 'clubes' => $clubes,'ligas'=>$ligas,'copas'=>$copas]);
    }

    public function putAutorizar(ProTeam $proTeam, User $user)
    {
        $proTeam->authorizeUserRequest($user);
        return redirect()->back()
            ->with('message',"Éxito");
    }
    public function putDenegar(ProTeam $proTeam, User $user)
    {
        $proTeam->rejectUserRequest($user);
        return redirect()->back()
            ->with('message',"Éxito");
    }


    public function ReportarResultadosPro()
    {
        $usuarioLocal=input::get("checkbox");
        $usuarioVisitante=input::get("checkboxVisitante");
        $EquipoLoc=input::get("EquipoLocalInput");
        $EquipoVis=input::get("EquipoVisitanteInput");
        $League=input::get("leagueInput");
        $CalendarioInput=input::get("calendarioInput");

        $calendario=LeagueProCalendar::find($CalendarioInput);

            $usuariosLocal=User::find($usuarioLocal);
            $usuariosVisitante=User::find($usuarioVisitante);

            $EquipoLocal=ProTeam::find($EquipoLoc);
            $EquipoVisitante=ProTeam::find($EquipoVis);

        $league=ProLeague::find($League);






        return view('ReportarResultadosPro',['usuariosLocal'=>$usuariosLocal,'usuariosVisitante'=>$usuariosVisitante,'EquipoLocal'=>$EquipoLocal,'EquipoVisitante'=>$EquipoVisitante,'league'=>$league,'calendario'=>$calendario]);

    }





    public function ReportarResultadosMetodo(){

        $VectorUsuariosLocal=Input::get('VectorUsuarioLocal');


        $Partido=new ProMatch;
        $UsuariosLocal=User::find($VectorUsuariosLocal);

        $League=Input::get('leagueInput');
        $equipoVisitante=Input::get('EquipoVisitanteInput');
        $equipoLocal=Input::get('EquipoLocalInput');
        $marcadorLocal=Input::get('LocalInput');
        $marcadorVisitante=Input::get('VisitorInput');

        $Goles=Input::get('GolesSelect');
        $Posicion=Input::get('PosicionSelect');

        $Amarillas=Input::get('AmarillasSelect');
        $Rojas=Input::get('RojasSelect');
        $Asistencias=Input::get('AsistenciasSelect');
        $CalendarioInput=Input::get('calendarioInput');
        $radio=Input::get('optradio');


        $calendario=LeagueProCalendar::find($CalendarioInput);
        $equipoLoc=ProTeam::find($equipoLocal);
        $equipoVis=ProTeam::find($equipoVisitante);


        if($marcadorLocal==$marcadorVisitante){
            
            $equipoLoc->JE+=1;
            $equipoVis->JE+=1;
            $equipoLoc->points+=1;
            $equipoVis->points+=1;
            $equipoLoc->JJ+=1;
             $equipoVis->JJ+=1;

            $equipoLoc->GF+=$marcadorLocal;
            $equipoVis->GF+=$marcadorVisitante;

            $equipoLoc->GC+=$marcadorVisitante;
            $equipoVis->GC+=$marcadorLocal;

            $equipoLoc->update();
            $equipoVis->update();

        }
        
         if($marcadorLocal>$marcadorVisitante){
            $equipoVis->JJ+=1;
             $equipoLoc->JJ+=1;
            $equipoLoc->JG+=1;
            $equipoVis->JP+=1;
            $equipoLoc->points+=3;
             $equipoLoc->GF+=$marcadorLocal;
             $equipoVis->GF+=$marcadorVisitante;

             $equipoLoc->GC+=$marcadorVisitante;
             $equipoVis->GC+=$marcadorLocal;
           
            $equipoLoc->update();
            $equipoVis->update();
        }
        
          if($marcadorLocal<$marcadorVisitante){
             $equipoVis->JJ+=1;
             $equipoLoc->JJ+=1;
            $equipoLoc->JP+=1;
            $equipoVis->JG+=1;
            $equipoVis->points+=3;
              $equipoLoc->GF+=$marcadorLocal;
              $equipoVis->GF+=$marcadorVisitante;

              $equipoLoc->GC+=$marcadorVisitante;
              $equipoVis->GC+=$marcadorLocal;
           
            $equipoLoc->update();
            $equipoVis->update();
        }
        
           

       for($i=0;$i<sizeof($Goles);$i++){

           $UsuariosLocal[$i]->goals+=$Goles[$i];

           /*Borrar _id*/
           if($Posicion[$i]=="PO"){
               $Partido->PO_local_id=$UsuariosLocal[$i]->id;
               $Partido->PO_local_red=$Rojas[$i];
               $Partido->PO_local_yellow=$Amarillas[$i];
               $Partido->PO_local_assistance=$Asistencias[$i];
               $Partido->PO_local_goal=$Goles[$i];
               $Partido->PO_local_unbeaten=$UsuariosLocal[$i]->id;
           }
           if($Posicion[$i]=="DFC"){
               $Partido->DFC_local_id=$UsuariosLocal[$i]->id;
               $Partido->DFC_local_red=$Rojas[$i];
               $Partido->DFC_local_yellow=$Amarillas[$i];
               $Partido->DFC_local_assistance=$Asistencias[$i];
               $Partido->DFC_local_goal=$Goles[$i];
           }

           if($Posicion[$i]=="LTI"){
               $Partido->LTI_local_id=$UsuariosLocal[$i]->id;
               $Partido->LTI_local_red=$Rojas[$i];
               $Partido->LTI_local_yellow=$Amarillas[$i];
               $Partido->LTI_local_assistance=$Asistencias[$i];
               $Partido->LTI_local_goal=$Goles[$i];
           }
           if($Posicion[$i]=="LTD"){
               $Partido->LTD_local_id=$UsuariosLocal[$i]->id;
               $Partido->LTD_local_red=$Rojas[$i];
               $Partido->LTD_local_yellow=$Amarillas[$i];
               $Partido->LTD_local_assistance=$Asistencias[$i];
               $Partido->LTD_local_goal=$Goles[$i];
           }
           if($Posicion[$i]=="MCD"){
               $Partido->MCD_local_id=$UsuariosLocal[$i]->id;
               $Partido->MCD_local_red=$Rojas[$i];
               $Partido->MCD_local_yellow=$Amarillas[$i];
               $Partido->MCD_local_assistance=$Asistencias[$i];
               $Partido->MCD_local_goal=$Goles[$i];

           }
           if($Posicion[$i]=="MC"){
               $Partido->MC_local_id=$UsuariosLocal[$i]->id;
               $Partido->MC_local_red=$Rojas[$i];
               $Partido->MC_local_yellow=$Amarillas[$i];
               $Partido->MC_local_assistance=$Asistencias[$i];
               $Partido->MC_local_goal=$Goles[$i];
           }
           if($Posicion[$i]=="MI"){
               $Partido->MI_local_id=$UsuariosLocal[$i]->id;
               $Partido->MI_local_red=$Rojas[$i];
               $Partido->MI_local_yellow=$Amarillas[$i];
               $Partido->MI_local_assistance=$Asistencias[$i];
               $Partido->MI_local_goal=$Goles[$i];
           }
           if($Posicion[$i]=="MD"){
               $Partido->MD_local_id=$UsuariosLocal[$i]->id;
               $Partido->MD_local_red=$Rojas[$i];
               $Partido->MD_local_yellow=$Amarillas[$i];
               $Partido->MD_local_assistance=$Asistencias[$i];
               $Partido->MD_local_goal=$Goles[$i];
           }
           if($Posicion[$i]=="MCO"){
               $Partido->MCO_local_id=$UsuariosLocal[$i]->id;
               $Partido->MCO_local_red=$Rojas[$i];
               $Partido->MCO_local_yellow=$Amarillas[$i];
               $Partido->MCO_local_assistance=$Asistencias[$i];
               $Partido->MCO_local_goal=$Goles[$i];
           }
           if($Posicion[$i]=="EI"){
               $Partido->EI_local_id=$UsuariosLocal[$i]->id;
               $Partido->EI_local_red=$Rojas[$i];
               $Partido->EI_local_yellow=$Amarillas[$i];
               $Partido->EI_local_assistance=$Asistencias[$i];
               $Partido->EI_local_goal=$Goles[$i];
           }
           if($Posicion[$i]=="ED"){
               $Partido->ED_local_id=$UsuariosLocal[$i]->id;
               $Partido->ED_local_red=$Rojas[$i];
               $Partido->ED_local_yellow=$Amarillas[$i];
               $Partido->ED_local_assistance=$Asistencias[$i];
               $Partido->ED_local_goal=$Goles[$i];
           }
           if($Posicion[$i]=="DI"){
               $Partido->DI_local_id=$UsuariosLocal[$i]->id;
               $Partido->DI_local_red=$Rojas[$i];
               $Partido->DI_local_yellow=$Amarillas[$i];
               $Partido->DI_local_assistance=$Asistencias[$i];
               $Partido->DI_local_goal=$Goles[$i];
           }
           if($Posicion[$i]=="DD"){
               $Partido->DD_local_id=$UsuariosLocal[$i]->id;
               $Partido->DD_local_red=$Rojas[$i];
               $Partido->DD_local_yellow=$Amarillas[$i];
               $Partido->DD_local_assistance=$Asistencias[$i];
               $Partido->DD_local_goal=$Goles[$i];
           }
           if($Posicion[$i]=="DC"){
               $Partido->DC_local_id=$UsuariosLocal[$i]->id;
               $Partido->DC_local_red=$Rojas[$i];
               $Partido->DC_local_yellow=$Amarillas[$i];
               $Partido->DC_local_assistance=$Asistencias[$i];
               $Partido->DC_local_goal=$Goles[$i];
           }







           $UsuariosLocal[$i]->yellow_card+=$Amarillas[$i];
           $UsuariosLocal[$i]->red_card+=$Rojas[$i];
           $UsuariosLocal[$i]->assistance+=$Asistencias[$i];
           $UsuariosLocal[$i]->pro_JJ++;
           $LocalUser[]=$UsuariosLocal[$i]->id;


           $UsuariosLocal[$i]->update();

        }






        $VectorUsuariosVisitante=Input::get('VectorUsuarioVisitante');

        $UsuariosVisitante=User::find($VectorUsuariosVisitante);

        $GolesVisitante=Input::get('GolesSelectVisitante');

        $PosicionVisitante=Input::get('PosicionSelectVisitante');
        $AmarillasVisitante=Input::get('AmarillasSelectVisitante');
        $RojasVisitante=Input::get('RojasSelectVisitante');
        $AsistenciasVisitante=Input::get('AsistenciasSelectVisitante');
        $radio=Input::get('optradio');



        for($i=0;$i<sizeof($GolesVisitante);$i++){


            if($PosicionVisitante[$i]=="PO"){
                $Partido->PO_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->PO_visitor_red=$RojasVisitante[$i];
                $Partido->PO_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->PO_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->PO_visitor_goal=$GolesVisitante[$i];
                $Partido->PO_visitor_unbeaten=$UsuariosVisitante[$i];

            }
            if($Posicion[$i]=="DFC"){
                $Partido->DFC_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->DFC_visitor_red=$RojasVisitante[$i];
                $Partido->DFC_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->DFC_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->DFC_visitor_goal=$GolesVisitante[$i];
            }

            if($Posicion[$i]=="LTI"){
                $Partido->LTI_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->LTI_visitor_red=$RojasVisitante[$i];
                $Partido->LTI_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->LTI_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->LTI_visitor_goal=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="LTD"){
                $Partido->LTD_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->LTD_visitor_red=$RojasVisitante[$i];
                $Partido->LTD_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->LTD_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->LTD_visitor_goal=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="MCD"){

                $Partido->MCD_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->MCD_visitor_red=$RojasVisitante[$i];
                $Partido->MCD_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->MCD_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->MCD_visitor_goal=$GolesVisitante[$i];

            }
            if($Posicion[$i]=="MC"){
                $Partido->MC_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->MC_visitor_red=$RojasVisitante[$i];
                $Partido->MC_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->MC_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->MC_visitor_goal=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="MI"){
                $Partido->MI_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->MI_visitor_red=$RojasVisitante[$i];
                $Partido->MI_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->MI_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->MI_visitor_goal=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="MD"){
                $Partido->MD_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->MD_visitor_red=$RojasVisitante[$i];
                $Partido->MD_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->MD_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->MD_visitor_goal=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="MCO"){
                $Partido->MCO_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->MCO_visitor_red=$RojasVisitante[$i];
                $Partido->MCO_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->MCO_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->MCO_visitor_goal=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="EI"){
                $Partido->EI_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->EI_visitor_red=$RojasVisitante[$i];
                $Partido->EI_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->EI_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->EI_visitor_goal=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="ED"){

                $Partido->ED_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->ED_visitor_red=$RojasVisitante[$i];
                $Partido->ED_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->ED_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->ED_visitor_goal=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="DI"){
                $Partido->DI_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->DI_visitor_red=$RojasVisitante[$i];
                $Partido->DI_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->DI_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->DI_visitor_goal=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="DD"){
                $Partido->DD_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->DD_visitor_red=$RojasVisitante[$i];
                $Partido->DD_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->DD_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->DD_visitor_goal=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="DC"){
                $Partido->DC_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->DC_visitor_red=$RojasVisitante[$i];
                $Partido->DC_visitor_yellow=$AmarillasVisitante[$i];
                $Partido->DC_visitor_assistance=$AsistenciasVisitante[$i];
                $Partido->DC_visitor_goal=$GolesVisitante[$i];
            }


            $UsuariosVisitante[$i]->goals+=$GolesVisitante[$i];
            $UsuariosVisitante[$i]->yellow_card+=$AmarillasVisitante[$i];
            $UsuariosVisitante[$i]->red_card+=$RojasVisitante[$i];
            $UsuariosVisitante[$i]->assistance+=$AsistenciasVisitante[$i];
            $UsuariosVisitante[$i]->pro_JJ++;


            $UsuariosVisitante[$i]->update();
        }


        $Partido->team_local_id=$equipoLocal;
        $Partido->team_visitor_id=$equipoVisitante;
        $Partido->league_id=$League;
        $Partido->local_score=$marcadorLocal;
        $Partido->visitor_score=$marcadorVisitante;

        $Partido->save();
        $calendario->match_id=$Partido->id;
        $calendario->update();

        return view('Inicio');



    }

    public function ReportarPartidoMetodo($id,$id2,$id3,$id4)
    {
      $Equipo1=ProTeam::find($id);
      $Equipo2=ProTeam::find($id2);
      $league=ProLeague::find($id3);
      $calendario=LeagueProCalendar::find($id4);




        return view('ReportarPartidoPro',['Equipo1'=>$Equipo1,'Equipo2'=>$Equipo2,'league'=>$league,'calendario'=>$calendario]);
    }

    public function buscar(){
        $search = Input::get('search');
        return view('clubes-pro.buscar',[
            'clubes' => Proteam::all(),
            'ligas' => ProLeague::all(),
            'copas' => ProCup::all(),
            'search' => Input::get('search'),
            'pro_team_search' => ProTeam::search($search)->get(),
        ]);
    }
    
    
     public function buscarEquipo(){
        $search = Input::get('search');
        return view('TransferenciasBuscarE',[
            'clubes' => Proteam::all(),
            'ligas' => ProLeague::all(),
            'copas' => ProCup::all(),
            'search' => Input::get('search'),
            'pro_team_search' => ProTeam::search($search)->get(),
        ]);
    }
    
    
        public function buscarJugador(){
        $search = Input::get('search');
        return view('TransferenciasBuscarJ',[
            'users' => User::all(),
            'ligas' => ProLeague::all(),
            'copas' => ProCup::all(),
            'search' => Input::get('search'),
            'user_search' => User::search($search)->get(),
        ]);
    }

    public function deleteBaja(ProTeam $proTeam)
    {
        $proTeam->downUser(Auth::user());
        if(ProTeam::whereId(\Auth::user()->id)->first())
        {
            return redirect()->to('clubes-pro');
        }
        return redirect()->back();
    }

}
