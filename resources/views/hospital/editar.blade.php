@extends('layouts.layout')

@section('titulo','Actualizar hospital')
 
@section('contenido')

<h1 class="text-center">Editar Hospital</h1>
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

<form action="{{route('hospital.update', $hospital->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Codigo:</label>
            <input type="text" class="form-control" name="codigo" value="{{$hospital->codigo}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label>Hospital:</label>
            <input type="text" class="form-control" name="nombre" value="{{$hospital->nombre}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Direccion:</label>
        <input type="text" class="form-control" name="direccion" value="{{$hospital->direccion}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Telefono:</label>
        <input type="number" class="form-control" name="telefono" value="{{$hospital->telefono}}">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
        <label>Numero de camas:</label>
        <input type="number" class="form-control" name="ncamas" value="{{$hospital->ncamas}}">
        </div>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Guardar Modificacion</button>
    </div>
    </form>

@endsection