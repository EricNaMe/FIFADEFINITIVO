<?php

namespace App\Http\Controllers;

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
        return view('clubes-pro.crear');
    }

    /*
     * Create a Club-pro
     */
    public function postIndex(Request $request){
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

        return view('clubes-pro.unirte', ['club' => $proTeam]);
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
        return view('clubes-pro.detalle', ['proTeam' => $proTeam]);
    }

    public function getPlantilla(ProTeam $proTeam){
        return view('clubes-pro.plantilla',
            ['proTeam' => $proTeam]);
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

            $usuariosLocal=User::find($usuarioLocal);
            $usuariosVisitante=User::find($usuarioVisitante);

            $EquipoLocal=ProTeam::find($EquipoLoc);
            $EquipoVisitante=ProTeam::find($EquipoVis);

        $league=ProLeague::find($League);






        return view('ReportarResultadosPro',['usuariosLocal'=>$usuariosLocal,'usuariosVisitante'=>$usuariosVisitante,'EquipoLocal'=>$EquipoLocal,'EquipoVisitante'=>$EquipoVisitante,'league'=>$league]);

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
        $radio=Input::get('optradio');






       for($i=0;$i<sizeof($Goles);$i++){

           $UsuariosLocal[$i]->goals+=$Goles[$i];

           /*Borrar _id*/
           if($Posicion[$i]=="PO"){
               $Partido->PO_local_id=$UsuariosLocal[$i]->id;
               $Partido->PO_local_red_id=$Rojas[$i];
               $Partido->PO_local_yellow_id=$Amarillas[$i];
               $Partido->PO_local_assistance_id=$Asistencias[$i];
               $Partido->PO_local_goal_id=$Goles[$i];
               $Partido->PO_local_unbeaten=$UsuariosLocal[$i]->id;
           }
           if($Posicion[$i]=="DFC"){
               $Partido->DFC_local_id=$UsuariosLocal[$i]->id;
               $Partido->DFC_local_red_id=$Rojas[$i];
               $Partido->DFC_local_yellow_id=$Amarillas[$i];
               $Partido->DFC_local_assistance_id=$Asistencias[$i];
               $Partido->DFC_local_goal_id=$Goles[$i];
           }

           if($Posicion[$i]=="LTI"){
               $Partido->LTI_local_id=$UsuariosLocal[$i]->id;
               $Partido->LTI_local_red_id=$Rojas[$i];
               $Partido->LTI_local_yellow_id=$Amarillas[$i];
               $Partido->LTI_local_assistance_id=$Asistencias[$i];
               $Partido->LTI_local_goal_id=$Goles[$i];
           }
           if($Posicion[$i]=="LTD"){
               $Partido->LTD_local_id=$UsuariosLocal[$i]->id;
               $Partido->LTD_local_red_id=$Rojas[$i];
               $Partido->LTD_local_yellow_id=$Amarillas[$i];
               $Partido->LTD_local_assistance_id=$Asistencias[$i];
               $Partido->LTD_local_goal_id=$Goles[$i];
           }
           if($Posicion[$i]=="MCD"){
               $Partido->MCD_local_id=$UsuariosLocal[$i]->id;
               $Partido->MCD_local_red_id=$Rojas[$i];
               $Partido->MCD_local_yellow_id=$Amarillas[$i];
               $Partido->MCD_local_assistance_id=$Asistencias[$i];
               $Partido->MCD_local_goal_id=$Goles[$i];

           }
           if($Posicion[$i]=="MC"){
               $Partido->MC_local_id=$UsuariosLocal[$i]->id;
               $Partido->MC_local_red_id=$Rojas[$i];
               $Partido->MC_local_yellow_id=$Amarillas[$i];
               $Partido->MC_local_assistance_id=$Asistencias[$i];
               $Partido->MC_local_goal_id=$Goles[$i];
           }
           if($Posicion[$i]=="MI"){
               $Partido->MI_local_id=$UsuariosLocal[$i]->id;
               $Partido->MI_local_red_id=$Rojas[$i];
               $Partido->MI_local_yellow_id=$Amarillas[$i];
               $Partido->MI_local_assistance_id=$Asistencias[$i];
               $Partido->MI_local_goal_id=$Goles[$i];
           }
           if($Posicion[$i]=="MD"){
               $Partido->MD_local_id=$UsuariosLocal[$i]->id;
               $Partido->MD_local_red_id=$Rojas[$i];
               $Partido->MD_local_yellow_id=$Amarillas[$i];
               $Partido->MD_local_assistance_id=$Asistencias[$i];
               $Partido->MD_local_goal_id=$Goles[$i];
           }
           if($Posicion[$i]=="MCO"){
               $Partido->MCO_local_id=$UsuariosLocal[$i]->id;
               $Partido->MCO_local_red_id=$Rojas[$i];
               $Partido->MCO_local_yellow_id=$Amarillas[$i];
               $Partido->MCO_local_assistance_id=$Asistencias[$i];
               $Partido->MCO_local_goal_id=$Goles[$i];
           }
           if($Posicion[$i]=="EI"){
               $Partido->EI_local_id=$UsuariosLocal[$i]->id;
               $Partido->EI_local_red_id=$Rojas[$i];
               $Partido->EI_local_yellow_id=$Amarillas[$i];
               $Partido->EI_local_assistance_id=$Asistencias[$i];
               $Partido->EI_local_goal_id=$Goles[$i];
           }
           if($Posicion[$i]=="ED"){
               $Partido->ED_local_id=$UsuariosLocal[$i]->id;
               $Partido->ED_local_red_id=$Rojas[$i];
               $Partido->ED_local_yellow_id=$Amarillas[$i];
               $Partido->ED_local_assistance_id=$Asistencias[$i];
               $Partido->ED_local_goal_id=$Goles[$i];
           }
           if($Posicion[$i]=="DI"){
               $Partido->DI_local_id=$UsuariosLocal[$i]->id;
               $Partido->DI_local_red_id=$Rojas[$i];
               $Partido->DI_local_yellow_id=$Amarillas[$i];
               $Partido->DI_local_assistance_id=$Asistencias[$i];
               $Partido->DI_local_goal_id=$Goles[$i];
           }
           if($Posicion[$i]=="DD"){
               $Partido->DD_local_id=$UsuariosLocal[$i]->id;
               $Partido->DD_local_red_id=$Rojas[$i];
               $Partido->DD_local_yellow_id=$Amarillas[$i];
               $Partido->DD_local_assistance_id=$Asistencias[$i];
               $Partido->DD_local_goal_id=$Goles[$i];
           }
           if($Posicion[$i]=="DC"){
               $Partido->DC_local_id=$UsuariosLocal[$i]->id;
               $Partido->DC_local_red_id=$Rojas[$i];
               $Partido->DC_local_yellow_id=$Amarillas[$i];
               $Partido->DC_local_assistance_id=$Asistencias[$i];
               $Partido->DC_local_goal_id=$Goles[$i];
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
                $Partido->PO_visitor_red_id=$RojasVisitante[$i];
                $Partido->PO_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->PO_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->PO_visitor_goal_id=$GolesVisitante[$i];
                $Partido->PO_visitor_unbeaten_id=$UsuariosVisitante[$i];

            }
            if($Posicion[$i]=="DFC"){
                $Partido->DFC_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->DFC_visitor_red_id=$RojasVisitante[$i];
                $Partido->DFC_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->DFC_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->DFC_visitor_goal_id=$GolesVisitante[$i];
            }

            if($Posicion[$i]=="LTI"){
                $Partido->LTI_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->LTI_visitor_red_id=$RojasVisitante[$i];
                $Partido->LTI_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->LTI_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->LTI_visitor_goal_id=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="LTD"){
                $Partido->LTD_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->LTD_visitor_red_id=$RojasVisitante[$i];
                $Partido->LTD_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->LTD_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->LTD_visitor_goal_id=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="MCD"){

                $Partido->MCD_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->MCD_visitor_red_id=$RojasVisitante[$i];
                $Partido->MCD_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->MCD_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->MCD_visitor_goal_id=$GolesVisitante[$i];

            }
            if($Posicion[$i]=="MC"){
                $Partido->MC_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->MC_visitor_red_id=$RojasVisitante[$i];
                $Partido->MC_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->MC_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->MC_visitor_goal_id=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="MI"){
                $Partido->MI_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->MI_visitor_red_id=$RojasVisitante[$i];
                $Partido->MI_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->MI_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->MI_visitor_goal_id=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="MD"){
                $Partido->MD_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->MD_visitor_red_id=$RojasVisitante[$i];
                $Partido->MD_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->MD_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->MD_visitor_goal_id=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="MCO"){
                $Partido->MCO_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->MCO_visitor_red_id=$RojasVisitante[$i];
                $Partido->MCO_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->MCO_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->MCO_visitor_goal_id=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="EI"){
                $Partido->EI_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->EI_visitor_red_id=$RojasVisitante[$i];
                $Partido->EI_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->EI_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->EI_visitor_goal_id=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="ED"){

                $Partido->ED_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->ED_visitor_red_id=$RojasVisitante[$i];
                $Partido->ED_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->ED_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->ED_visitor_goal_id=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="DI"){
                $Partido->DI_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->DI_visitor_red_id=$RojasVisitante[$i];
                $Partido->DI_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->DI_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->DI_visitor_goal_id=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="DD"){
                $Partido->DD_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->DD_visitor_red_id=$RojasVisitante[$i];
                $Partido->DD_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->DD_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->DD_visitor_goal_id=$GolesVisitante[$i];
            }
            if($Posicion[$i]=="DC"){
                $Partido->DC_visitor_id=$UsuariosVisitante[$i]->id;
                $Partido->DC_visitor_red_id=$RojasVisitante[$i];
                $Partido->DC_visitor_yellow_id=$AmarillasVisitante[$i];
                $Partido->DC_visitor_assistance_id=$AsistenciasVisitante[$i];
                $Partido->DC_visitor_goal_id=$GolesVisitante[$i];
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


    }

    public function ReportarPartidoMetodo($id,$id2,$id3)
    {
      $Equipo1=ProTeam::find($id);
      $Equipo2=ProTeam::find($id2);
      $league=ProLeague::find($id3);



        return view('ReportarPartidoPro',['Equipo1'=>$Equipo1,'Equipo2'=>$Equipo2,'league'=>$league]);
    }

    public function buscarClub(){
        
        $Busqueda =  Input::get('BuscarInput');
        $Resultado = DB::table('clubesproequipos')->where('nombreequipo',$Busqueda)->first();
        
        
    }

}
