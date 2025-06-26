@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Producto</h2>
    <form method="POST" action="{{ route('productos.update', $producto->idproductos) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo</label>
            <input type="text" name="tipo" value="{{ $producto->tipo }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="medida" class="form-label">Medida</label>
            <input type="text" name="medida" value="{{ $producto->medida }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" name="precio" step="0.01" min="0" value="{{ $producto->precio }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" min="0" value="{{ $producto->cantidad }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <input type="text" name="categoria" value="{{ $producto->categoria }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text" name="modelo" value="{{ $producto->modelo }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
</div>
@endsection
