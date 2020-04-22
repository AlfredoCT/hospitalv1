@extends('layouts.layout')

@section('titulo')
    Detalle de la sala  
@endsection

@section('contenido')
<h1 class="text-center">Sala</h1>
<br><br>
<div class="row">
    <div class="col-sm-3">
        <h3>Hospital:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$sala->hospital}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Codigo:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$sala->codigo}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Nombre:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$sala->nombre}}</p>
    </div>         
</div>
<div class="row">
    <div class="col-sm-3">
        <h3>Numero de camas:</h3>
    </div>
    <div class="col-sm-3">
        <p class="lead">{{$sala->ncamas}}</p>
    </div>         
</div>
<br><br>

<div class="row">
    <a href="{{route('sala.index')}}"><button class="btn btn-info">Volver</button>
</div>
@endsection