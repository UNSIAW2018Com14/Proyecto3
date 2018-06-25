<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Bo5 extends Eloquent{

    protected $connection = 'mongodb';
    protected $collection = 'bo5s';
    protected $primaryKey = 'idBo5';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'idBo5', 'dia', 'nickIntegrante1', 'nickIntegrante2', 'Resultado', 'comentarios'
    ];


}