<?php

namespace App;

use App\Exceptions\PermissionException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProTeam extends Model
{
    use \Nicolaslopezj\Searchable\SearchableTrait;

    protected $fillable = [
        'name',
        'quote',
        'state',
        'status',
        'points',
    ];

    protected $searchable = [
        'columns' => [
            'name' => 1,
        ],
    ];

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

    public function proCup()
    {
        return $this->belongsToMany('App\ProCup')
            ->withPivot('status');
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



    public function canAddUser(User $user)
    {
        if($this->users()
            ->whereUserId($user->id)
            ->first())
        {
            throw new PermissionException(
                'No se puede agregar al club, ya se encuentra incluido'
            );
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
        $userRequested = $this->users()->whereUserId($user->id)->first();
        if($userRequested
            && $userRequested->pivot->status == 'pending')
        {
            $this->users()->updateExistingPivot($user->id,
                [
                    'status' => 'accepted'
                ]);
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



}
