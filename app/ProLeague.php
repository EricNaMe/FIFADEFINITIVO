<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProLeague extends Model
{
       protected $fillable = [
        'name',
        'status',
        'points',
        'JJ',
        'JG',
        'JE',
        'JP',
        'GF',
        'GC',
        'number_match',
    ];

    public function proTeams(){
        return $this->belongsToMany('App\ProTeam')
            ->withPivot('status');
    }
    
    public function proLeagues(){
         return $this->belongsToMany('App\ProLeague')
            ->withPivot('status');
     
    }
    
    public function AddLeagues(){

        return $this->belongsToMany('App\ProLeague','pro_league_pro_team')->withPivot('status');;
    
    
    }
    public function proLeaguesId(){
        return $this->id;
    }
    
    
       public function IdProTeams(){
       
          return $this->hasMany('App\ProTeam','id','pro_team_id');
    
    }

    public function proCalendar()
    {
        return $this->hasMany('App\LeagueProCalendar');
    }

    public function generateCalendar()
    {

        $teams = $this->proTeams->toArray();

        if (count($teams)%2 != 0){
            array_push($teams,null);
        }
        $away = array_splice($teams,(count($teams)/2));
        $home = $teams;
        for ($i=0; $i < count($home)+count($away)-1; $i++)
        {
            for ($j=0; $j<count($home); $j++)
            {
                $round[$i][$j]["home"]=$home[$j];
                $round[$i][$j]["away"]=$away[$j];
            }
            if(count($home)+count($away)-1 > 2)
            {
                $s = array_splice( $home, 1, 1 );
                $slice = array_shift( $s  );
                array_unshift($away,$slice );
                array_push( $home, array_pop($away ) );
            }
        }
        return $round;
    }

    public function saveCalendar(Array $weekMatches){
        foreach($weekMatches as $jornada => $weekMatch)
        {
            foreach($weekMatch as $match)
            {
                LeagueProCalendar::create([
                    'local_id' => $match['home']['id'],
                    'visitor_id' => $match['away'] ? $match['away']['id'] : null,
                    'pro_league_id' => $this->id,
                    'jornada' => $jornada+1,
                ]);
            }
        }
    }

    public function generateAndSaveCalendar()
    {
        if($this->proCalendar()->count() == 0)
        {
            \DB::transaction(function(){
                $calendar = $this->generateCalendar();
                $this->saveCalendar($calendar);
            });
            return true;
        }
        else
        {
            return false;
        }

    }
}
