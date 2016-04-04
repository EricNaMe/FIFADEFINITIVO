<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URLVideos extends Model
{
    protected $table = 'url_youtube';
    protected $fillable = [
        'descripcion',
        'url',
        'id',
    ];


    //
}
