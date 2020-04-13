<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $fillable = ['idsala', 'cedula', 'registro', 'cama', 'nombre', 'direccion', 'nacimiento', 'sexo'];
}
