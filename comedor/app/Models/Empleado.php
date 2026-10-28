<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = [
      'codigo',
      'nombres',
      'apellidos',
      'ci',
      'correo',
      'telefono',
      'area',
      'cargo',
      'fecha_ingreso',
      'credito_disponible',
      'estado'
  ];

}
