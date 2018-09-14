<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroBus extends Model
{
    //
    protected $table = 'registrobuses';

    protected $fillable = [
        'Id','Id_Persona', 'Id_Bus', 'Fecha_Servidor',
    ];
}