@extends('layouts.layout')

@section('titulo')
    Detalle del medico    
@endsection

@section('contenido')
<h1 class="text-center">Medico</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Hospital:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$medico->hospital}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Cedula:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$medico->cedula}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Nombre:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$medico->nombre}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Especialidad:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$medico->especialidad}}</p>
    </div>         
</div>
<br><br>

<div class="row">
    <a href="{{route('medico.index')}}"><button class="btn btn-info">Volver</button>
</div>
@endsection