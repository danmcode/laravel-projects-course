<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Configuracion para dar a conocer las relaciones a los usuarios
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Función para que todos los datos que se obtengan al
     * momento de realizar en una consulta tengan un
     * formato especifico
     */
    public function getGetNameAttribute()
    {

        //Si queremos que todos los datos se muestren UPPER
        // return strtoupper($this->name);
        return ucfirst($this->name);
    }

    /**
     * Función para que todos los datos que se guarden al
     * momento de realizar en una consulta tengan un
     * formato especifico
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }
}