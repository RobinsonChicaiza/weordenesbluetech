<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMarca extends Model
{
    protected $table = 'tiposmarcas';

    protected $fillable = [
        'Id', 'Nombre',
    ];
}
