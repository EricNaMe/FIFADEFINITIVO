<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchLeague extends Model
{
    protected $table = 'match_league';//

    protected $fillable=[
        'team_local_id',
        'team_visitor_id',
        'league_id',
        'local_score',
        'visitor_score',

    ];

}
