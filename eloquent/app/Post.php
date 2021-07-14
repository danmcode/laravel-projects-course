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

    /**
     * Función para que todos los datos que se obtengan al
     * momento de realizar en una consulta tengan un
     * formato especifico
     */
    public function getGetTitleAttribute()
    {

        //Si queremos que todos los datos se muestren UPPER
        //return strtoupper($this->title);
        return ucfirst($this->title);
    }

    /**
     * Función para que todos los datos que se guarden al
     * momento de realizar en una consulta tengan un
     * formato especifico
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }


}