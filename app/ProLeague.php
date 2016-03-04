<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProLeague extends Model
{
       protected $fillable = [
        'name',
        'status',
        'points',
        'JJ',
        'JG',
        'JE',
        'JP',
        'GF',
        'GC',
    ];

    public function proTeams(){
        return $this->belongsToMany('App\ProTeam')
            ->withPivot('status');
    }
    
    public function proLeagues(){
         return $this->belongsToMany('App\ProLeague')
            ->withPivot('status');
     
    }
    
    public function AddLeagues(){

        return $this->belongsToMany('App\ProLeague','pro_league_pro_team')->withPivot('status');;
    
    
    }
    public function proLeaguesId(){
        return $this->id;
    }
    
    
       public function IdProTeams(){
       
          return $this->hasMany('App\ProTeam','id','pro_team_id');
    
    }
    
    
}
