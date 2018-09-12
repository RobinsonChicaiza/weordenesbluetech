<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    //
    protected $table = 'buses';

    protected $fillable = [
        'Id','Id_Cooperativa', 'Placa', 'Marca_Chasis', 'Serie_Chasis', 'Anio', 'N_Disco',
    ];
}