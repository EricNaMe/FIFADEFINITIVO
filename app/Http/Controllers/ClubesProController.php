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

            $usuariosLocal=User::find($usuarioLocal);
            $usuariosVisitante=User::find($usuarioVisitante);

            $EquipoLocal=ProTeam::find($EquipoLoc);
            $EquipoVisitante=ProTeam::find($EquipoVis);






        return view('/ReportarResultadosPro',['usuariosLocal'=>$usuariosLocal,'usuariosVisitante'=>$usuariosVisitante,'EquipoLocal'=>$EquipoLocal,'EquipoVisitante'=>$EquipoVisitante]);

    }





    public function ReportarResultadosMetodo(){

        $VectorUsuariosLocal=Input::get('VectorUsuarioLocal');


        $Partido=new ProMatch;
        $UsuariosLocal=User::find($VectorUsuariosLocal);

        $Goles=Input::get('GolesSelect');
        $Posicion=Input::get('PosicionSelect');

        $Amarillas=Input::get('AmarillasSelect');
        $Rojas=Input::get('RojasSelect');
        $Asistencias=Input::get('AsistenciasSelect');
        $radio=Input::get('optradio');






       for($i=0;$i<sizeof($Goles);$i++){

           $UsuariosLocal[$i]->goals+=$Goles[$i];

           if($Posicion[$i]=="PO"){
               $Partido->PO_local_id=$UsuariosLocal[$i]->id;
           }
           if($Posicion[$i]=="MCO"){
               $Partido->MCO_local_id=$UsuariosLocal[$i]->id;
           }
           $UsuariosLocal[$i]->yellow_card+=$Amarillas[$i];
           $UsuariosLocal[$i]->red_card+=$Rojas[$i];
           $UsuariosLocal[$i]->assistance+=$Asistencias[$i];
           $UsuariosLocal[$i]->pro_JJ++;
           $LocalUser[]=$UsuariosLocal[$i]->id;


           $UsuariosLocal[$i]->update();

        }
        $Partido->team_local_id=1;
        $Partido->team_visitor_id=2;
        $Partido->save();




        $VectorUsuariosVisitante=Input::get('VectorUsuarioVisitante');

        $UsuariosVisitante=User::find($VectorUsuariosVisitante);

        $GolesVisitante=Input::get('GolesSelectVisitante');

        $PosicionVisitante=Input::get('PosicionSelectVisitante');
        $AmarillasVisitante=Input::get('AmarillasSelectVisitante');
        $RojasVisitante=Input::get('RojasSelectVisitante');
        $AsistenciasVisitante=Input::get('AsistenciasSelectVisitante');
        $radio=Input::get('optradio');



        for($i=0;$i<sizeof($GolesVisitante);$i++){

            $UsuariosVisitante[$i]->goals+=$GolesVisitante[$i];
            $UsuariosVisitante[$i]->yellow_card+=$AmarillasVisitante[$i];
            $UsuariosVisitante[$i]->red_card+=$RojasVisitante[$i];
            $UsuariosVisitante[$i]->assistance+=$AsistenciasVisitante[$i];
            $UsuariosVisitante[$i]->pro_JJ++;


            $UsuariosVisitante[$i]->update();
        }






    }

    public function ReportarPartidoMetodo($id,$id2)
    {
      $Equipo1=ProTeam::find($id);
      $Equipo2=ProTeam::find($id2);

        return view('ReportarPartidoPro',['Equipo1'=>$Equipo1,'Equipo2'=>$Equipo2]);
    }

    public function buscarClub(){
        
        $Busqueda =  Input::get('BuscarInput');
        $Resultado = DB::table('clubesproequipos')->where('nombreequipo',$Busqueda)->first();
        
        
    }

}
