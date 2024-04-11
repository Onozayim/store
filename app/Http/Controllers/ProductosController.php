<?php

namespace App\Http\Controllers;

use App\Productos;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{
    //
    public function store(Request $request)
    {
        $validator = Validator::make($request->only('sku'), [
            'sku' => 'unique:productos'
        ]);

        if($validator->fails())
            return redirect()->back()->with('error', 'El sku no se puede repetir!');

        try {
            Productos::create([
                'sku' => $request->sku,
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'peso' => $request->peso,
                'categoria' => $request->categoria
            ]);

            return redirect()->to('productos')->withSuccess('Producto creado!');
        } catch (Exception $ex) {
            Log::info($ex->getMessage());
            return redirect()->back()->with('error', 'Favor de ponerse en contacto con soporte!');
        }
    }

    public function index(Request $request)
    {
        $productos = Productos::with('descuento')->paginate(15);

        return view('productos.index', compact('productos'));
    }

    public function delete(Request $request)
    {
        Productos::where('id', $request->id)->delete();
        return redirect()->to('productos')->withSuccess('Producto eliminado!');
    }

    public function update_view(Request $request)
    {
        $producto = Productos::find($request->id);
        return view('productos.update', compact('producto'));
    }

    public function update(Request $request)
    {
        Productos::find($request->id)->update([
                'sku' => $request->sku,
                'nombre' => $request->nombre,
                'descripcion' => $request->descripcion,
                'precio' => $request->precio,
                'peso' => $request->peso,
                'categoria' => $request->categoria
        ]);

        return redirect()->to('productos')->withSuccess('Producto guardado!');
    }
}
