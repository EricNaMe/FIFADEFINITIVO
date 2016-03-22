<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProTeam extends Model
{
    protected $fillable = [
        'name',
        'quote',
        'state',
        'status',
        'points',
    ];

    public function users(){
        return $this->belongsToMany('App\User')
            ->withPivot('status', 'position');
    }
    
    
      public function proLeague(){
        return $this->belongsToMany('App\ProLeague')
            ->withPivot('status');
    }
    
     public function proCup(){
        return $this->belongsToMany('App\ProCup')
            ->withPivot('status');
    }
    
    
  /*    public function proLeague2(){
        return $this->belongsTo('App\ProLeague')
            ->withPivot('status');
    }*/
    
       public function IdUsers(){
       
          return $this->hasMany('App\User','id','user_id');
    
    }
}
