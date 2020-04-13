@extends('layouts.layout')

@section('titulo')
    Ver Consulta    
@endsection

@section('contenido')
<h1 class="text-center">Detalle consulta</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Medico:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$consulta->idmedico}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Paciente:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$consulta->idpaciente}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Fecha:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$consulta->fecha}}</p>
    </div>             
</div>
<br><br>

<div class="row">
    <a href="{{route('consulta.index')}}"><button class="btn btn-primary">Regresar</button>
</div>
@endsection