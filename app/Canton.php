<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canton extends Model
{
    //
    protected $table = 'cantones';

    protected $fillable = [
        'Id','Id_Provincia', 'Nombre',
    ];
}