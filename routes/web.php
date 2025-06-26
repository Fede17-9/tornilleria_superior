<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProveedorController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tornilleria_superior', [App\Http\Controllers\HomeController::class, 'mi_proyecto'])->name('tornilleria_superior');
//Productos
Route::get('/productos', [App\Http\Controllers\ProductoController::class, 'index'])->name('productos.index');
Route::get('/productos/crear', [App\Http\Controllers\ProductoController::class, 'create'])->name('productos.create');
Route::post('/productos/store', [App\Http\Controllers\ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{id}/edit', [App\Http\Controllers\ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{idproductos}', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{id}', [App\Http\Controllers\ProductoController::class, 'destroy'])->name('productos.destroy');

//Clientes
Route::resource('clientes', App\Http\Controllers\ClienteController::class);

//Proveedores

Route::resource('proveedores', ProveedorController::class)
    ->parameters(['proveedores' => 'proveedor']);
