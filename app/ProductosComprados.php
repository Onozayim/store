<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosComprados extends Model
{
    protected $table = 'productos_comprados';

    protected $fillable = [
        'id_compra',
        'id_stock',
        'cantidad',
        'precio'
    ];

    public $timestamps = false;

    public function stock()
    {
        return $this->hasOne('App\Stock', 'id', 'id_stock');
    }
}
