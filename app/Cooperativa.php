<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cooperativa extends Model
{
    
    protected $table = 'cooperativas';

    protected $fillable = [
        'Id', 'Nombre', 'Ruc',
    ];
}
