<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    protected $table = 'detalleordenes';

    protected $fillable = [
        'Id','Id_Tipo', 'Nombre',
    ];
}
