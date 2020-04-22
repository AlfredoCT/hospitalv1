@extends('layouts.layout')

@section('titulo')
    Detalle del paciente    
@endsection

@section('contenido')
<h1 class="text-center">Paciente</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Sala:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->salas}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Cedula:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->cedula}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Registro:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->registro}}</p>
    </div>             
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Cama:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->cama}}</p>
    </div>             
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Nombre:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->nombre}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Direccion: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->direccion}}</p>
    </div>             
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Fecha de nacimiento: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->nacimiento}}</p>
    </div>             
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Sexo: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$paciente->sexo}}</p>
    </div>             
</div>
<br><br>

<div class="row">
    <a href="{{route('paciente.index')}}"><button class="btn btn-info">Volver</button>
</div>
@endsection