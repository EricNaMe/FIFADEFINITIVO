<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{

   // use SoftDeletes;

    protected $fillable = [
        'name',
        'points',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function users(){
        return $this->belongsToMany('App\User')
            ->withPivot('status');
    }

    public function Cup(){
        return $this->belongsToMany('App\Cup','team_cups')
            ->withPivot('status');
    }

    public function League(){
        return $this->belongsToMany('App\League','team_leagues')
            ->withPivot('status');
    }
    
     public function Team_user(){
        return $this->belongsToMany('App\User','team_user')
            ->withPivot('status');
    }


}
