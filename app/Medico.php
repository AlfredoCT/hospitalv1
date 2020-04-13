<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    protected $fillable = ['idhospital', 'cedula', 'nombre', 'especialidad'];
}
