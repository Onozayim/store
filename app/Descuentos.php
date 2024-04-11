<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Descuentos extends Model
{
    protected $table = 'descuentos';

    protected $filleble = [
        'id_producto',
        'porcentaje'
    ];

    public $timestamps = false;
}
