<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $busqueda = $request->get('search');

    $productos = Producto::query()
        ->when($busqueda, function ($query, $busqueda) {
            $query->where('nombre', 'like', "%$busqueda%")
                  ->orWhere('tipo', 'like', "%$busqueda%")
                  ->orWhere('categoria', 'like', "%$busqueda%")
                  ->orWhere('modelo', 'like', "%$busqueda%");
        })
        ->get();

    return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("productos.create");
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $producto = Producto::create([
        'nombre' => $request->nombre,
        'tipo' => $request->tipo,
        'medida' => $request->medida,
        'precio' => $request->precio,
        'cantidad' => $request->cantidad,
        'categoria' => $request->categoria,
        'modelo' => $request->modelo,
        'descripcion' => $request->descripcion,
       ]);
       Producto::create($request->all());
return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(string $id)
{
 $producto = Producto::findOrFail($id);
    return view('productos.edit', compact('producto'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $producto = Producto::findOrFail($id);

    $producto->update([
        'nombre' => $request->nombre,
        'tipo' => $request->tipo,
        'medida' => $request->medida,
        'precio' => $request->precio,
        'cantidad' => $request->cantidad,
        'categoria' => $request->categoria,
        'modelo' => $request->modelo,
        'descripcion' => $request->descripcion,
    ]);

    return redirect()->route('productos.index')->with('success','Producto actualizado correctamente.');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $producto = Producto::findOrFail($id);
    $producto->delete();

    return redirect()->route('productos.index')->with('success','Producto eliminado correctamente.');
    }
}
