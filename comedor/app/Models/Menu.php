<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
    'fecha',
    'cupo_disponible',
    'plato_principal',
    'guarnicion',
    'ensalada',
    'bebida',
    'postre',
    'estado'
];

}
