@extends('layouts.layout')

@section('titulo','Actualizar laboratorio')
 
@section('contenido')

<h1 class="text-center">Editar Laboratorio</h1>
<br><br>

@if($errors->any())
	<div class="alert alert-danger">
	<div class="header"> <strong>Ups.</strong>¡Algo fallo!, intentalo nuevamente...</div>
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
	</div>
	
@endif

<form action="{{route('laboratorio.update', $laboratorio->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Codigo:</label>
        <input type="text" class="form-control" name="codigo" value="{{$laboratorio->codigo}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>laboratorio:</label>
        <input type="text" class="form-control" name="nombre" value="{{$laboratorio->nombre}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion:</label>
        <input type="text" class="form-control" name="direccion" value="{{$laboratorio->direccion}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Telefono:</label>
        <input type="number" class="form-control" name="telefono" value="{{$laboratorio->telefono}}">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </div>
</form>

@endsection