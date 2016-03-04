<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clubesproequipo extends Model
{
    //
    
    protected $fillable = ['nombreequipo','lema','estado','po','dfc','lti','ltd','mcd','mc','mi','md','mco','ei','dd','dc','dt','banca1','banca2','puntos','JJ','JG','JE','JP','GF','GC'];

    
     public function user(){
          return $this->hasMany('App\User','id','dt');
    }
    
     public function medio(){
          return $this->hasMany('App\User','id','mco');
    }

    public function dc(){
        return $this->hasMany('App\User','id','dc');
    }
    
}
