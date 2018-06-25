<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Enfrentamiento extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'enfrentamientos';
    protected $primaryKey = 'idEnfrentamiento';

    protected $fillable = [
        'idEnfrentamiento', 'equipo1', 'equipo2', 'editor', 'bo5'
    ];
}
