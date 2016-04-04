<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PerfilController extends Controller
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

    public function EditarPerfilUsuario(){
        //$id = Input::get('InputIdEditar');
        //if($request->user()) { // no estoy seguro si esto funciona
        if(Auth::check()){ // este si lo he probado
            //$user=User::find($id); // error! si haces esto de que te sirve que el usuario esté logueado, nunca compruebas que sea el usuario logueado alque estas modificando, si tu usuario ya esta loggeado ya tienes su instancia

            $user = Auth::user();
           
           
            $user->position =  Input::get('PosicionSelect');
            $user->gamertag = Input::get('GamertagInput');

            $user->platform  = Input::get('ConsolaSelect');
            $user->quote = Input::get('LemaInput');




            /*tus nombre sde variables de los input me parecen redudantes, si manejaras el mismo nombre de los inputs que de los campos de la base de datos sería así de sencillo actualizar los datos de un usuario

            Auth::user()->update(Input::all()); // Listo! nada mas necesitarías, pero necesitas el mismo nombre en tus formularios que en tus columnas de la tabla
*/

            /*
                        if ($user->update()) {
                            return redirect()->back();
                        }// y que pasaría si falla? mejor haz esto
            */

            if($user->update()){
                return redirect('Inicio');
            } else {
                return redirect()->back()->withErrors("Algo falló!!!");
            }

        }
        return redirect()->back();
    }

    
    
    
    public function EncontrarJugador($id) {
        
          $user=User::find($id);

         return view('PerfilDetalles', ['user' => $user]);
        
    }
    
      public function EncontrarJugadorClubes($id) {
        
          $user=User::find($id);

         return view('PerfilNoAutenticadoClub', ['user' => $user]);
        
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
