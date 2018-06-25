<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Integrante extends Eloquent{

    protected $connection = 'mongodb';
    protected $collection = 'integrantes';
    protected $primaryKey = 'nickname';

    protected $foreign_key = 'nickname';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido', 'nickname', 'DNI', 'edad', 'sexo', 'foto', 'cartaFavorita', 'claseFavorita', 'nombreEquipo'
    ];
}
