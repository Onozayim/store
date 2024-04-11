<?php

namespace App\Http\Controllers;

use App\Descuentos;
use App\Productos;
use Illuminate\Http\Request;

class DescuentosController extends Controller
{
    //
    public function index(Request $request)
    {
        $descuento = Descuentos::where($request->only('id_producto'))->first();
        $producto = Productos::find($request->id_producto);
        return view('descuentos.index', compact('descuento', 'producto'));
    }

    public function save(Request $request)
    {
        $descuento = Descuentos::where($request->only('id_producto'))->first();

        if(!$descuento)
            $descuento = new Descuentos();

        $descuento->id_producto = $request->id_producto;
        $descuento->porcentaje = $request->porcentaje;
        $descuento->save();

        return redirect()->route('descuento_index', ['id_producto' => $request->id_producto])->withSuccess('Descuento guardado!');
    }
}
