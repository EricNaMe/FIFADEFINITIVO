<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{

    public function teams(){
        return $this->belongsToMany('App\Team','team_leagues')
            ->withPivot('status');
    }



    public function Calendar()
    {
        return $this->hasMany('App\CalendarLeague');
    }

    
   
    
    public function generateCalendar()
    {
        $teams = $this->teams->toArray();

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
                CalendarLeague::create([
                    'local_id' => $match['home']['id'],
                    'visitor_id' => $match['away'] ? $match['away']['id'] : null,
                    'league_id' => $this->id,
                    'jornada' => $jornada+1,
                ]);
            }
        }
    }

    public function generateAndSaveCalendar()
    {
        if($this->Calendar()->count() == 0)
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
