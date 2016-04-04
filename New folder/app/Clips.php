<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clips extends Model
{

    protected $table = 'clips_comment';
    protected $fillable = [
        'message',
        'user_id',
    ];  //

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
