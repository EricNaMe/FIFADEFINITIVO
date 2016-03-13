<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Http\Request;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, ValidatesRequests;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    //ELIMINAR NAME Y STATE
    
    protected $fillable = ['name', 'email', 'password','user_name','position','gamertag','state','quote','platform'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];



    public function team(){
        return $this->belongsToMany('App\Team')
        ->withPivot('status');
    }

    public function proTeams(){
        return $this->belongsToMany('App\ProTeam')
            ->withPivot('status', 'position');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function playerName(){
        return $this->user_name.' ';
    }
    
    public function playerGamertag(){
        return $this->gamertag;
    }
    
}
