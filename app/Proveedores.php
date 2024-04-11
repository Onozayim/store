<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'num_tel'
    ];

    public $timestamps = false;
}
