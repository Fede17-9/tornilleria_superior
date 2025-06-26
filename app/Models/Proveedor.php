<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'tipo_documento',
        'documento',
        'nombre',
        'empresa',
        'telefono',
        'direccion',
        'ciudad',
        'correo',
        'estado'
    ];
}
