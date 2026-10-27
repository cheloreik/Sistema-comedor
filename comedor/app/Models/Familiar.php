<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Familiar extends Model
{
    protected $table = 'familiares';

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }


    }
