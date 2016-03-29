<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeagueProCalendar extends Model
{

    protected $fillable = [
        'local_id',
        'visitor_id',
        'pro_league_id',
        'jornada',
    ];

    public function localProTeam()
    {
        return $this->belongsTo('App\ProTeam','local_id');
    }

    public function visitorProTeam()
    {
        return $this->belongsTo('App\ProTeam','visitor_id');
    }

    public function proLeague()
    {
        return $this->belongsTo('App\ProLeague');
    }

    public function matchProTeam()
    {
        return $this->belongsTo('App\ProMatch','match_id');
    }
}
