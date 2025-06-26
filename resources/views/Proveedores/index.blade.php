@extends('adminlte::page')

@section('title', 'Proveedores')

@section('content_header')
    <h1><i class="fas fa-truck"></i> Proveedores
    <span class="badge bg-success">{{ count($proveedores) }}</span></h1>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('proveedores.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus-circle"></i> Nuevo proveedor
    </a>

    <table id="tabla-proveedores" class="table table-hover text-center align-middle shadow-sm rounded">
        <thead class="table-dark">
            <tr>
                <th>Tipo Doc.</th>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Empresa</th>
                <th>Teléfono</th>
                <th>Ciudad</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->tipo_documento }}</td>
                    <td>{{ $proveedor->documento }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->empresa }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->ciudad }}</td>
                    <td>{{ $proveedor->correo }}</td>
                    <td>
                        <span class="badge bg-{{ $proveedor->estado == 'activo' ? 'success' : 'secondary' }}">
                            {{ ucfirst($proveedor->estado) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-warning btn-sm me-1">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">No se encontraron proveedores.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

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
<script> console.log("Vista index de proveedores cargada correctamente."); </script>
<script>
    $(document).ready(function () {
        $('#tabla-proveedores').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    });
</script>
@stop
