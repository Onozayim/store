<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $table = 'direcciones';

    protected $fillable = [
        'id_entrega',
        'pais',
        'cp',
        'colonia',
        'estado',
        'direccion'
    ];

    public $timestamps = false;
}
