<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fecha extends Model
{
    use SoftDeletes;
    protected $fillable = ['idpaciente', 'iddiagnostico', 'fecha'];
}
