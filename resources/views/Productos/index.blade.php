@extends('adminlte::page')

@section('title','Inventario | Productos' )

@section('content_header')
   <h1>
    <i class="fas fa-boxes"></i> Productos
    <span class="badge bg-success">{{ count($productos) }}</span>
   </h1>
@stop

@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ strip_tags(session('success')) }}
    </div>
@endif


<a href="{{ route('productos.create') }}" class="btn btn-success mb-3">
    <i class="fas fa-plus-circle"></i> Crear producto
</a>

<table id="tabla-productos" class="table table-hover text-center align-middle shadow-sm rounded">
  <thead class="table-dark">
    <tr>
        <th>Nombre</th>
        <th>Tipo</th>
        <th>Medida</th>
        <th>Precio</th>
        <th>Cantidad</th>
        <th>Categoría</th>
        <th>Modelo</th>
        <th>Descripción</th>
        <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($productos as $pro)
      <tr>
        <td>{{ $pro->nombre }}</td>
        <td>{{ $pro->tipo }}</td>
        <td>{{ $pro->medida ?? '—' }}</td>
        <td>${{ number_format($pro->precio, 2, ',', '.') }}</td>
        <td>{{ $pro->cantidad }}</td>
        <td>{{ $pro->categoria }}</td>
        <td>{{ $pro->modelo }}</td>
        <td>{{ $pro->descripcion ?? '—' }}</td>
        <td>
            <a href="{{ route('productos.edit', $pro->idproductos) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Editar
            </a>

            <form action="{{ route('productos.destroy', $pro->idproductos) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i> Eliminar
                </button>
            </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <style>
        table th, table td {
            vertical-align: middle !important;
        }
        .btn-sm i {
            margin-right: 4px;
        }
    </style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script> console.log("Vista index de productos cargada correctamente."); </script>
<script>
    $(document).ready(function () {
        $('#tabla-productos').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    });
</script>
@stop
