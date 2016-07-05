<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EditarJornada extends Model
{


    protected $table = 'jornada_editar';
    protected $fillable = [
        'fecha_jornada'
    ];
}
