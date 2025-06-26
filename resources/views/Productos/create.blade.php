@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
    <h1>Crea tus productos</h1>
@stop

@section('content')


<form action="{{route('productos.store')}}" method="post">
    @csrf
  <div class="mb-3">
    <label for="nombreproducto" class="form-label">Nombre</label>
    <input type="text" class="form-control" placeholder="Nombre del producto" name="nombre" >
  </div>
  
  <div class="mb-3">
    <label for="tipo" class="form-label">Tipo</label>
      <select name="tipo" class="form-select" required>
    <option value="tornillo">Tornillo</option>
    <option value="herramienta">Herramienta</option>
    <option value="electrico">Eléctrico</option>
    <option value="seguridad">Seguridad</option>
    <option value="pintura">Pintura</option>
    <option value="pegante">Pegante</option>
    <option value="otros">Otros</option>
      </select>
   </div>
    <div class="mb-3">
    <label for="medida" class="form-label">Medida (opcional)</label>
    <input type="text" name="medida" class="form-control">
</div>
 
  <div class="mb-3">
    <div class="mb-3">
            <label for="precio" class="form-label">Precio (COP)</label>
            <input type="number" name="precio" class="form-control" step="0.01" min="0" required>
        </div>
  </div>
   <div class="mb-3">
    <label for="cantidad" class="form-label">Cantidad en stock</label>
            <input type="number" name="cantidad" class="form-control" min="0" required>
  </div>
   <div class="mb-3">
    <label for="cantegoriaproducto" class="form-label">Categoria</label>
    <input type="text" class="form-control" name="categoria" >
  </div>
   <div class="mb-3">
    <label for="modeloproducto" class="form-label">Modelo</label>
    <input type="text" class="form-control" name="modelo">
  </div>
  <div class="mb-3">
  <label for="descripcionproducto" class="form-label">Descripción</label>
  <textarea class="form-control" rows="3" name="desscripcion"></textarea>
</div>
  <button type="submit" class="btn btn-primary">Crear</button>
</form>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop