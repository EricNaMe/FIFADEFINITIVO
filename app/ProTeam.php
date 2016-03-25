<?php

namespace App;

use App\Exceptions\PermissionException;
use Illuminate\Database\Eloquent\Model;

class ProTeam extends Model
{
    protected $fillable = [
        'name',
        'quote',
        'state',
        'status',
        'points',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')
            ->withPivot('status', 'position');
    }


    public function proLeague()
    {
        return $this->belongsToMany('App\ProLeague')
            ->withPivot('status');
    }

    public function proCup()
    {
        return $this->belongsToMany('App\ProCup')
            ->withPivot('status');
    }

    public function addPendingUser(User $user, $position)
    {
        $this->canAddUser($user);
        $this->users()->attach($user,
            [
                'status' => 'Pending',
                'position' => $position,
            ]);
    }

    public function canAddUser(User $user)
    {
        if($this->users()
            ->whereUserId($user->id)
            ->first())
        {
            throw new PermissionException('No se puede agregar al club');
        }
    }

}
