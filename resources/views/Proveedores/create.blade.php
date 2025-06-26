@extends('adminlte::page')

@section('title', 'Crear proveedor')

@section('content_header')
    <h1><i class="fas fa-truck"></i> Nuevo proveedor</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups...</strong> Hay algunos problemas con los datos ingresados.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proveedores.store') }}" method="POST">
        @csrf

        <div class="row">
            <!-- Tipo y documento -->
            <div class="col-md-4 mb-3">
                <label for="tipo_documento" class="form-label">Tipo de documento</label>
                <select name="tipo_documento" class="form-control" required>
                    <option value="">Seleccione</option>
                    <option value="Cédula" {{ old('tipo_documento') == 'Cédula' ? 'selected' : '' }}>Cédula</option>
                    <option value="NIT" {{ old('tipo_documento') == 'NIT' ? 'selected' : '' }}>NIT</option>
                    <option value="Cédula de extranjería" {{ old('tipo_documento') == 'Cédula de extranjería' ? 'selected' : '' }}>Cédula de extranjería</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="documento" class="form-label">Documento</label>
                <input type="text" name="documento" class="form-control" value="{{ old('documento') }}" required>
            </div>

            <!-- Nombre y empresa -->
            <div class="col-md-4 mb-3">
                <label for="nombre" class="form-label">Nombre del proveedor</label>
                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}" >
            </div>

            <div class="col-md-4 mb-3">
                <label for="empresa" class="form-label">Empresa</label>
                <input type="text" name="empresa" class="form-control" value="{{ old('empresa') }}">
            </div>

            <!-- Teléfono, dirección, ciudad -->
            <div class="col-md-4 mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{ old('direccion') }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" name="ciudad" class="form-control" value="{{ old('ciudad') }}" required>
            </div>

            <!-- Correo y estado -->
            <div class="col-md-4 mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" name="correo" class="form-control" value="{{ old('correo') }}">

            </div>

            <div class="col-md-4 mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select name="estado" class="form-control" required>
                    <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                    <option value="inactivo" {{ old('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
        </div>

        <div class="text-end mt-4">
            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancelar</a>
            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Guardar</button>
        </div>
    </form>
@stop
