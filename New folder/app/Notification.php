<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function notifiable()
    {
        return $this->morphTo();
    }

    public function getMessage()
    {
        switch($this->type)
        {
            case "request":
                return "Alguien ha solicitado que lo unas a tu equipo ".$this->notifiable->name.",".
                "por favor revisa el estado de su autorización";
                break;
            case "request_confirmed":
                return "Han confirmado tu ingreso al equipo ".$this->notifiable->name;
                break;
            case "request_rejected":
                return "Han denegado tu ingreso al equipo ".$this->notifiable->name;
                break;
        }

    }

    public function getLink()
    {
        switch($this->type)
        {
            case "request":
            case "request_confirmed":
            case "request_rejected":
                return url('clubes-pro', [$this->notifiable->id,'plantilla']);
        }
    }

    public function getDeleteLink()
    {
        return url('notification', ['delete',$this->id]);
    }
}
