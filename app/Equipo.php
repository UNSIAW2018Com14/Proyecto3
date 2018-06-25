<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Equipo extends Eloquent{

    protected $connection = 'mongodb';
    protected $collection = 'equipos';
    protected $primaryKey = 'nombre';
    protected $foreign_key = 'nickname';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'institucion', 'icono', 'integrantes'
    ];

    public function get_integrantes () {
        return $this->hasMany('App\Integrante', 'nickname','integrantes');
    }

}