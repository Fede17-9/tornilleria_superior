@extends('adminlte::page')

@section('title', 'Panel Principal')

@section('content_header')
    <h1 class="text-center text-bold">Tornillería Superior - Inventario General</h1>
@stop

@section('content')
<div class="row">

    {{-- Productos --}}
    <div class="col-lg-4 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ \App\Models\Producto::count() }}</h3>
                <p>Productos registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-boxes"></i>
            </div>
            <a href="{{ route('productos.index') }}" class="small-box-footer">
                Ver productos <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    {{-- Clientes --}}
    <div class="col-lg-4 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ \App\Models\Cliente::count() }}</h3>
                <p>Clientes registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="{{ route('clientes.index') }}" class="small-box-footer">
                Ver clientes <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    {{-- Proveedores --}}
    <div class="col-lg-4 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ \App\Models\Proveedor::count() }}</h3>
                <p>Proveedores registrados</p>
            </div>
            <div class="icon">
                <i class="fas fa-truck"></i>
            </div>
            <a href="{{ route('proveedores.index') }}" class="small-box-footer">
                Ver proveedores <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Resumen del sistema</h3>
            </div>
            <div class="card-body">
                <p>
                    Bienvenido al sistema de gestión de inventario <strong>Tornillería Superior</strong>. Desde este panel puedes administrar productos como tornillería, herramientas y demás elementos de ferretería, así como la información de tus proveedores y clientes.
                </p>
                <p>
                    Usa el menú lateral para navegar entre las secciones. Cada módulo está diseñado para ayudarte a mantener el control de tu inventario, proveedores de confianza y tus clientes frecuentes.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="card card-danger mt-4">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-exclamation-triangle"></i> Productos con bajo stock</h3>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped table-hover mb-0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Producto::where('cantidad', '<', 5)->get() as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td><span class="badge badge-danger">{{ $producto->cantidad }}</span></td>
                        <td>{{ $producto->categoria ?? '—' }}</td>
                    </tr>
                @endforeach

                @if(\App\Models\Producto::where('cantidad', '<', 5)->count() === 0)
                    <tr>
                        <td colspan="3" class="text-center">Todos los productos tienen buen stock.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@stop

@section('css')
{{-- Puedes agregar estilos propios si los necesitas --}}
@stop

@section('js')
<script>
    console.log("Dashboard cargado correctamente.");
</script>
@stop
