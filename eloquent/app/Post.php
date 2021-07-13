<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Configuracion para dar a conocer las relaciones a los usuarios
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}