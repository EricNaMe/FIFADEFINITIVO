<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{

    public function teams(){
        return $this->belongsToMany('App\Team','team_leagues')
            ->withPivot('status');
    }




}
