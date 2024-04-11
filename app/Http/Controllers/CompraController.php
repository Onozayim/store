<?php

namespace App\Http\Controllers;

use App\Compras;
use App\Productos;
use App\ProductosCarrito;
use App\ProductosComprados;
use App\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function store(Request $request)
    {
        if(!$request->id) 
            return redirect()->route('productos_index')->with('error', 'Carrito vacío!');
        DB::transaction(function () use ($request) {
            $productos = array();
            $stocks = array();
            $cantidad = array();
            $total = 0;
    
            for ($i = 0; $i < count($request->id); $i++) { 
                $stock = Stock::with('producto')->find($request->id[$i]);
                $stock->stock -= $request->cantidad[$i];
    
                $producto = Productos::with('descuento')->find($stock->producto->id);

                if($producto->descuento)
                    $producto->precio = $producto->precio - ($producto->precio * ($producto->descuento->porcentaje / 100));
    
                $total += ($producto->precio) * $request->cantidad[$i];
                $productos[] = $producto;
                $stocks[] = $stock;
                $cantidad[] = $request->cantidad[$i];
    
                $stock->save();
            }
    
            // dd([
            //     'total' => $total,
            //     'productos' => $productos,
            //     'stocks' => $stocks,
            //     'cantidad' => $request->cantidad
            // ]);
    
            $compra = Compras::create([
                'fecha' => Carbon::now(),
                'total' => $total
            ]);
    
            for ($i = 0; $i < count($request->id); $i++) { 
                // dd([
                //     'id_compra' => $compra->id,
                //     'id_stock' => $stocks[$i]->id,
                //     'cantidad' => $cantidad[$i],
                //     'precio' => $productos[$i]->precio
                // ]);
                ProductosComprados::create([
                    'id_compra' => $compra->id,
                    'id_stock' => $stocks[$i]->id,
                    'cantidad' => $cantidad[$i],
                    'precio' => $productos[$i]->precio
                ]);
            }

            ProductosCarrito::where('id', '>', 0)->delete();
        });
        return redirect()->route('productos_index')->withSuccess('Compra creada!');
    }

    public function index(Request $request)
    {
        $compras = Compras::with('productos_comprados.stock.producto', 'productos_comprados.stock.proveedor')->paginate(15);
        return view('compras.index', compact('compras'));
    }

    public function detail(Request $request)
    {
        $productos = ProductosComprados::where($request->only('id_compra'))->with('stock.producto.descuento', 'stock.proveedor')->get();
        return view('compras.detail', compact('productos'));
    }
}
