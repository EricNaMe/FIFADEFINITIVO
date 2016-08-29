<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProTeam;
use Input;
use DB;
use App\Comment;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Controllers\Controller;

class PerfilController extends Controller {

    use ResetsPasswords;
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
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

    public function EditarPerfilUsuario() {
        //$id = Input::get('InputIdEditar');
        //if($request->user()) { // no estoy seguro si esto funciona
        if (Auth::check()) { // este si lo he probado
            //$user=User::find($id); // error! si haces esto de que te sirve que el usuario esté logueado, nunca compruebas que sea el usuario logueado alque estas modificando, si tu usuario ya esta loggeado ya tienes su instancia
            $user = Auth::user();


            $user->position = Input::get('PosicionSelect');
            $user->gamertag = Input::get('GamertagInput');

            $user->platform = Input::get('ConsolaSelect');
            $user->quote = Input::get('LemaInput');




            /* tus nombre sde variables de los input me parecen redudantes, si manejaras el mismo nombre de los inputs que de los campos de la base de datos sería así de sencillo actualizar los datos de un usuario

              Auth::user()->update(Input::all()); // Listo! nada mas necesitarías, pero necesitas el mismo nombre en tus formularios que en tus columnas de la tabla
             */

            /*
              if ($user->update()) {
              return redirect()->back();
              }// y que pasaría si falla? mejor haz esto
             */

            if ($user->update()) {
                return redirect('Inicio');
            } else {
                return redirect()->back()->withErrors("Algo falló!!!");
            }
        }
        return redirect()->back();
    }

    public function EncontrarJugador($id) {


        $user = User::find($id);


        if (Auth::check()) {

            if (!$user->isInAnyTeam()) {
                if (Auth::user()->isInAnyTeam()) {
                    $EquipoId = Auth::user()->proTeams[0]->id;
                    $EquipoUsuarioAutenticado = ProTeam::find($EquipoId);
                    $UsuarioDT = $EquipoUsuarioAutenticado->getDT();
                    $UsuarioDT2=$EquipoUsuarioAutenticado->getDT2();
                    if ($UsuarioDT->id == Auth::user()->id || $UsuarioDT2->id == Auth::user()->id ) {
                        $BanderaUsuario = 1;
                        return view('PerfilDetalles', [
                            'user' => $user,
                            'EquipoUsuarioAutenticado' => $EquipoUsuarioAutenticado,
                            'UsuarioDT' => $UsuarioDT,
                            'UsuarioDT2'=> $UsuarioDT2,
                            'BanderaUsuario' => $BanderaUsuario]);
                    } else {
                        $BanderaUsuario = 2;
                        return view('PerfilDetalles', ['user' => $user, 'BanderaUsuario' => $BanderaUsuario]);
                    }
                } else {
                    $BanderaUsuario = 2;
                    return view('PerfilDetalles', ['user' => $user, 'BanderaUsuario' => $BanderaUsuario]);
                }
            } else {
                $BanderaUsuario = 2;
                return view('PerfilDetalles', ['user' => $user, 'BanderaUsuario' => $BanderaUsuario]);
            }
        } else {
            $BanderaUsuario = 2;
            return view('PerfilDetalles', ['user' => $user, 'BanderaUsuario' => $BanderaUsuario]);
        }
    }

    public function EncontrarJugadorClubes($id) {

        $user = User::find($id);

        return view('PerfilNoAutenticadoClub', ['user' => $user]);
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

    public function InicioReset(Request $request)
    {




        return $this->resetSobreCarga($request);
    }



    public function resetSobreCarga(Request $request)
    {



        $this->validate($request, $this->getResetValidationRulesSobreCarga());

        $credentials = $request->only(
            'email', 'password', 'password_confirmation'
        );
        $password=$request->input('password');
        $email=$request->input('email');


        try{
            $user_id = DB::table('users')->where('email', $email)->first()->id;
        }catch(\Exception $e){
            return redirect()->back()->withErrors('Email incorrecto!!!');
        }
        if(is_null($user_id)){
            return "Vacío";
        }

        $user=User::find($user_id);



        $this->resetPassword($user, $password);

        $comment=Comment::all();
        $users=User::all();

        return view('index',['comment' => $comment,'users'=>$users])->withErrors('Se Cambió la contraseña correctamente');

    }

    protected function getResetValidationRulesSobreCarga()
    {
        return [

            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }



}
