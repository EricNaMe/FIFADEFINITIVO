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
use DB;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, ValidatesRequests;
    use \Nicolaslopezj\Searchable\SearchableTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

   protected $searchable = [
        'columns' => [
            'user_name' => 1,
        ],
    ];
   
   public static $proLeaguePivotData = [
        'JJ','JG','JE','JP','GF','GC','points','assistance',
       'yellow_card','red_card','goals','best_player','gk_unbeaten','defence_unbeaten'
    ];
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

    public function proMatch(){
        return $this->belongsToMany('App\ProMatch','pro_user_match')
            ->withPivot('local','position_id','goals','yellow_cards','red_cards');
    }

    public function proTeams(){
        return $this->belongsToMany('App\ProTeam')
            ->withPivot('status', 'position')
            ->withTrashed();
    }
    
    public function proLeagues(){
        return $this->belongsToMany('App\ProLeague')
            ->withPivot('status', 'JJ','JG','JE','JP','GF','GC','points',
                    'yellow_card','red_card','goals',
                    'best_player','gk_unbeaten','defence_unbeaten');
           
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

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function transfer()
    {
        return $this->hasMany('App\Transfer');
    }

    public function isInAnyTeam()
    {
        return $this->proTeams()
            ->wherePivot('status','accepted')->first() ? true : false;
    }

    public function hasBeenInAnyTeam()
    {
        return $this->transfer()
            ->first() ? true : false;
    }
    
    public function getAvatar(){
        return 'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($this->gamertag).'/avatarpic-l.png';
    }
    
     public function getAvatarBody(){
        return 'https://avatar-ssl.xboxlive.com/avatar/'.rawurlencode($this->gamertag).'/avatar-body.png';
        
    }
    
      public function proLeagueEstatistics()
    {
        return $this->belongsToMany('App\ProLeague')
            ->withPivot(self::$proLeaguePivotData);
    }
    
    public function isDT(){
        
       if($this->id==Auth::user()->proTeams[0]->id){
           
           
       }
    }

    public function existingInPivotUserLeague($id_liga, $id_usuario){

        return is_null(
            DB::table('pro_league_user')
                ->where('user_id', $id_usuario)
                ->where('pro_league_id', $id_liga)
                ->first());
    }
    
}
