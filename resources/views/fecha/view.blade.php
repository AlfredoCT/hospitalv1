@extends('layouts.layout')

@section('titulo')
    Ver fecha de diagnostico    
@endsection

@section('contenido')
<h1 class="text-center">fecha </h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Paciente:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$fecha->paciente}}</p>
    </div>         
</div>

<div class="row">
    <div class="col-sm-3">
        <h3>Diagnostico:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$fecha->diagnostico}}</p>
    </div>         
</div>

<div class="row">
    <div class="col-sm-3">
        <h3>Fecha:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$fecha->fecha}}</p>
    </div>             
</div>
<br><br>

<div class="row">
    <a href="{{route('fecha.index')}}"><button class="btn btn-info">Volver</button>
</div>
@endsection