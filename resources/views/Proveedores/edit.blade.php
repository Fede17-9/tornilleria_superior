@extends('adminlte::page')

@section('title', 'Editar proveedor')

@section('content_header')
    <h1><i class="fas fa-truck"></i> Editar proveedor</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Atención!</strong> Corrige los errores e intenta nuevamente.
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-4">
                <label for="tipo_documento" class="form-label">Tipo de documento</label>
                <select name="tipo_documento" class="form-control">
                    <option value="Cédula" {{ $proveedor->tipo_documento == 'Cédula' ? 'selected' : '' }}>Cédula</option>
                    <option value="NIT" {{ $proveedor->tipo_documento == 'NIT' ? 'selected' : '' }}>NIT</option>
                    <option value="Cédula de extranjería" {{ $proveedor->tipo_documento == 'Cédula de extranjería' ? 'selected' : '' }}>Cédula de extranjería</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" name="documento" class="form-control" value="{{ old('documento', $proveedor->documento) }}">
            </div>
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre del proveedor</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $proveedor->nombre) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" name="empresa" class="form-control" value="{{ old('empresa', $proveedor->empresa) }}">
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $proveedor->telefono) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $proveedor->direccion) }}">
            </div>
            <div class="col-md-6">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" name="ciudad" class="form-control" value="{{ old('ciudad', $proveedor->ciudad) }}">
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" name="correo" class="form-control" value="{{ old('correo', $proveedor->correo) }}">
            </div>
            <div class="col-md-6">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" class="form-control">
                    <option value="activo" {{ $proveedor->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ $proveedor->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Cancelar
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Actualizar
            </button>
        </div>
    </form>
@stop
