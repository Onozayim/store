<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    //
    protected $table = 'compras';

    protected $fillable = [
        'fecha',
        'total'
    ];

    public $timestamps = false;

    public function productos_comprados()
    {
        return $this->hasMany('App\ProductosComprados', 'id_compra', 'id');
    }
}
