<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table = 'ordenes';

    protected $fillable = [
        'Id', 'N_Orden', 'Id_Empleado', 'Id_Cliente', 'Id_Bus', 'Id_Estado',
        'Fecha_Inicio', 'Fecha_Finalizacion', 'Fecha_Servidor', 'Precio_Total',
        'IVA', 'Longitud', 'Latitud', 'Pais', 'Region', 'Ciudad', 'N_Produccion',

    ];
}
