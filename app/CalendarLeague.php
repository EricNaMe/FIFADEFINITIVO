<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarLeague extends Model
{
    protected $table = 'calendar_league';

    protected $fillable=[
        'local_id',
        'visitor_id',
        'league_id',
        'match_id',
        'jornada',
        'status',
    ];

    public function localTeam()
    {
        return $this->belongsTo('App\Team','local_id');
    }

    public function visitorTeam()
    {
        return $this->belongsTo('App\Team','visitor_id');
    }

    public function League()
    {
        return $this->belongsTo('App\League');
    }

    public function match()
    {
        return $this->belongsTo('App\MatchLeague','match_id');
    }



}
