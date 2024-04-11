<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    public function index()
    {
        $empleados = Empleados::paginate(15);
        return view('empleados.index', compact('empleados'));
    }

    public function store(Request $request)
    {
        Empleados::create([
            'nombre' => $request->nombre,
            'num_tel' => $request->num_tel,
            'rol' => $request->rol,
            'CURP' => $request->CURP,
            'salario' => $request->salario
        ]);

        return redirect()->route('empleados_index')->withSuccess('Empleado Creado!');
    }

    public function delete(Request $request)
    {
        Empleados::find($request->id)->delete();
        return redirect()->route('empleados_index')->withSuccess('Empleado eliminado!');
    }

    public function update_view(Request $request)
    {
        $empleado = Empleados::find($request->id);
        return view('empleados.update', compact('empleado'));
    }

    public function update(Request $request)
    {
        Empleados::find($request->id)->update([
            'nombre' => $request->nombre,
            'num_tel' => $request->num_tel,
            'rol' => $request->rol,
            'CURP' => $request->CURP,
            'salario' => $request->salario
        ]);

        return redirect()->route('empleados_index')->withSuccess('Empleado Guardado!');
    }
}
