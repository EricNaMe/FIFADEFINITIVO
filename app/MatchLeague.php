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
    
      public function localTeam()
    {
        return $this->belongsTo('App\Team','team_local_id')
            ->withTrashed();
    }

    public function visitorTeam()
    {
        return $this->belongsTo('App\Team','team_visitor_id')
            ->withTrashed();
    }

    public function League()
    {
        return $this->belongsTo('App\League','league_id');
    }

}
