<?php

namespace App;

use App\Exceptions\PermissionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Nicolaslopezj\Searchable\SearchableTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProTeam extends Model
{
    use SearchableTrait;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'quote',
        'state',
        'status',
        'points',
        'JJ',
        'JG',
        'JE',
        'JP',
        'GF',
        'GC',
    ];

    protected $searchable = [
        'columns' => [
            'name' => 1,
        ],
    ];

    public static $proLeaguePivotData = [
        'JJ','JG','JP','JE','GF','GC','points',
    ];

    protected $dates = ['deleted_at'];
    protected $softDelete = true;

    public function users()
    {
        return $this->belongsToMany('App\User')
            ->withPivot('status', 'position');
    }
      
    public function notifications()
    {
        return $this->morphMany('App\Notification', 'notifiable');
    }

    public function proLeague()
    {
        return $this->belongsToMany('App\ProLeague')
            ->withPivot('status');
    }

    public function proLeagueEstatistics()
    {
        return $this->belongsToMany('App\ProLeague')
            ->withPivot(self::$proLeaguePivotData);
    }

    public function proCup()
    {
        return $this->belongsToMany('App\ProCup')
            ->withPivot('status');
    }

    public function transferUp()
    {
        return $this->hasMany('App\Transfer','up_pro_team_id');
    }

    public function transferDown()
    {
        return $this->hasMany('App\Transfer','down_pro_team_id');
    }

    public function getDT()
    {
        return $this->users()
            ->wherePivot('position','DT')
            ->first();
    }

    public function saveImage(UploadedFile $file)
    {
        $image = \Image::make($file);
        $image->fit(200,200);
        $image->save('images/clubes-pro/'.$this->id.'_md');
        $image->fit(50,50);
        $image->save('images/clubes-pro/'.$this->id.'_sm');
    }

    public function getImageUrl($size = 'sm')
    {
        return url('images/clubes-pro/',[$this->id.'_'.$size]);
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

    public function sendPendingUserNotification()
    {
        $notification = new Notification();
        $notification->type = "request";
        $notification->user()->associate($this->getDT());
        $this->notifications()->save($notification);
    }

    public function sendAcceptedUserNotification(User $user)
    {
        $notification = new Notification();
        $notification->type = "request_confirmed";
        $notification->user()->associate($user);
        $this->notifications()->save($notification);
    }

    public function sendRejectedUserNotification(User $user)
    {
        $notification = new Notification();
        $notification->type = "request_rejected";
        $notification->user()->associate($user);
        $this->notifications()->save($notification);
    }
    
     public function sendInvitationtoUserNotification(User $user)
    {
        $notification = new Notification();
        $notification->type = "request_invitation";
        $notification->user()->associate($user);
        $this->notifications()->save($notification);
    }



    public function canAddUser(User $user)
    {
        if(Auth::check()) {
            if ($this->users()
                ->whereUserId($user->id)
                ->first()
            ) {
                throw new PermissionException(
                    'No se puede agregar al club, ya se encuentra incluido'
                );
            }

            if ($user->isInAnyTeam()) {
                throw new PermissionException(
                    'Ya se encuentra en otro club'
                );
            }
           /* var_dump($user->hasBeenInAnyTeam());
            dd($user->toArray());*/

            if($user->hasBeenInAnyTeam() && $this->inscriptions_locked){
                throw new PermissionException(
                    'Ya has estado en otro club, y el administrador
                    de este club ha bloqueado las altas de usuarios transferidos'
                );
            }
        }

    }

    public function canAuthorizeUserRequest(User $user)
    {
        $dt = $this->getDT();
        if(!$dt ||
            $dt->id != $user->id)
        {
            throw new PermissionException(
                'Solo el DT del equipo puede authorizar la entrada al mismo'
            );
        }
    }

    public function authorizeUserRequest(User $user)
    {
        $this->canAuthorizeUserRequest(Auth::user());
        if($user->isInAnyTeam())
        {
            throw new PermissionException(
                'Ya se encuentra en otro club'
            );
        }
        $userRequested = $this->users()->whereUserId($user->id)->first();
        if($userRequested
            && $userRequested->pivot->status == 'pending')
        {
            $this->users()->updateExistingPivot($user->id,
                [
                    'status' => 'accepted'
                ]);

            Transfer::completeTransferIfExists($user,$this);
            $this->sendAcceptedUserNotification($user);
        }
        else
        {
            throw new PermissionException(
                'Hubo un error al tratar de autorizar el usuario'
            );
        }
    }

    public function rejectUserRequest(User $user)
    {
        $this->canAuthorizeUserRequest(Auth::user());
        $userRequested = $this->users()->whereUserId($user->id)->first();
        if($userRequested
            && $userRequested->pivot->status == 'pending')
        {
            $this->users()->updateExistingPivot($user->id,
                [
                    'status' => 'rejected'
                ]);
            $this->sendRejectedUserNotification($user);
        }
        else
        {
            throw new PermissionException(
                'Hubo un error al tratar de denegar el usuario'
            );
        }
    }

    public function downUser(User $user)
    {
        $user_dt =$this->getDT();
        $this->users()->detach($user->id);
       
        if($user_dt->id == $user->id)
        {
            if($new_dt = $this->users()->wherePivot('status','accepted')->first())
            {
                $this->users()->updateExistingPivot(
                    $new_dt->id ,
                    ['position' => 'dt']
                );
            }
            else
            {
                \Log::info("Deleted");
                $this->delete();
            }
        }

        Transfer::create([
            'user_id' => $user->id,
            'down_pro_team_id' => $this->id,
        ]);
    }
    
    
       public function downUserPorDT(User $user)
    {
        $user_dt =$this->getDT();
        $this->users()->detach($user->id);
        $this->sendRejectedUserNotification($user);
        if($user_dt->id == $user->id)
        {
            if($new_dt = $this->users()->wherePivot('status','accepted')->first())
            {
                $this->users()->updateExistingPivot(
                    $new_dt->id ,
                    ['position' => 'dt']
                );
            }
            else
            {
                \Log::info("Deleted");
                $this->delete();
            }
        }

        Transfer::create([
            'user_id' => $user->id,
            'down_pro_team_id' => $this->id,
        ]);
    }

    public function isInTeamStatus( $user)
    {
        if(!isset($user))
        {
            return false;
        }
        $existUser = $this->users()
            ->whereUserId($user->id)
            ->first();

        return $existUser?$existUser->pivot->status:false;
    }

    public function lockInscriptions()
    {
        $this->inscriptions_locked = true;
        $this->save();
    }

    public function unlockInscriptions()
    {
        $this->inscriptions_locked = false;
        $this->save();
    }

}
