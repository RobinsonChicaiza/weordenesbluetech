<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';

    protected $fillable = [
        'Id','Id_Impuestos', 'Id_Marca', 'Id_Estado', 'Nombre', 'Precio', 'PrecioCompra', 'Stock', 'Descripcion', 'Id_Categoria',
    ];
}