<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cup extends Model
{
    //
    protected $fillable = [
        'name',
        'status',
        'winner',
    ];

    public function Teams(){
        return $this->belongsToMany('App\Team','team_cups')
            ->withPivot('status');
    }
}
