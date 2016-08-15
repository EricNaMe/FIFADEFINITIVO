<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekUser extends Model
{
    protected $table = 'pro_user_week';
    protected $fillable = ['week_id', 'user_id', 'league_id','position','position_id','defence_unbeaten','gk_unbeaten','goals'];

    public $timestamps=false;
    public function users()
    {
        return $this->belongsToMany('App\User');

    }

    public function user()
    {
        return $this->belongsTo('App\User');

    }
}