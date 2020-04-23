<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{
    use SoftDeletes;
    protected $fillable = ['idsala', 'cedula', 'registro', 'cama', 'nombre', 'direccion', 'nacimiento', 'sexo'];
}
