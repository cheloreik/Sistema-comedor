<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
    'fecha',
    'foto',
    'plato',
    'descripcion',
    'adicional',
    'estado'
];

}
