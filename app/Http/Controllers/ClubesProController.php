<?php

namespace App\Http\Controllers;

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



    public function InsertarClub(){
        if(Auth::check()){ // este si lo he probado
            //$user=User::find($id); // error! si haces esto de que te sirve que el usuario esté logueado, nunca compruebas que sea el usuario logueado alque estas modificando, si tu usuario ya esta loggeado ya tienes su instancia
            $club = new proTeam;
             

            $club->name =  Input::get('nombreequipo');
            $club->quote = Input::get('lema');
            $club->state  = Input::get('EstadoSelect');
            $club->save();
        $club->users()->attach(Auth::user()->id,['status'=>'Accepted','position' => 'DT']);
              
            

       //          $file = $request->file('file');
       
       //obtenemos el nombre del archivo
     
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
   //    \Storage::disk('local')->put('Hola',  \File::get($file));


            /*tus nombre sde variables de los input me parecen redudantes, si manejaras el mismo nombre de los inputs que de los campos de la base de datos sería así de sencillo actualizar los datos de un usuario

            Auth::user()->update(Input::all()); // Listo! nada mas necesitarías, pero necesitas el mismo nombre en tus formularios que en tus columnas de la tabla
*/

            /*
                        if ($user->update()) {
                            return redirect()->back();
                        }// y que pasaría si falla? mejor haz esto
            */

            if($club->save()){
                return redirect('CLUBESPRO');
            } else {
                return redirect()->back()->withErrors("Algo falló!!!");
            }

        }
    }


    public function AltaEnClub(){
        if(Auth::check()){ // este si lo he probado
            //$user=User::find($id); // error! si haces esto de que te sirve que el usuario esté logueado, nunca compruebas que sea el usuario logueado alque estas modificando, si tu usuario ya esta loggeado ya tienes su instancia

            $posicion=  Input::get('PosicionSelect');
            $idclub=Input::get('IdClub');
            $proTeam=ProTeam::find($idclub);
            
            
 $proTeam->users()->attach(Auth::user()->id,['status'=>'Accepted','position' => $posicion]);



            if($proTeam->save()){
                 return view('ClubDetalles', ['proTeam' => $proTeam]);
            } else {
                return redirect()->back()->withErrors("Algo falló!!!");
            }


        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function encontrarClub($id){

        $proTeam=ProTeam::find($id);

         return view('ClubDetalles', ['proTeam' => $proTeam]);

    }

    public function PlantillaClub($id){

        $proTeam=ProTeam::find($id);

        return view('PlantillaPro', ['proTeam' => $proTeam]);

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



    public function encontrarClubAlta($id){


        $club=  ProTeam::find($id);

        return view('UnirteClub', ['club' => $club]);


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
