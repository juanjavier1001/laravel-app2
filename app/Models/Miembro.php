<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Miembro extends Model
{
    use HasFactory;


    //funcion que retorne nombre mas apellido

    public function nombreCompleto2()
    {
        return "{$this->nombre} {$this->apellido}";
    }
}
