<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProCup extends Model
{
      protected $fillable = [
        'name',
        'status',
        'winner',
    ];
    
       public function proTeams(){
        return $this->belongsToMany('App\ProTeam')
            ->withPivot('status')
            ->withTrashed();
    }
    
       public function IdProTeams(){
       
          return $this->hasMany('App\ProTeam','id','pro_team_id')
              ->withTrashed();
    
    }
}
