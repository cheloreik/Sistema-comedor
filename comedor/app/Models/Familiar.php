<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = 'familiares';

    protected $fillable = [
        'empleado_id',
        'nombres',
        'apellidos',
        'ci',
        'parentesco',
        'fecha_nacimiento',
        'telefono',
        'estado'
    ];


    public function empleado()
    {
        return $this->belongsTo(User::class, 'empleado_id');
    }
    public function reservas()
    {
        return $this->morphMany(Reserva::class, 'reservable');
    }
}