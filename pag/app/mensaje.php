<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mensaje extends Model
{
    //
    protected $fillable = [
        'idchat','idmensaje','texto','usuario1',
        'id_env','usuario2'
    ];


}
