<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
     protected $fillable = [
        'nombre',
        'tipo',
        'medida',
        'precio',
        'cantidad',
        'categoria',
        'modelo',
        'descripcion',
     ];
     protected $primaryKey = 'idproductos';

}
