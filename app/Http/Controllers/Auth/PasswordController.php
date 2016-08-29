<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;
use App\User;
use Auth;

use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getReset(Request $request, $token = null)
    {
        return $this->showResetForm($request, $token);
    }

    public function showResetForm(Request $request, $token = null)
    {
        if (is_null($token)) {
            return $this->getEmail();
        }

        $email = $request->input('email');

        if (property_exists($this, 'resetView')) {
            return view($this->resetView)->with(compact('token', 'email'));
        }

        if (view()->exists('auth.passwords.reset')) {
            return view('auth.passwords.reset')->with(compact('token', 'email'));
        }

        return view('auth.reset')->with(compact('token', 'email'));
    }


    public function postReset3(Request $request)
    {


        return "HEY";

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


        return $user;

            $this->resetPassword($user, $password);

        return redirect()->back()->withErrors("Email Cambió correctamente!!!");

    }

    protected function getResetValidationRulesSobreCarga()
    {
        return [

            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }


}
