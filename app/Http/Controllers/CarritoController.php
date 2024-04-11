<?php

namespace App\Http\Controllers;

use App\ProductosCarrito;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarritoController extends Controller
{
    public function add(Request $request)
    {
        $stock = Stock::find($request->id_stock);

        if($stock->stock <= 0)
            return redirect()->route('stock_index', ['id' => $stock->id_producto])->with('error', 'Artículo sin stock!');
        
        $validator = Validator::make($request->only('id_stock'), [
            'id_stock' => 'unique:productos_carritos'
        ]);

        if($validator->fails())
            return redirect()->route('stock_index', ['id' => $stock->id_producto])->with('error', 'Artículo ya en carrito!');

        ProductosCarrito::create([
            'cantidad' => 1,
            'id_stock' => $stock->id
        ]);

        return redirect()->route('stock_index', ['id' => $stock->id_producto])->withSuccess('Artículo agregado al carrito');
    }

    public function index(Request $request)
    {
        $stocks = ProductosCarrito::with('stock.producto.descuento', 'stock.proveedor')->get();
        return view('carrito.index', compact('stocks'));
    }

    public function delete(Request $request)
    {
        ProductosCarrito::find($request->id)->delete();

        return redirect()->route('carrito_index')->withSuccess('Producto eliminado del carrito!');
    }

    public function update_cantidad(Request $request)
    {
        ProductosCarrito::find($request->id)->update($request->only('cantidad'));

        return 'done';
    }
}
