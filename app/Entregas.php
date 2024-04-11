<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entregas extends Model
{
    protected $table = 'entregas';

    protected $fillable = [
        'id_compra',
        'fecha_entrega',
        'num_tel'
    ];

    public $timestamps = false;
}
