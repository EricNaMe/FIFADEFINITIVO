<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeagueProCalendar extends Model
{

    protected $fillable = [
        'local_id',
        'visitor_id',
        'league_id',
        'jornada',
    ];
}
