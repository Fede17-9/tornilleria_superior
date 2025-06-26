<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
         $busqueda = $request->get('search');

    $clientes = Cliente::query()
        ->when($busqueda, function ($query, $busqueda) {
            $query->where('nombre', 'like', "%$busqueda%")
                  ->orWhere('telefono', 'like', "%$busqueda%")
                  ->orWhere('correo', 'like', "%$busqueda%");
        })
        ->get();

    return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado correctamente');
    }
}

