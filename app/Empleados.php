<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'nombre',
        'num_tel',
        'rol',
        'CURP',
        'salario'
    ];

    public $timestamps = false;
}
