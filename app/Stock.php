<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $table = 'stocks';

    protected $fillable = [
        'id_producto',
        'id_proveedor',
        'stock'
    ];

    public function producto()
    {
        return $this->hasOne('App\Productos', 'id', 'id_producto');
    }

    public function proveedor()
    {
        return $this->hasOne('App\Proveedores', 'id', 'id_proveedor');
    }

    public $timestamps = false;
}
