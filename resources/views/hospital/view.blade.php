@extends('layouts.layout')

@section('titulo')
    Detalle del hospital    
@endsection

@section('contenido')
<h1 class="text-center">Hospital</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Codigo:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$hospital->codigo}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Nombre:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$hospital->nombre}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Direccion:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$hospital->direccion}}</p>
    </div>       
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Telefono</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$hospital->telefono}}</p>
    </div>       
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Numero de camas: </h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$hospital->ncamas}}</p>
    </div>       
</div>
<br><br>

<div class="row">
    <a href="{{route('hospital.index')}}"><button class="btn btn-info">Volver</button>
</div>
@endsection
