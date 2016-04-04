<?php

namespace App\Http\Controllers;

use App\ProTeam;
use App\Team;
use Illuminate\Http\Request;
use Input;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class User extends Controller
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

   /* public function save(Request $request){



        $post = $request->all();
        $data=array(
            'usuario'=>$post['UsuarioInput'],
            'posicion'=>$post['PosicionSelect'],
            'gamertag'=>$post['GamertagInput'],
            'estado'=>$post['EstadoSelect'],
            'lema'=>$post['LemaInput'],
        );

        $ch=DB::table(users)->insert($data);
        if($ch>0){
            return redirect('EditarPerfil');
        }



    } */

    public function EditarPerfilUsuario(){
        //$id = Input::get('InputIdEditar');
        //if($request->user()) { // no estoy seguro si esto funciona
        if(Auth::check()){ // este si lo he probado
            //$user=User::find($id); // error! si haces esto de que te sirve que el usuario esté logueado, nunca compruebas que sea el usuario logueado alque estas modificando, si tu usuario ya esta loggeado ya tienes su instancia

            $user = Auth::user();
            $user->usuario = Input::get('UsuarioInput');
            $user->posicion =  Input::get('PosicionInput');
            $user->gamertag = Input::get('GamertagInput');
            $user->estado  = Input::get('EstadoInput');
            $user->lema = Input::get('LemaInput');

           
           
            
            /*tus nombre sde variables de los input me parecen redudantes, si manejaras el mismo nombre de los inputs que de los campos de la base de datos sería así de sencillo actualizar los datos de un usuario

            Auth::user()->update(Input::all()); // Listo! nada mas necesitarías, pero necesitas el mismo nombre en tus formularios que en tus columnas de la tabla
*/

/*
            if ($user->update()) {
                return redirect()->back();
            }// y que pasaría si falla? mejor haz esto
*/

            if($user->update){
                return redirect()->back();
            } else {
                return redirect()->back()->withErrors("Algo falló!!!");
            }
        }

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


    public function hola(){
        $user = \App\User::create([
            'name' => 'Duck',
            'quote' => 'Ducks are great!',
        ]);

        $team = \App\Team::create([
            'name' => 'Duck Team',
            'points' => 23423,
            'user_id' => $user->id,
        ]);

        $proTeam = \App\ProTeam::create([
            'name' => 'Pro Team',
            'quote' => 'Bolillous',
        ]);


    }
}

