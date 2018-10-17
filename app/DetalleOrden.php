<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    protected $table = 'detalleordenes';

    protected $fillable = [
        'Id', 'Id_Producto', 'Id_Orden', 'Cantidad',
        'Descripcion', 'PVP', 'SubTotal', 'ValorIva',
    ];
}