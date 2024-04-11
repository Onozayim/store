<?php

namespace App\Http\Controllers;

use App\Proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function store(Request $request)
    {
        try {
            Proveedores::create([
                'nombre' => $request->nombre,
                'num_tel' => $request->num_tel
            ]);

            return redirect()->route('proveedores_index')->withSuccess('Proveedor creado!');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Favor de ponerse en contacto con soporte!');
        }
    }

    public function index()
    {
        $proveedores = Proveedores::paginate(15);

        return view('proveedores.index', compact('proveedores'));
    }

    public function delete(Request $request)
    {
        Proveedores::find($request->id)->delete();
        return redirect()->route('proveedores_index')->withSuccess('Proveedor eliminado!');
    }

    public function update_view(Request $request)
    {
        $proveedor = Proveedores::find($request->id);
        return view('proveedores.update', compact('proveedor'));
    }

    public function update(Request $request)
    {
        Proveedores::find($request->id)->update([
            'nombre' => $request->nombre,
            'num_tel' => $request->num_tel
        ]);

        return redirect()->route('proveedores_index')->withSuccess('Proveedor guardado!');
    }
}
