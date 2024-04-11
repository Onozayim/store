<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductosCarrito extends Model
{
    //
    protected $table = 'productos_carritos';
    public $timestamps = false;

    protected $fillable = [
        'cantidad', 
        'id_stock'
    ];

    public function stock()
    {
        return $this->hasOne('App\Stock', 'id', 'id_stock');
    }
}
