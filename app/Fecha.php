<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $fillable = ['idpaciente', 'iddiagnostico', 'fecha'];
}
