<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido extends Model
{
    //
  

    protected $fillable = [
        'nombre','categoria','descripcion','usuario',
        'val_pos','val_neg','estado','usuario'
    ];
}
