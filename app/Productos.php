<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //
    protected $table = 'productos';

    protected $fillable = [
        'sku',
        'nombre',
        'descripcion',
        'precio',
        'peso',
        'categoria'
    ];

    public $timestamps = false;

    public function descuento()
    {
        return $this->hasOne('App\Descuentos', 'id_producto', 'id');
    }
}
