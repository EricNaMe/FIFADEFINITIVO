<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{

    protected $fillable = [
        'user_id',
        'down_pro_team_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function downProTeam()
    {
        return $this->belongsTo('App\ProTeam','down_pro_team_id')
            ->withTrashed();
    }

    public function upProTeam()
    {
        return $this->belongsTo('App\ProTeam','up_pro_team_id')
            ->withTrashed();
    }

    public static function completeTransferIfExists(User $user, ProTeam $proTeam)
    {
        $transfer = self::whereUserId($user->id)
            ->whereNull('up_pro_team_id')
            ->first();
        if($transfer)
        {
            $transfer->up_pro_team_id = $proTeam->id;
            $transfer->update();
        }
    }

}
