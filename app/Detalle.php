<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $fillable = ['idlaboratorio', 'idhospital', 'descripcion', 'fecha'];
}
