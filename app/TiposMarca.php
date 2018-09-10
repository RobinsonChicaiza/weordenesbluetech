<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposMarca extends Model
{
    protected $table = 'tiposmarcas';

    protected $fillable = [
        'Id', 'Nombre',
    ];
}
