<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = 'categorias';

    protected $fillable = [
        'Id','Nombre', 'Descripcion', 'Id_Proveedor', 'Id_Estado',
    ];
}