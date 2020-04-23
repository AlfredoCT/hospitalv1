<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use SoftDeletes;
    protected $fillable = ['idhospital', 'cedula', 'nombre', 'especialidad'];
}
