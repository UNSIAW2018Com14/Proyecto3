<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Instancia extends Eloquent

{
    protected $connection = 'mongodb';
    protected $collection = 'instancias';
    protected $primaryKey = 'idInstancia';

    protected $fillable = [
        'idInstancia', 'nombre', 'fechaInicio', 'fechaFin', 'enfrentamientos'
    ];
}
