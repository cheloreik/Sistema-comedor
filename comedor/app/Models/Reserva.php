<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reservas';

    protected $fillable = [
        'reservable_id',
        'reservable_type',
        'plato_id',
        'fecha',
        'estado',
    ];

    /**
     * Relación polimórfica inversa: 
     * Una reserva pertenece a un "reservable" (puede ser User o Familiar).
     */
    public function reservable()
    {
        return $this->morphTo();
    }
    
}
