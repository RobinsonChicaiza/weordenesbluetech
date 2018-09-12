<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table = 'roles';

    protected $fillable = [
        'Id','Id_Departamento', 'Nombre', 'Sueldo',
    ];
}