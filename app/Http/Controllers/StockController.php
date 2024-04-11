<?php

namespace App\Http\Controllers;

use App\Productos;
use App\Proveedores;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StockController extends Controller
{
    //
    public function index(Request $request)
    {
        $stocks = Stock::with('producto', 'proveedor')->where('id_producto', $request->id)->paginate(15);
        $id = $request->id;

        Log::info($stocks);
        return view('stock.index', compact('stocks',  'id'));
    }

    public function create(Request $request)
    {
        $producto = Productos::find($request->id);
        $proveedores = Proveedores::all();
        return view('stock.create', compact('producto', 'proveedores'));
    }

    function store(Request $request) {
        $validator = Validator::make($request->only('id_producto'), [
            'id_producto' => Rule::unique('stocks')->where(function ($query) use($request) {
                return $query->where('id_producto', $request->id_producto)
                            ->where('id_proveedor', $request->id_proveedor);
            })
        ]);

        if($validator->fails())
            return redirect()->back()->with('error', 'El stock ya existe!');

        Stock::create([
            'id_producto' => $request->id_producto,
            'id_proveedor' => $request->id_proveedor,
            'stock' => $request->stock
        ]);

        return redirect()->route('stock_index', ['id' => $request->id_producto])->withSuccess('Stock creado!');
    }

    function delete(Request $request) {
        
        $stock = Stock::find($request->id);
        $id = $stock->id_producto;
        $stock->delete();

        return redirect()->route('stock_index', ['id' => $id])->withSuccess('Stock eliminado!');
    }

    function update_view(Request $request) {
        $stock = Stock::with('producto')->find($request->id);
        $proveedores = Proveedores::all();

        return view('stock.update', compact('stock', 'producto', 'proveedores'));
    }

    function update(Request $request) {
        $stock = Stock::find($request->id)->update([
            'id_producto' => $request->id_producto,
            'id_proveedor' => $request->id_proveedor,
            'stock' => $request->stock
        ]);

        return redirect()->route('stock_index', ['id' => $request->id_producto])->withSuccess('Stock creado!');
    }
}
