@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1><i class="fas fa-users"></i> Clientes 
    <span class="badge bg-info">{{ count($clientes) }}</span>
</h1>


@stop

@section('content')




    <a href="{{ route('clientes.create') }}" class="btn btn-success mb-3">
    <i class="fas fa-user-plus"></i> Nuevo cliente
</a>


    <table id="tabla-clientes" class="table table-hover text-center align-middle">
        <thead class="table-dark">
            <tr>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cli)
                <tr>
                    <td>{{ $cli->nombre }}</td>
                    <td>{{ $cli->telefono }}</td>
                    <td>{{ $cli->direccion }}</td> 
                    <td>{{ $cli->correo }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cli->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        <form action="{{ route('clientes.destroy', $cli->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este cliente?')">
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
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
     <style>
        table th, table td {
            vertical-align: middle !important;
        }
    </style>
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script> console.log("Vista index de clientes cargada correctamente."); </script>
<script>
    $(document).ready(function () {
        $('#tabla-clientes').DataTable({
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
            }
        });
    });
</script>
@stop