<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index(Request $request)
    {
        $busqueda = $request->get('search');

    $proveedores = Proveedor::query()
        ->when($busqueda, function ($query, $busqueda) {
            $query->where('nombre', 'like', "%$busqueda%")
                  ->orWhere('empresa', 'like', "%$busqueda%")
                  ->orWhere('documento', 'like', "%$busqueda%");
        })
        ->get();

    return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento' => 'required|in:Cédula,NIT,Cédula de extranjería',
            'documento' => 'required|max:30',
            'nombre' => 'nullable|max:100',
            'empresa' => 'nullable|max:100',
            'telefono' => 'required|max:20',
            'direccion' => 'nullable',
            'ciudad' => 'required|max:100',
            'correo' => 'nullable|email|max:100',
            'estado' => 'required|in:activo,inactivo',
        ]);

        Proveedor::create($request->all());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
    }

    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'tipo_documento' => 'required|in:Cédula,NIT,Cédula de extranjería',
            'documento' => 'required|max:30',
            'nombre' => 'nullable|max:100',
            'empresa' => 'nullable|max:100',
            'telefono' => 'required|max:20',
            'direccion' => 'nullable',
            'ciudad' => 'required|max:100',
            'correo' => 'required|email|max:100',
            'estado' => 'required|in:activo,inactivo',
        ]);

        $proveedor->update($request->all());
        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
    }
}
